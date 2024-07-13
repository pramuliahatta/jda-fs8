<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        //pengecekan validasi form yang diisi pada form login
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $formData = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ];

        $client = new Client();
        $apiUrl = env('BASE_URL_API') . "login";

        try {
            // Store data using API
            $fetchData = $client->post($apiUrl, [
                'form_params' => $formData,
            ]);
            $response = json_decode($fetchData->getBody(), true);
            $token = $response['data'];
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                session()->put('api_token', $token);
                if (Auth::user()->role == 'admin') {
                    return redirect()->intended(route('dashboard.articles.index'));
                }
                return redirect()->intended(route('products.index'));
            }
            // $responseMessage = json_decode($response->getBody(), true)['message'];
            // // If success redirect and send success message
            // return redirect()->route('products.index')->with('success', $responseMessage);
        } catch (RequestException $e) {
            // If fails from the request, then back and send error message
            $errorMessage = json_decode($e->getResponse()->getBody(), true)['message'];
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Another fails
            Log::error('Failed to authenticate:' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan pada server');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->intended(route('home'));
    }
}
