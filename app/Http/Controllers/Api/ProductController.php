<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // get all data in database
            $query =  Product::with('productPhoto')->with('user');
            if ($request->has('search')) {
                $search = $request->query('search');

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }

            if ($request->has('user')) {
                $user = $request->query('user');

                $query->where(function ($q) use ($user) {
                    $q->where('user_id', $user);
                });
            }

            if ($request->has('categories')) {
                $categories = $request->query('categories');

                $query->whereIn('category', $categories);
            }

            $product = $query->get()->sortByDesc('updated_at')->values();
            // response if success
            return success($product, 'Produk berhasil ditemukan');
        } catch (\Exception $e) {
            Log::error("Failed to get product data:" . $e->getMessage());
            return fails('Gagal mendapatkan data produk', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        try {
            // Get validated data from request
            $validatedData = $request->validated();

            // store product data in database
            $product = Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'category' => $validatedData['category'],
                'price' => $validatedData['price'],
                'user_id' => $validatedData['user_id'], 
            ]);

            // store photo in public directory
            foreach ($validatedData['photos'] as $photo) {
                $uploadedFileName = generateUniqueString('product_photos', 'photo', $photo->getClientOriginalExtension());
                $photo->move(public_path('upload/product'), $uploadedFileName);

                ProductPhoto::create([
                    'product_id' => $product->id,
                    'photo' => 'upload/product/' . $uploadedFileName,
                ]);
            }
            return success(null, 'Product berhasil ditambahkan');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to store product:' . $e->getMessage());
            return fails('Gagal menambahkan product', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // find data in database
            $product = Product::find($id);

            if ($product) {
                // response if success
                $product->load('productPhoto')->load('user');
                return success($product, 'Produk berhasil ditemukan');
            }
            // response if fails
            return fails('Produk tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to get product data:' . $e->getMessage());
            return fails('Gagal mendapatkan data produk', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {

        try {
            // find data in database
            $product = Product::find($id);
            if (!$product) {
                // response if not found
                return fails('Produk tidak ditemukan', 404);
            }
            // Get data from request
            $validatedData = $request->validated();

            // store product data in database
            $updatedData = $product
                ->update([
                    'name' => $validatedData['name'],
                    'description' => $validatedData['description'],
                    'category' => $validatedData['category'],
                    'price' => $validatedData['price'],
                ]);

            $productPhoto = false;

            if($request->hasFile('photos')) {
                // if(sizeOf($request->file('photos')) > 0) {

                    foreach ($product->productPhoto as $productPhoto) {
                        if (File::exists(public_path('upload/product'), basename($productPhoto->photo))){
                            unlink(public_path('upload/product/') . basename($productPhoto->photo));
                        }
                        $productPhoto->delete();
                    }
        
                    foreach ($validatedData['photos'] as $file) {
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
        
                // } 
            }

            // response if success
            return success(null, 'Produk berhasil diubah');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to update product:' . $e->getMessage());
            return fails('Gagal mengubah produk', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // find data in database
            $product = Product::find($id);

            if ($product) {
                // remove photo in public directory
                foreach ($product->productPhoto as $productPhoto) {
                    if (File::exists(public_path('upload/product/'), basename($productPhoto->photo))){
                        unlink(public_path('upload/product/') . basename($productPhoto->photo));
                    }
                    $productPhoto->delete();
                }
                // remove products data in database
                $product->delete();
                // response if success
                return success(null, 'Produk berhasil dihapus');
            }

            // response if fails find
            return fails('Produk tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to delete products:' . $e->getMessage());
            return fails('Gagal menghapus produk', 500);
        }
    }
}
