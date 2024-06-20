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
        $apiUrl = "http://jda-fs8.test/api/galleries";

        try {
            $response = $client->get($apiUrl);
            $data = json_decode($response->getBody(), true)['data'];
            if (request()->route()->getName() == 'dashboard.gallery.index') {
                return view('dashboard.gallery.index', ['galleryData' => $data]);
            }
            return view('gallery.index', ['galleryData' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }

        // $response = Http::get('http://jda-fs8.test/api/galleries');
        // if ($response->successful()) {
        //     $data = $response->json();
        //     $data = $data['data'];
        //     if (request()->route()->getName() == 'dashboard.gallery.index') {
        //         return view('dashboard.gallery.index', compact('data'));
        //     }
        //     return view('gallery.index', compact('data'));
        // }
        // return abort(404, 'Data tidak ada!');
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
        $apiUrl = "http://jda-fs8.test/api/galleries";

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

            $response = $client->put($apiUrl, [
                'multipart' => $multipart,
            ]);

            return back()->with('success', "Photo berhasil ditambahkan!");
        } catch (\Exception $e) {
            return back()->withErrors(['error' => "Photo berhasil ditambahkan!" . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $apiUrl = "http://jda-fs8.test/api/galleries/{$id}";

        try {
            $response = $client->get($apiUrl);
            $data = json_decode($response->getBody(), true)['data'];

            return view('dashboard.gallery.update', ['galleryData' => $data]);
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
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048'
            ],
        ]);

        $client = new Client();
        $apiUrl = "http://jda-fs8.test/api/galleries/{$id}";

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

            $response = $client->put($apiUrl, [
                'multipart' => $multipart,
            ]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $apiUrl = "http://jda-fs8.test/api/galleries/{$id}";

        try {
            $response = $client->delete($apiUrl);

            return back()->with('success', "Photo berhasil ditambahkan!");
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
}
