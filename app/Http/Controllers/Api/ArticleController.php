<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);

        try {
            // get all data in database
            $query = Article::query();
            if ($request->has('category')) {
                $categories = $request->query('category');
                $query->whereIn('category', $categories);
            }
            if ($request->has('search')) {
                $search = $request->query('search');

                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%');
                });
            }
            $article = $query->get();
            // response if success
            return success($article, 'Artikel berhasil ditemukan');
        } catch (\Exception $e) {
            Log::error("Failed to get article data:" . $e->getMessage());
            return fails('Gagal mendapatkan data artikel', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        try {
            // Get validated data from request
            $validatedData = $request->validated();

            // store photo in public directory
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('upload/article'), $photoName);
            }

            // store article data in database
            Article::create([
                'title' => $validatedData['title'],
                'body' => $validatedData['body'],
                'category' => $validatedData['category'],
                'photo' => 'upload/article/' . $photoName,
            ]);

            // response if success
            return success(null, 'Artikel berhasil ditambahkan');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to store article:' . $e->getMessage());
            return fails('Gagal menambahkan artikel', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // find data in database
            $article = Article::find($id);

            if ($article) {
                // response if success
                return success($article, 'Artikel berhasil ditemukan');
            }
            // response if fails
            return fails('Artikel tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to get article data:' . $e->getMessage());
            return fails('Gagal mendapatkan data artikel', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleRequest $request, string $id)
    {
        try {
            // find data from database
            $article = Article::find($id);
            if (!$article) {
                // response if fails
                return fails('Artikel tidak ditemukan', 404);
            }
            // Get data from request
            $validatedData = $request->validated();

            if ($request->hasFile('photo')) {
                // store photo in public directory
                $photo = $request->file('photo');
                $photoName = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('upload/article'), $photoName);

                // remove old photo in public directory
                $oldPhotoPath = public_path($article->photo);
                if (file_exists($oldPhotoPath)) {
                    @unlink($oldPhotoPath);
                }
                // store article data in database
                $article->photo = 'upload/article/' . $photoName;
            }

            // store article data in database
            $article->title = $validatedData['title'];
            $article->body = $validatedData['body'];
            $article->category = $validatedData['category'];
            $article->save();

            // response if success
            return success(null, 'Artikel berhasil diubah');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to update article:' . $e->getMessage());
            return fails('Gagal mengubah artikel', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // find data in database
            $article = Article::find($id);

            if ($article) {
                // remove photo in public directory
                $photoPath = public_path($article->photo);
                if (file_exists($photoPath)) {
                    @unlink($photoPath);
                }
                // remove gallery data in database
                $article->delete();
                // response if success
                return success(null, 'Artikel berhasil dihapus');
            }

            // response if fails find
            return fails('Artikel tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to delete article:' . $e->getMessage());
            return fails('Gagal menghapus artikel', 500);
        }
    }
}
