<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $apiUrl = "http://127.0.0.1:8001/api/galleries";

        try {
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];
            if (request()->route()->getName() == 'dashboard.gallery.index') {
                return view('dashboard.gallery.index', ['data' => $data]);
            }
            return view('gallery.index', ['data' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $client = new Client();
        $apiUrl = "http://127.0.0.1:8001/api/galleries";

        try {
            $multipart = [
                [
                    'name' => 'title',
                    'contents' => $validatedData['title']
                ],
            ];

            if ($request->hasFile('photo')) {
                $multipart[] = [
                    'name' => 'photo',
                    'contents' => fopen($request->file('photo')->getPathname(), 'r'),
                    'filename' => $request->file('photo')->getClientOriginalName(),
                ];
            }

            $response = $client->post($apiUrl, [
                'multipart' => $multipart,
            ]);

            // if(){

            // }

            return back()->with('success', "Photo berhasil ditambahkan!");
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = new Client();
        $apiUrl = "http://127.0.0.1:8001/api/galleries/$id";

        try {
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];

            return view('dashboard.gallery.detail', ['data' => $data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // Handle client exceptions (4xx responses)
            $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
            $errorMessage = $responseBody['message'] ?? 'Server error occurred.';
            return redirect()->route('dashboard.gallery.index')->withErrors($errorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $apiUrl = "http://127.0.0.1:8001/api/galleries/$id";

        try {
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];

            return view('dashboard.gallery.edit', ['data' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation input data
        $validatedData = $request->validate([
            'title' => [
                'required',
                'max:255'
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048'
            ],
        ]);

        $client = new Client();
        $apiUrl = "http://127.0.0.1:8001/api/galleries/$id";

        try {
            $multipart = [
                [
                    'name' => 'title',
                    'contents' => $validatedData['title']
                ],
                [
                    'name' => '_method',
                    'contents' => 'PUT'
                ]
            ];

            if ($request->hasFile('photo')) {
                $multipart[] = [
                    'name' => 'photo',
                    'contents' => fopen($request->file('photo')->getPathname(), 'r'),
                    'filename' => $request->file('photo')->getClientOriginalName(),
                ];
                dd($multipart);
            }

            $response = $client->post($apiUrl, [
                'multipart' => $multipart,
            ]);
        } catch (\Exception $e) {
            // return view('api_error', ['error' => $e->getMessage()]);
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $apiUrl = "http://127.0.0.1:8001/api/galleries/{$id}";

        try {
            $response = $client->delete($apiUrl);

            return back()->with('success', "Photo berhasil ditambahkan!");
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
}
