<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "products";

        $currentPage = request()->get('page', 1);
        $search = $request->input('search', null);
        $categories = $request->input('categories', []);
        $user = null;

        $perPage = 12;
        $viewName = 'products.index';
        
        if(Route::current()->getName() == 'products.index' || Route::current()->getName() == 'dashboard.products.index') {
            $perPage = 10;
            if(Route::current()->getName() == 'products.index') {
                $viewName = 'products.dashboard';
                $user = Auth::user()->id;
            }
            if(Route::current()->getName() == 'dashboard.products.index') {
                $viewName = 'dashboard.products.index';
            }
        }

        try {
            // Get data from the API
            $fetchData = $client->get($apiUrl, [
                'query' => [
                    'search' => $search,
                    'categories' => $categories,
                    'user' => $user,
                ]
            ]);
            $response = json_decode($fetchData->getBody(), true);

            $data = collect($response['data']);
            $currentPageItems = $data->slice(($currentPage - 1) * $perPage, $perPage)->all();
            
            $paginator = new LengthAwarePaginator(
                $currentPageItems,
                count($data),
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]
            );
        } catch (\Exception $e) {
            // If fail data is empty and log error
            Log::error('Failed to get product data:' . $e->getMessage());
            $currentPageItems = [];
            $paginator = [];
            $categories = [];
        }

        // Return view and data ($data for data | $pageLinks for link url, label, & isActive | 
        // $pageInfo for showing information)
        return view($viewName, [
            'data' => $currentPageItems, 
            'paginator' => $paginator,
            'categories' => $categories,
        ]);
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
    public function store(StoreProductRequest $request)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "products";

        

        try {
            // Store data using API
            $response = $client->post($apiUrl, [
                'multipart' => $multipart,
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('products.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to store products:' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "products/" . $product->id;

        $routeName = 'products';
        $viewName = 'products.detail';
        if(Route::current()->getName() == 'products.show') {
            $viewName = 'products.show';
            $routeName = 'products.index';
        }
        if(Route::current()->getName() == 'dashboard.products.show') {
            $viewName = 'dashboard.products.show';
            $routeName = 'dashboard.products.index';
        }

        // $user = User::find(Auth::user()->id);
        // $token = $user->tokens()->latest()->first();

        try {
            // Get the data from the API
            $fetchData = $client->get($apiUrl);
            $response = json_decode($fetchData->getBody(), true);
            $data = $response['data'];
            $data['user']['phone_number'] = preg_replace('/[^0-9]/', '', $data['user']['phone_number']);

            // $seller = $data['user']['name'];
            $productName = $data['name'];
            $automatedText = "Halo kak, \n Saya tertarik membeli produk $productName. Apakah produk ini tersedia ? Juga, bagaimana cara untuk pemesanannya? \n Ditunggu ya kak.";
            $automatedText = urlencode($automatedText);

            // If success, return view and data
            return view($viewName, [
                'data' => $data,
                'automatedText' => $automatedText,
            ]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route($routeName)->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get products data:' . $e->getMessage());
            return redirect()->route($routeName)->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "products/" . $product->id;

        try {
            // Get the data from the API
            $fetchData = $client->get($apiUrl);
            $response = json_decode($fetchData->getBody(), true);
            $data = $response['data'];
            $imagePaths = [];
            foreach($data['product_photo'] as $imagePath) {
                $imagePaths[] = $imagePath['photo'];
            }

            // If success, return view and data
            return view('products.edit', ['data' => $data, 'imagePaths' => $imagePaths]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('products.index')->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get products data:' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, product $product)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "products/" . $product->id;

        try {
            $response = $client->post($apiUrl, [
                'multipart' => $multipart,
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('products.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to update products:' . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "products/" . $product->id;

        $routeName = 'products.index';
        // $viewName = 'products.destroy';
        if(Route::current()->getName() == 'dashboard.products.destroy') {
            // $viewName = 'products.show';
            $routeName = 'dashboard.products.index';
        }

        try {
            $response = $client->delete($apiUrl);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route($routeName)->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route($routeName)->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to delete products:' . $e->getMessage());
            return redirect()->route($routeName)->with('error', 'Terjadi kesalahan pada server');
        }
    }
}
