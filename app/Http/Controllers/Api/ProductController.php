<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $pageSize = $request->input('pageSize', 10); // Default page size
        $categories = $request->input('categories', []); // Get categories from request
        $search = $request->input('search', null);
        
        $query = Product::with('productPhoto')->with('user');

        if (!empty($categories)) {
            $query->whereIn('category', $categories); // Adjust field name if needed
        }

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $products = $query->get();

        if($products) {
            return success($products, 'Data fetched succesfully');
        }
        return fails('Failed to fetch data', 422);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required',
            // 'photos' => 'array|max:3',
            // 'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Create product
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'price' => $request->price,
                'user_id' => $request->user_id, // Assuming user_id is passed in request
            ]);

            // Handle product photos
            foreach ($request->file('photos') as $file) {
                $uploadedFileName = generateUniqueString('product_photos', 'photo', $file->getClientOriginalExtension());
                $file->move(public_path('upload/product'), $uploadedFileName);

                ProductPhoto::create([
                    'product_id' => $product->id,
                    'photo' => 'upload/product/' . $uploadedFileName,
                ]);
            }

            return success(null, 'Produk berhasil dibuat');
        } catch (\Exception $e) {
            // Handle exceptions
            return fails('Produk gagal dibuat', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if($product) {
            $product->load('productPhoto')->load('user');
            return success($product, 'Data fetched succesfully');
        }
        return fails('Failed to fetch data', 422);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required',
            'photos' => 'array|max:3',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return fails($validator->errors(), 422);
        }

        $product = Product::find($id);

        $updatedData = $product
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'price' => $request->price,
            ]);

        $productPhoto = false;

        if($request->hasFile('photos')) {
            if(sizeOf($request->file('photos')) > 0) {

                foreach ($product->productPhoto as $productPhoto) {
                    if (File::exists(public_path('upload/product'), basename($productPhoto->photo))){
                        unlink(public_path('upload/product/') . basename($productPhoto->photo));
                    }
                    $productPhoto->delete();
                }
    
                foreach ($request->file('photos') as $file) {
                    // Store the file and get the photo
                    $uploadedFile = $file;
                    $uploadedFileName = generateUniqueString('product_photos', 'photo', $uploadedFile->getClientOriginalExtension());
                    $uploadedFile->move(public_path('upload/product'), $uploadedFileName);
    
                    // Save the file photo in the database
                    $productPhoto = ProductPhoto::create([
                        'product_id' => $product->id,
                        'photo' => 'upload/product/' . $uploadedFileName,
                    ]);
                }
    
                if($productPhoto) {
                    return success(null, 'Produk berhasil diubah');
                }
            } 
        }

        if($updatedData) {
            return success(null, 'Produk berhasil diubah');
        }

        return fails('Produk gagal diubah', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if(!$product) {
            return fails('Produk tidak ditemukan', 400);
        }

        foreach ($product->productPhoto as $productPhoto) {
            if (File::exists(public_path('upload/product'), basename($productPhoto->photo))){
                unlink(public_path('upload/product/') . basename($productPhoto->photo));
            }
            $productPhoto->delete();
        }

        $deleteData = $product->delete();

        if($deleteData) {
            return success(null, 'Produk berhasil dihapus');
        }
        return fails('Produk gagal dihapus', 400);
    }
}
