<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fetchData = Http::get('http://127.0.0.1:8081/api/products');
        $response = $fetchData->json();
        $data = $response['data'];
        // return $data[0];         
        return view('products.index', compact('data'));
        // if($fetchData->successful()) {
        //     $response = $fetchData->json();
        //     $data = $response['data'];
        //     return view('products.index', compact('data'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required',
            'photos' => 'array|max:3',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validatedData) {
            $fetchData = Http::post('http://127.0.0.1:8081/api/products', $request);
            $response = $fetchData->json();
            $data = $response['data'];
            return redirect()->intended(route('products.index', compact('data')));
            // if($fetchData->successful()) {
            //     $response = $fetchData->json();
            //     $data = $response['data'];
            //     return redirect()->intended(route('products.index', $data));
            // }
        }

        // Redirect or return response
        // return redirect()->route('products.create')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        $fetchData = Http::get('http://127.0.0.1:8081/api/products/' . $product->id);
        $response = $fetchData->json();
        $data = $response['data'];
        return view('products.detail', compact('data'));
        // if($fetchData->successful()) {
        //     $response = $fetchData->json();
        //     $data = $response['data'];
        //     return view('products.show', compact('data'));
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $fetchData = Http::get('http://127.0.0.1:8081/api/products/' . $product->id);
        $response = $fetchData->json();
        $data = $response['data'];
        return view('products.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required',
            'photos' => 'array|max:3',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validatedData) {
            $fetchData = Http::put('http://127.0.0.1:8081/api/products/' . $product->id, $request);
            $response = $fetchData->json();
            $data = $response['data'];
            return redirect()->intended(route('products.index', compact('data')));
            // if($fetchData->successful()) {
            //     $response = $fetchData->json();
            //     $data = $response['data'];
            //     return redirect()->intended(route('products.index', compact('data')));
            // }
        }
        // Redirect or return response
        // return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        // Delete associated photos
        $fetchData = Http::delete('http://127.0.0.1:8081/api/products/' . $product->id);
        $response = $fetchData->json();
        $data = $response['data'];
        return redirect()->intended(route('products.index', compact('data')));

        // Redirect or return response
        // return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
