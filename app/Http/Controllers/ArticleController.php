<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get data from database
        $article = Article::all();
        // return view and data
        if (request()->route()->getName() == 'dashboard.articles.index') {
            return view('dashboard.articles.index', $article);
        }
        return view('articles.index', $article);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $validatedData = $request->validate([
            'title'     => 'required|max:255',
            'body'      => 'required',
            'category'  => 'required',
            'photo'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // store file in public directory
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/article'), $photoName);
        }

        // make new data in database
        $article = new Article;

        // store article data in database
        $article = new Article;
        $article->title = $validatedData['title'];
        $article->body = $validatedData['body'];
        $article->category = $validatedData['category'];
        $article->photo = 'upload/article/' . $photoName;
        $article->save();

        return back()->with('success', "Artikel berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('articles.detail', Article::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.articles.update', Article::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get gallery data in database
        $article = Article::find($id);
        if (!$article) {
            return back()->with('error', "Article tidak ditemukan!");
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
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/article'), $photoName);

            // remove old photo in public directory
            $oldPhotoPath = public_path($article->photo);
            if (file_exists($oldPhotoPath)) {
                @unlink($oldPhotoPath);
            }
        }

        // store gallery data (photo) in database
        $article->title = $validatedData['title'];
        $article->body = $validatedData['body'];
        $article->category = $validatedData['category'];
        $article->photo = 'upload/article/' . $photoName;
        $article->save();

        return back()->with('success', "Artikel berhasil diubah!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get gallery data in database
        $article = Article::find($id);

        if ($article) {
            // remove photo in public directory
            $imagePath = public_path($article->photo);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }

            // remove arti$article data in database
            $article->delete();
            return back()->with('success', "Artikel berhasil dihapus!");
        }
        return back()->with('error', "Artikel tidak ditemukan!");
    }
}
