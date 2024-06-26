<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhoto;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
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
    public function index()
    {
        $fetchData = Http::get('http://127.0.0.1:8001/api/products');
        $response = $fetchData->json();
        $data = $response['data'];
        if(Route::current()->getName() == 'products.dashboard') {
            return view('products.dashboard', compact('data'));
        }
        if(Route::current()->getName() == 'dashboard.products.index') {
            return view('dashboard.products.index', compact('data'));
        }
        // return view('products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Route::current()->getName() == 'dashboard.users.index') {
            return view('products.index');
        }
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
            'user_id' => 'required',
            'photos' => 'required|array|max:3',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Initialize Guzzle client
        $client = new Client();

        // Prepare files for multipart upload
        $files = [];
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

        $multipart = array_merge($files, 
            [
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
            $response = $client->post('http://127.0.0.1:8001/api/products', [
                'multipart' => $multipart,
            ]);
            
            // Handle successful response
            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody()->getContents(), true);

            if ($statusCode === 200) {
                $data = $responseData['data']; // Assuming API returns 'data' key in response
                return redirect()->intended(route('products.dashboard', compact('data')));
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
     * Display the specified resource.
     */
    public function show(product $product)
    {
        $fetchData = Http::get('http://127.0.0.1:8001/api/products/' . $product->id);
        $response = $fetchData->json();
        $data = $response['data'];
        // dd($data);
        if(Route::current()->getName() == 'products.preview') {
            return view('products.preview', compact('data'));
        }
        return view('products.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $fetchData = Http::get('http://127.0.0.1:8001/api/products/' . $product->id);
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
                return redirect()->intended(route('products.dashboard', compact('data')));
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
        // Delete associated photos
        $fetchData = Http::delete('http://127.0.0.1:8001/api/products/' . $product->id);
        $response = $fetchData->json();
        $data = $response['data'];
        return redirect()->intended(route('products.index', compact('data')));
    }
}
