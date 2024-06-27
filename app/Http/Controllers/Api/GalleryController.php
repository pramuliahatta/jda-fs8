<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Illuminate\Validation\ValidationException;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // get all data in database
            $query =  Gallery::query();
            if ($request->has('search')) {
                $search = $request->query('search');

                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%');
                });
            }
            $gallery = $query->get()->sortByDesc('created_at')->values();
            // response if success
            return success($gallery, 'Gallery berhasil ditemukan');
        } catch (\Exception $e) {
            Log::error("Failed to get gallery data:" . $e->getMessage());
            return fails('Gagal mendapatkan data gallery', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {
        try {
            // Get validated data from request
            $validatedData = $request->validated();

            // store photo in public directory
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('upload/gallery'), $photoName);
            }

            // store gallery data in database
            Gallery::create([
                'title' => $validatedData['title'],
                'photo' => 'upload/gallery/' . $photoName,
            ]);

            // response if success
            return success(null, 'Gallery berhasil ditambahkan');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to store gallery:' . $e->getMessage());
            return fails('Gagal menambahkan gallery', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // find data in database
            $gallery = Gallery::find($id);

            if ($gallery) {
                // response if success
                return success($gallery, 'Gallery berhasil ditemukan');
            }
            // response if fails
            return fails('Galleri tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to get gallery data:' . $e->getMessage());
            return fails('Gagal mendapatkan data gallery', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, string $id)
    {
        try {
            // find data in database
            $gallery = Gallery::find($id);
            if (!$gallery) {
                // response if not found
                return fails('Galleri tidak ditemukan', 404);
            }
            // Get data from request
            $validatedData = $request->validated();

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
                // store gallery data in database
                $gallery->photo = 'upload/gallery/' . $photoName;
            }

            // store gallery data in database
            $gallery->title = $validatedData['title'];
            $gallery->save();

            // response if success
            return success(null, 'Gallery berhasil diubah');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to update gallery:' . $e->getMessage());
            return fails('Gagal mengubah gallery', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
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

            // response if fails find
            return fails('Galleri tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to delete gallery:' . $e->getMessage());
            return fails('Gagal menghapus gallery', 500);
        }
    }
}
