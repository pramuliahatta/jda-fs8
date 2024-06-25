<?php

namespace App\Http\Controllers\Api;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;
use Illuminate\Validation\ValidationException;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);

        try {
            // get all data in database
            $file = File::paginate($perPage);
            // response if success
            return success($file, 'File berhasil ditemukan');
        } catch (\Exception $e) {
            Log::error("Failed to get file data:" . $e->getMessage());
            return fails('Gagal mendapatkan data file', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        try {
            // Get validated data from request
            $validatedData = $request->validated();

            // store file in public directory
            if ($request->hasFile('file')) {
                $form = $request->file('file');
                $formName = time() . '.' . $form->getClientOriginalExtension();
                $form->move(public_path('upload/file'), $formName);
            }

            // store file data in database
            File::create([
                'name' => $validatedData['name'],
                'file' => 'upload/file/' . $formName,
            ]);

            // response if success
            return success(null, 'File berhasil ditambahkan');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to store file:' . $e->getMessage());
            return fails('Gagal menambahkan file', 500);
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
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, string $id)
    {
        try {
            // find data in database
            $file = File::find($id);
            if (!$file) {
                // response if not found
                return fails('File tidak ditemukan', 404);
            }
            // Get data from request
            $validatedData = $request->validated();

            if ($request->hasFile('file')) {
                // store file in public directory
                $form = $request->file('file');
                $formName = time() . '.' . $form->getClientOriginalExtension();
                $form->move(public_path('upload/file'), $formName);

                // remove old file in public directory
                $oldFilePath = public_path($file->file);
                if (file_exists($oldFilePath)) {
                    @unlink($oldFilePath);
                }
                // store file data in database
                $file->file = 'upload/file/' . $formName;
            }

            // store file data in database
            $file->name = $validatedData['name'];
            $file->save();

            // response if success
            return success(null, 'File berhasil diubah');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to update file:' . $e->getMessage());
            return fails('Gagal mengubah file', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // find data in database
            $file = File::find($id);

            if ($file) {
                // remove file in public directory
                $oldFilePath = public_path($file->file);
                if (file_exists($oldFilePath)) {
                    @unlink($oldFilePath);
                }
                // remove file data in database
                $file->delete();
                // response if success
                return success(null, 'File berhasil dihapus');
            }

            // response if fails find
            return fails('File tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to delete file:' . $e->getMessage());
            return fails('Gagal menghapus file', 500);
        }
    }
}
