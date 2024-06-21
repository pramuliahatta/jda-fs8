<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8081/api/galleries');
        if ($response->successful()) {
            $data = $response->json();
            $data = $data['data'];
            // dd(Route::current()->getName());
            if (Route::current()->getName() == 'dashboard.gallery.index') {
                return view('dashboard.gallery.index', compact('data'));
            }
            return view('gallery.index', compact('data'));
        }
        return abort(404, 'Data tidak ada!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation data
        $validatedData = $request->validate([
            'title' => [
                'required',
                'max:255'
            ],
            'photo' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048'
            ],
        ]);

        // store photo in public directory
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/upload'), $imageName);

        // make new data in database
        $gallery = new Gallery;

        // store gallery data in database
        $gallery->title = $validatedData['title'];
        $gallery->photo = 'img/upload/' . $imageName;
        $gallery->save();

        return back()->with('success', "Foto berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $photo = Gallery::find($id);
        return view('dashboard.gallery.show', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = Gallery::find($id);
        return view('dashboard.gallery.edit', $photo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get gallery data in database
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return back()->with('error', "Foto tidak ditemukan!");
        }

        // validation input data
        $validatedData = $request->validate([
            'title' => [
                'nullable',
                'max:255'
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048'
            ],
        ]);


        if ($request->hasFile('photo')) {
            // store photo in public directory
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/upload'), $imageName);

            // remove old photo in public directory
            $oldPhotoPath = public_path($gallery->photo);
            if (file_exists($oldPhotoPath)) {
                @unlink($oldPhotoPath);
            }

            // store gallery data (photo) in database
            $gallery->photo = 'img/upload/' . $imageName;
        }

        // store gallery data (title) in database
        $gallery->title = $request->title;
        // return $gallery;
        $gallery->save();

        return back()->with('success', "Foto berhasil diubah!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get gallery data in database
        $gallery = Gallery::find($id);

        if ($gallery) {
            // remove photo in public directory
            $imagePath = public_path($gallery->photo);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }

            // remove gallery data in database
            $gallery->delete();
            return back()->with('success', "Foto berhasil dihapus!");
        }
        return back()->with('error', "Foto tidak ditemukan!");
    }
}
