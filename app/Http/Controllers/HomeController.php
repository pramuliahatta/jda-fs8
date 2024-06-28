<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Client $client)
    {
        try {
            // Get data from the API arrticle
            $response1 = $client->get(env('BASE_URL_API') . "articles");
            $content = json_decode($response1->getBody(), true);
            $dataArticle = collect($content['data']);

            $dataBerita = $dataArticle->filter(fn ($el) => $el['category'] == 'Berita')->take(2);
            $dataAcara = $dataArticle->filter(fn ($el) => $el['category'] == 'Acara')->take(2);

            // Get data from the API gallery
            $response2 = $client->get(env('BASE_URL_API') . "galleries");
            $content = json_decode($response2->getBody(), true);
            $dataGallery = collect($content['data'])->take(4);
        } catch (\Exception $e) {
            // If fail data is empty and log error
            Log::error('Failed to get article data:' . $e->getMessage());
            $dataBerita = [];
            $dataAcara = [];
            $dataGallery = [];
        }
        // Return view and data
        return view("home", ['dataBerita' => $dataBerita, 'dataAcara' => $dataAcara, 'dataGallery' => $dataGallery]);
    }
}
