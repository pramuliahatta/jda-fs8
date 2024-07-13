<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "users";

        $currentPage = request()->get('page', 1);
        $search = $request->input('search', null);

        $perPage = 10;
        $viewName = 'dashboard.users.index';

        // $apiToken = null;
        // if(session()->has('api_token')) {
        //     $apiToken = session()->get('api_token');
        // } else {
        //     dd(false);
        // }
        
        $apiToken = session()->get('api_token');

        try {
            // Get data from the API
            $fetchData = $client->get($apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer '. $apiToken,
                ],
                'query' => [
                    'search' => $search,
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
            Log::error('Failed to get user data:' . $e->getMessage());
            $currentPageItems = [];
            $paginator = [];
        }

        // Return view and data ($data for data | $pageLinks for link url, label, & isActive | 
        // $pageInfo for showing information)
        return view($viewName, [
            'data' => $currentPageItems, 
            'paginator' => $paginator,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengembalikan tampilan dashboard admin menu user
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "users";

        $apiToken = session()->get('api_token');

        try {
            // Store data using API
            $response = $client->post($apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer '. $apiToken,
                ],
                'multipart' => $multipart,
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.users.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to store users:' . $e->getMessage());
            return redirect()->route('dashboard.users.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "users/" . $user->id;

        $routeName = 'dashboard.users.show';
        $viewName = 'dashboard.users.show';

        // $user = User::find(Auth::user()->id);
        // $token = $user->tokens()->latest()->first();

        $apiToken = session()->get('api_token');

        try {
            // Get the data from the API
            $fetchData = $client->get($apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer '. $apiToken,
                ],
            ]);
            $response = json_decode($fetchData->getBody(), true);
            $data = $response['data'];

            // If success, return view and data
            return view($viewName, [
                'data' => $data,
            ]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route($routeName)->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get users data:' . $e->getMessage());
            return redirect()->route($routeName)->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "users/" . $user->id;

        $apiToken = session()->get('api_token');

        try {
            // Get the data from the API
            $fetchData = $client->get($apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer '. $apiToken,
                ],
            ]);
            $response = json_decode($fetchData->getBody(), true);
            $data = $response['data'];
            // If success, return view and data
            return view('dashboard.users.edit', ['data' => $data]);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route('dashboard.users.index')->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to get users data:' . $e->getMessage());
            return redirect()->route('dashboard.users.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Get multipart data from request
        $multipart = $request->getMultipart();
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "users/" . $user->id;

        $apiToken = session()->get('api_token');

        try {
            $response = $client->post($apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer '. $apiToken,
                ],
                'multipart' => $multipart,
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route('dashboard.users.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to update users:' . $e->getMessage());
            return redirect()->route('dashboard.users.index')->with('error', 'Terjadi kesalahan pada server');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Define endpoint
        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "users/" . $user->id;

        $routeName = 'dashboard.users.index';

        $apiToken = session()->get('api_token');

        try {
            $response = $client->delete($apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer '. $apiToken,
                ],
            ]);
            $responseMessage = json_decode($response->getBody(), true)['message'];
            // If success redirect and send success message
            return redirect()->route($routeName)->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request API, then redirect and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return redirect()->route($routeName)->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to delete users:' . $e->getMessage());
            return redirect()->route($routeName)->with('error', 'Terjadi kesalahan pada server');
        }
    }

    public function adminCheck(User $user)
    {
        //cek jika role user sama dengan 'admin'
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }
}
