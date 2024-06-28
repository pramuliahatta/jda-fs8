<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Pagination\LengthAwarePaginator;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "files";
        // Determine the view and perpage based on route
        $currentPage = request()->get('page', 1);
        $viewName = 'form.formuser';
        $perPage = 12;
        if ($request->route()->getName() == 'dashboard.forms.index') {
            $viewName = 'dashboard.forms.index';
            $perPage = 10;
        }

        try {
            // Get data from the API
            $response = $client->get($apiUrl, [
                'query' => [
                    'search' => $request->input('search'),
                ]
            ]);
            $content = json_decode($response->getBody(), true);
            $data = collect($content['data']);
            $currentPageItems = $data->slice(($currentPage - 1) * $perPage, $perPage)->all();
            // dd($currentPageItems);
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
            Log::error('Failed to get gallery data:' . $e->getMessage());
            $currentPageItems = [];
            $paginator = [];
        }
        // Return view and data ($data for data | $pageLinks for link url, label, & isActive | 
        // $pageInfo for showing information)
        return view($viewName, ['data' => $currentPageItems, 'paginator' => $paginator]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view create page 
        return view('dashboard.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request, Client $client)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "files";

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
            return redirect()->route('dashboard.forms.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to store file:' . $e->getMessage());
            return redirect()->route('dashboard.forms.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "files/$id";

        try {
            // Get the data from the API
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];
            // If success, return view and data
            return view('dashboard.forms.show', ['data' => $data]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('dashboard.forms.index')->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get forms data:' . $e->getMessage());
            return redirect()->route('dashboard.forms.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Client $client)
    {
        // Define endpoint

        $apiUrl = env('BASE_URL_API') . "files/$id";

        try {
            // Get the data from the API
            $response = $client->get($apiUrl);
            // dd($response->getBody());
            // dd($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];
            // If success, return view and data

            return view('dashboard.forms.edit', ['data' => $data]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];

            return redirect()->route('dashboard.forms.index')->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            // dd($e);
            Log::error('Failed to get file data:' . $e->getMessage());
            return redirect()->route('dashboard.forms.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }









    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, string $id, Client $client)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "files/$id";

        try {
            $response = $client->post($apiUrl, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'multipart' => $multipart,
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.forms.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to update file:' . $e->getMessage());
            return redirect()->route('dashboard.forms.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "files/$id";

        try {
            $response = $client->delete($apiUrl);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.forms.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('dashboard.forms.index')->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to delete file:' . $e->getMessage());
            return redirect()->route('dashboard.forms.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }
}
