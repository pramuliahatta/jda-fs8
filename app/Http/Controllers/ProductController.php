<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductPhoto;
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

        $perPage = 12;
        $viewName = 'products.index';
        
        if(Route::current()->getName() == 'products.index' || Route::current()->getName() == 'dashboard.products.index') {
            $perPage = 10;
            if(Route::current()->getName() == 'products.index') {
                $viewName = 'products.dashboard';
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
            // If success, return view and data
            return view('products.edit', ['data' => $data]);
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
    public function update(Request $request, product $product)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'price' => 'required',
            'user_id' => 'required',
            'photos' => 'array|max:3',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Initialize Guzzle client
        $client = new Client();

        // Prepare files for multipart upload
        $files = [];
        if($request->hasFile('photos')) {
            if(sizeOf($request->file('photos')) > 0) {
                foreach ($request->file('photos') as $file) {
                    $files[] = [
                        'name' => 'photos[]',
                        'contents' => fopen($file->getPathname(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                        'headers'  => [
                            'Content-Type' => 'multipart/form-data'
                        ],
                    ];
                }
            }
        }

        $multipart = array_merge($files, [
                    [
                        'name' => '_method',
                        'contents' => 'PUT',
                    ],
                    [
                        'name' => 'name',
                        'contents' => $validatedData['name'],
                    ],
                    [
                        'name' => 'description',
                        'contents' => $validatedData['description'],
                    ],
                    [
                        'name' => 'category',
                        'contents' => $validatedData['category'],
                    ],
                    [
                        'name' => 'price',
                        'contents' => $validatedData['price'],
                    ],
                    [
                        'name' => 'user_id',
                        'contents' => $validatedData['user_id'],
                    ],
                ]
            );

        try {
            // Send POST request using Guzzle client
            $response = $client->post('http://127.0.0.1:8001/api/products/' . $product->id, [
                'multipart' => $multipart,
            ]);
            
            // Handle successful response
            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody()->getContents(), true);
            // dd($responseData);

            if ($statusCode === 200) {
                $data = $responseData['data']; // Assuming API returns 'data' key in response
                return redirect()->intended(route('products.index', compact('data')));
            } else {
                // Handle unsuccessful response
                return back()->with('error', 'Failed to create product: ' . $statusCode);
            }
        } catch (RequestException $e) {
            // Guzzle request exception handling
            Log::error('Failed to send POST request to API: ' . $e->getMessage());
            return back()->with('error', 'Failed to communicate with API: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Other exceptions handling
            Log::error('Failed to communicate with API: ' . $e->getMessage());
            return back()->with('error', 'Failed to communicate with API: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $client = new Client();

        // dd($product->id);
        try {
            // Send POST request using Guzzle client
            $response = $client->delete('http://127.0.0.1:8001/api/products/' . $product->id);
            
            // Handle successful response
            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody()->getContents(), true);
            // dd($responseData);

            if ($statusCode === 200) {
                $data = $responseData['data']; // Assuming API returns 'data' key in response
                if(Route::current()->getName() == 'dashboard.products.destroy') {
                    return redirect()->intended(route('dashboard.products.index', compact('data')));    
                }
                return redirect()->intended(route('products.index', compact('data')));
            } else {
                // Handle unsuccessful response
                return back()->with('error', 'Failed to create product: ' . $statusCode);
            }
        } catch (RequestException $e) {
            // Guzzle request exception handling
            Log::error('Failed to send POST request to API: ' . $e->getMessage());
            return back()->with('error', 'Failed to communicate with API: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Other exceptions handling
            Log::error('Failed to communicate with API: ' . $e->getMessage());
            return back()->with('error', 'Failed to communicate with API: ' . $e->getMessage());
        }

        // Delete associated photos
        // $fetchData = Http::delete('http://127.0.0.1:8001/api/products/' . $product->id, [
        //     'method' => 'DELETE',
        // ]);
        // $response = $fetchData->json();
        // $data = $response['data'];
        // return redirect()->intended(route('products.index', compact('data')));
    }
}
