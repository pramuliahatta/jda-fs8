<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\fileExists;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get data from database
        $file = File::all();
        // response
        return success($file, 'File berhasil ditemukan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        if ($validator->fails()) {
            // response if fail
            return fails($validator->errors(), 422);
        }

        // store file in public directory
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $uploadedFileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(public_path('upload/file'), $uploadedFileName);
        }

        // store file data in database
        $file = new File;
        $file->name = $request->name;
        $file->file = 'upload/file/' . $uploadedFileName;
        $file->save();

        // response if success
        return success(null, 'File berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // find file data from database
        $file = File::find($id);
        if (!$file) {
            // response if not found
            return fails('File tidak ditemukan', 404);
        }
        // validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        if ($validator->fails()) {
            // response if fail
            return fails($validator->errors(), 422);
        }

        if ($request->hasFile('file')) {
            // store file in public directory
            $uploadedFile = $request->file('file');
            $uploadedFileName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(public_path('upload/file'), $uploadedFileName);

            // remove old file on public dirextory
            $oldFilePath = public_path($file->file);
            if (fileExists($oldFilePath)) {
                @unlink($oldFilePath);
            }
        }

        // store file data in database
        $file->name = $request->name;
        $file->file = 'upload/file/' . $uploadedFileName;
        $file->save();

        // response if success
        return success(null, 'File berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // find file data from database
        $file = File::find($id);
        if ($file) {
            // remove old file on public dirextory
            $oldFilePath = public_path($file->file);
            if (fileExists($oldFilePath)) {
                @unlink($oldFilePath);
            }
            // remove file data on database
            $file->delete();
            // response if success
            return success(null, 'File berhasil dihapus');
        }
        // response if not found
        return fails('File tidak ditemukan', 404);
    }
}
