<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "articles";
        // Determine the view and perpage based on route
        $currentPage = request()->get('page', 1);
        $viewName =  'articles.index';
        $perPage = 12;
        if ($request->route()->getName() == 'dashboard.articles.index') {
            $viewName = 'dashboard.articles.index';
            $perPage = 10;
        }

        try {
            // Get data from the API
            $response = $client->get($apiUrl, [
                'query' => [
                    'category' => $request->input('category'),
                    'search' => $request->input('search'),
                ]
            ]);
            $content = json_decode($response->getBody(), true);
            $data = collect($content['data']);
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
            Log::error('Failed to get article data:' . $e->getMessage());
            $data = [];
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
        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, Client $client)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "articles";

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
            return redirect()->route('dashboard.articles.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->withErrors($errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to store articles:' . $e->getMessage());
            return redirect()->route('dashboard.articles.index')->withErrors('Terjadi kesalahan pada server');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Client $client, Request $request)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "articles";
        // Determine the view and perpage based on route
        $viewName = "articles.detail";
        $routeName = "articles";
        if ($request->route()->getName() == 'dashboard.articles.show') {
            $viewName = "dashboard.articles.show";
            $routeName = "dashboard.articles.index";
        }

        try {
            // Get the data from the API
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = collect($content['data']);
            $foundArticle = $data->firstWhere('id', $id);
            if (!$foundArticle) {
                return redirect()->route($routeName)->with('error', 'Artikel tidak ditemukan');
            }
            // If success, return view and data
            return view($viewName, ['data' => $data, 'detail' => $foundArticle]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route($routeName)->withErrors($errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get articles data:' . $e->getMessage());
            return redirect()->route($routeName)->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "articles/$id";

        try {
            // Get the data from the API
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];
            // If success, return view and data
            return view('dashboard.articles.edit', ['data' => $data]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('dashboard.articles.index')->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get article data:' . $e->getMessage());
            return redirect()->route('dashboard.articles.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id, Client $client)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();

        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "articles/$id";

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
            return redirect()->route('dashboard.articles.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to store articles:' . $e->getMessage());
            return redirect()->route('dashboard.articles.index')->with('error', 'Terjadi kesalahan pada server');
        }

        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "articles/$id";

        try {
            $response = $client->post($apiUrl, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'multipart' => $multipart,
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.articles.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to update article:' . $e->getMessage());
            return redirect()->route('dashboard.articles.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Client $client)
    {
        // Define endpoint
        $apiUrl = env('BASE_URL_API') . "articles/$id";

        try {
            $response = $client->delete($apiUrl);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.articles.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('dashboard.articles.index')->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to delete article:' . $e->getMessage());
            return redirect()->route('dashboard.articles.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }
}
