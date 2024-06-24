<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all data in database
        $gallery = Gallery::all();

        // response
        return success($gallery, 'Gallery ditemukan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // response if fails
        if ($validator->fails()) {
            return fails($validator->errors(), 422);
        }

        // store photo in public directory
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/gallery'), $photoName);
        }

        // store gallery data in database
        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->photo = 'upload/gallery/' . $photoName;
        $gallery->save();

        // response if success
        return success(null, 'Gallery berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // find data in database
        $gallery = Gallery::find($id);

        if ($gallery) {
            // response if success
            return success($gallery, 'Galleri ditemukan');
        } else {
            // response if fails
            return fails('Galleri tidak ditemukan', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // find data in database
        $gallery = Gallery::find($id);
        if (!$gallery) {
            // response if not found
            return fails('Galleri tidak ditemukan', 404);
        }

        // validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // response if fails
        if ($validator->fails()) {
            return fails($validator->errors(), 422);
        }

        if ($request->hasFile('photo')) {
            // store photo in public directory
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/gallery'), $photoName);

            // remove old photo in public directory
            $oldPhotoPath = public_path($gallery->photo);
            if (file_exists($oldPhotoPath)) {
                @unlink($oldPhotoPath);
            }
        }

        // store gallery data in database
        $gallery->title = $request->title;
        $gallery->photo = 'upload/gallery/' . $photoName;
        $gallery->save();

        // response if success
        return success(null, 'Gallery berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // find data in database
        $gallery = Gallery::find($id);

        if ($gallery) {
            // remove photo in public directory
            $photoPath = public_path($gallery->photo);
            if (file_exists($photoPath)) {
                @unlink($photoPath);
            }
            // remove gallery data in database
            $gallery->delete();
            // response if success
            return success(null, 'Galleri berhasil dihapus');
        }

        // response if fails
        return fails('Galleri tidak ditemukan', 404);
    }
}
