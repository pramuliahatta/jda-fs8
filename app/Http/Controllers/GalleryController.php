<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "galleries";
        if ($request->input('page') != '') {
            $apiUrl .= '?page=' . $request->input('page');
        }
        // Determine the view and perpage based on route
        $viewName =  'gallery.index';
        $perPage = 12;
        if ($request->route()->getName() == 'dashboard.gallery.index') {
            $viewName = 'dashboard.gallery.index';
            $perPage = 10;
        }

        try {
            // Get data from the API
            $response = $client->get($apiUrl, [
                'query' => [
                    'page' => $request->input('page'),
                    'per_page' => $perPage,
                ]
            ]);
            $content = json_decode($response->getBody(), true)['data'];
            $data = $content['data'];
            $link = $content['links'];
            $page = [
                'from' => $content['from'],
                'to' => $content['to'],
                'total' => $content['total'],
            ];
            // For change the link
            foreach ($link as $key => $value) {
                $link[$key]['url'] = str_replace(env('BASE_URL_API') . "galleries", url()->current(), $value['url']);
            }
        } catch (\Exception $e) {
            // If fail data is empty and log error
            Log::error('Failed to get gallery data:' . $e->getMessage());
            $data = [];
            $link = [];
            $page = ['from' => 0, 'to' => 0, 'total' => 0,];
        }
        // Return view and data ($data for data | $pageLinks for link url, label, & isActive | 
        // $pageInfo for showing information)
        return view($viewName, ['data' => $data, 'pageLinks' => $link, 'pageInfo' => $page]);
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
    public function store(StoreGalleryRequest $request, Client $client)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "galleries";

        try {
            // Store data using API
            $response = $client->post($apiUrl, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'multipart' => $multipart,
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.gallery.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->withErrors($errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to store gallery:' . $e->getMessage());
            return redirect()->route('dashboard.gallery.index')->withErrors('Terjadi kesalahan pada server');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "galleries/$id";

        try {
            // Get the data from the API
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];
            // If success, return view and data
            return view('dashboard.gallery.detail', ['data' => $data]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('dashboard.gallery.index')->withErrors($errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get gallery data:' . $e->getMessage());
            return redirect()->route('dashboard.gallery.index')->withErrors('Terjadi kesalahan pada server');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "galleries/$id";

        try {
            // Get the data from the API
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];
            // If success, return view and data
            return view('dashboard.gallery.edit', ['data' => $data]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('dashboard.gallery.index')->withErrors($errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get gallery data:' . $e->getMessage());
            return redirect()->route('dashboard.gallery.index')->withErrors('Terjadi kesalahan pada server');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, string $id, Client $client)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "galleries/$id";

        try {
            $response = $client->post($apiUrl, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'multipart' => $multipart,
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.gallery.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->withErrors($errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to update gallery:' . $e->getMessage());
            return redirect()->route('dashboard.gallery.index')->withErrors('Terjadi kesalahan pada server');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "galleries/$id";

        try {
            $response = $client->delete($apiUrl);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.gallery.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('dashboard.gallery.index')->withErrors($errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to delete gallery:' . $e->getMessage());
            return redirect()->route('dashboard.gallery.index')->withErrors('Terjadi kesalahan pada server');
        }
    }
}
