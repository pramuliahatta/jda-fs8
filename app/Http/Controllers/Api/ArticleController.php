<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\fileExists;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get data from database
        $article = Article::all();
        // response
        return success($article, 'File berhasil ditemukan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'title'     => 'required|max:255',
            'body'      => 'required',
            'category'  => 'required',
            'photo'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validator->fails()) {
            // response if fail
            return fails($validator->errors(), 422);
        }

        // store file in public directory
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/article'), $photoName);
        }

        // store file data in database
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->category = $request->category;
        $article->photo = 'upload/article/' . $photoName;
        $article->save();

        // response if success
        return success(null, 'Article berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get data from database
        $article = Article::find($id);

        if ($article) {
            // response if success
            return success($article, 'Artikel berhasil ditemukan');
        }
        // response if fail
        return fails("Artikel tidak ditemukan", 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get data from database
        $article = Article::find($id);
        if (!$article) {
            // response if fails
            return success(null, 'Artikel tidak ditemukan');
        }

        // validation
        $validator = Validator::make($request->all(), [
            'title'     => 'required|max:255',
            'body'      => 'required',
            'category'  => 'required',
            'photo'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validator->fails()) {
            // response if fail
            return fails($validator->errors(), 422);
        }

        // store file in public directory
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/article'), $photoName);

            // remove old photo in public directory
            $photoPath = public_path($article->photo);
            if (fileExists($photoPath)) {
                @unlink($photoPath);
            }
        }

        // store file data in database
        $article->title = $request->title;
        $article->body = $request->body;
        $article->category = $request->category;
        $article->photo = 'upload/article/' . $photoName;
        $article->save();

        // response if success
        return success(null, 'Article berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get data from database
        $article = Article::find($id);

        if ($article) {
            // remove photo in public directory
            $photoPath = public_path($article->photo);
            if (fileExists($photoPath)) {
                @unlink($photoPath);
            }
            // remove gallery data in database
            $article->delete();
            // response if success
            return success(null, 'Artikel berhasil dihapus');
        }
        // response if fail
        return fails("Artikel tidak ditemukan", 404);
    }
}
