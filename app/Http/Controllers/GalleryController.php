<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all galleries data in database
        $photos = Gallery::all();
        $view_data = [
            'photos' => $photos,
        ];
        if (Route::current()->getName() == 'dashboard.gallery.index') {
            // for view dashboard
            return view('dashboard.gallery.index', $view_data);
        }
        // for view landingpage
        return view('gallery.index', $view_data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.gallery-create');
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
        $image->move(public_path('upload/gallery'), $imageName);

        // make new data in database
        $gallery = new Gallery;

        // store gallery data in database
        $gallery->title = $validatedData['title'];
        $gallery->photo = 'upload/gallery/' . $imageName;
        $gallery->save();

        return back()->with('success', "Photo berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('dashboard.detail-gallery', Gallery::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.edit-gallery', Gallery::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get gallery data in database
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return back()->with('error', "Photo tidak ditemukan!");
        }

        // validation input data
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
        $gallery->title = $validatedData['title'];
        $gallery->save();

        return back()->with('success', "Photo berhasil diubah!");
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
            return back()->with('success', "Photo berhasil dihapus!");
        }
        return back()->with('error', "Photo tidak ditemukan!");
    }
}
