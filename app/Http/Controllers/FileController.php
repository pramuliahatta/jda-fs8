<?php

namespace App\Http\Controllers;

use App\Models\File;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\fileExists;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8081/api/files');
        if ($response->successful()) {
            $data = $response->json()['data'];
            if (request()->route()->getName() == 'services') {
                return view('form.formuser', compact('data'));
            }
            return view('dashboard.forms.index', compact('data'));
        }
        return abort(404, 'Data tidak ada!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // view create page 
        return view('dashboard.file-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        // store file in public directory
        $uploadedFile = $request->file('file');
        $uploadedFileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(public_path('/file/upload'), $uploadedFile);

        // make new data in database
        $file = new File;

        // store file data in database
        $file->name = $validatedData['name'];
        $file->file = '/file/upload/' . $uploadedFileName;
        $file->save();

        // stay in the page and return success message
        return back()->with('success', 'File berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(file $file)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $apiUrl = "http://127.0.0.1:8001/api/files/$id";

        try {
            $response = $client->get($apiUrl);
            $content = json_decode($response->getBody(), true);
            $data = $content['data'];

            return view('dashboard.forms.edit', ['data' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // get file data in database
        $file = File::find($id);
        if (!$file) {
            return back()->with('error', 'File tidak ditemukan!');
        }

        // validation input data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('file')) {
            // store file in public directory
            $uploadedFile = $request->file('file');
            $uploadedFileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(public_path('/file/upload'), $uploadedFile);

            // remove old file in public directory
            $oldFilePath = public_path($file->file);
            if (file_exists($oldFilePath)) {
                @unlink($oldFilePath);
            }

            // store file data (file) in database
            $file->file = 'file/upload/' . $uploadedFileName;
        }

        // store file data (name) in database
        $file->name = $validatedData['name'];
        $file->save();

        // stay in the page and return success message
        return back()->with('success', 'File berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get file data in database
        $file = File::find($id);

        if ($file) {
            // remove file in public directory
            $filePath = public_path($file->file);
            if (fileExists($filePath)) {
                @unlink($filePath);
            }

            // remove file data in database
            $file->delete();
            return back()->with('success', 'File berhasil dihapus!');
        }
        return back()->with('error', 'File tidak ditemukan!');
    }
}
