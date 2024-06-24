<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::all();
        $products = Product::with('productPhoto')->get();

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
            'photos' => 'array|max:3',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return fails($validator->errors(), 422);
        }

        // $user = new User;
        // $user->name = $request->post('name');
        // $user->phone_number = $request->post('phone_number');
        // $user->email = $request->post('email');
        // $user->role = 'member';
        // $user->password = Hash::make('12345');

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            // 'user_id' => Auth::id(),
            'user_id' => $request->user_id,
        ]);

        $productPhoto = false;

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                // Store the file and get the photo
                $uploadedFile = $file;
                // $uploadedFileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFileName = generateUniqueString('product_photos', 'photo', $uploadedFile->getClientOriginalExtension());
                $uploadedFile->move(public_path('upload/product'), $uploadedFileName);

                // Save the file photo in the database
                $productPhoto = ProductPhoto::create([
                    'product_id' => $product->id,
                    'photo' => $uploadedFileName,
                ]);
            }

            if($productPhoto) {
                return success(null, 'Product created successfully');
            }
        }
        
        return fails('Failed to create data', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if($product) {
            $product->load('productPhoto');
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

        // $user = new User;
        // $user->name = $request->post('name');
        // $user->phone_number = $request->post('phone_number');
        // $user->email = $request->post('email');
        // $user->role = 'member';
        // $user->password = Hash::make('12345');

        $productPhoto = false;

        if ($request->hasFile('photos')) {

            foreach ($product->productPhoto as $productPhoto) {
                if (File::exists(public_path('upload/product'), $productPhoto->photo)){
                    unlink(public_path('upload/product/') . $productPhoto->photo);
                }
                // Storage::disk('public')->delete($productPhoto->photo);
                $productPhoto->delete();
            }

            foreach ($request->file('photos') as $file) {
                // Store the file and get the photo
                $uploadedFile = $file;
                // $uploadedFileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFileName = generateUniqueString('product_photos', 'photo', $uploadedFile->getClientOriginalExtension());
                $uploadedFile->move(public_path('upload/product'), $uploadedFileName);

                // Save the file photo in the database
                $productPhoto = ProductPhoto::create([
                    'product_id' => $product->id,
                    'photo' => $uploadedFileName,
                ]);
            }

            if($productPhoto) {
                return success(null, 'Product updated successfully');
            }
        }
        return fails('Failed to update data', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if(!$product) {
            return fails('Product not found', 400);
        }

        foreach ($product->productPhoto as $productPhoto) {
            if (File::exists(public_path('upload/product'), $productPhoto->photo)){
                unlink(public_path('upload/product/') . $productPhoto->photo);
            }
            // Storage::disk('public')->delete($productPhoto->photo);
            $productPhoto->delete();
        }

        $deleteData = $product->delete();

        if($deleteData) {
            return success(null, 'Product deleted successfully');
        }
        return fails('Failed to delete data', 400);
    }
}
