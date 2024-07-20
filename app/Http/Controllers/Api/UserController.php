<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // get all data in database
            $query =  User::where('role', '!=', 'admin');
            if ($request->has('search')) {
                $search = $request->query('search');

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }

            $user = $query->get()->sortByDesc('updated_at')->values();
            // response if success
            return success($user, 'Pengguna berhasil ditemukan');
        } catch (\Exception $e) {
            Log::error("Failed to get user data:" . $e->getMessage());
            return fails('Gagal mendapatkan data pengguna', 500);
        }

        // // $pageSize = $request->input('pageSize', 10); // Default page size

        // // $users = User::paginate($pageSize);
        // $search = $request->input('search', null);

        // $query = User::query();

        // if (!empty($search)) {
        //     $query->where('name', 'like', '%' . $search . '%');
        // }

        // $users = $query->get();

        // return success($users, 'Data fetched successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $validatedData = $request->validated();
        try {
            // Get validated data from request
            $validatedData = $request->validated();

            // store user data in database
            User::create([
                'name' => $validatedData['name'],
                'phone_number' => $validatedData['phone_number'],
                'email' => $validatedData['email'],
                'role' => 'member',
                'password' => Hash::make($validatedData['password']),
            ]);

            return success(null, 'Pengguna berhasil ditambahkan');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to store user:' . $e->getMessage());
            return fails('Gagal menambahkan pengguna', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // find data in database
            $user = User::find($id);

            if ($user) {
                // response if success
                return success($user, 'Pengguna berhasil ditemukan');
            }
            // response if fails
            return fails('Pengguna tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to get user data:' . $e->getMessage());
            return fails('Gagal mendapatkan data produk', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try {
            // find data in database
            $user = User::find($id);
            if (!$user) {
                // response if not found
                return fails('Pengguna tidak ditemukan', 404);
            }
            // Get data from request
            $validatedData = $request->validated();

            // store user data in database
            $user->update([
                'name' => $validatedData['name'],
            ]);

            if ($user->phone_number != $validatedData['phone_number']) {
                $user->update([
                    'phone_number' => $validatedData['phone_number'],
                ]);
            }

            if ($user->email != $validatedData['email']) {
                $user->update([
                    'email' => $validatedData['email'],
                ]);
            }

            if (!is_null($validatedData['password'])) {
                $user->update([
                    'password' => Hash::make($validatedData['password']),
                ]);
            }
            // response if success
            return success(null, 'Pengguna berhasil diubah');
        } catch (ValidationException $e) {
            return fails($e->errors(), 422);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to update user:' . $e->getMessage());
            return fails('Gagal mengubah produk', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // check is admin
            if ($id == 1) return fails('Akses tidak diizinkan', 403);
            // find data in database
            $user = User::find($id);

            if ($user) {
                // remove users data in database
                $user->delete();
                // response if success
                return success(null, 'Pengguna berhasil dihapus');
            }

            // response if fails find
            return fails('Pengguna tidak ditemukan', 404);
        } catch (\Exception $e) {
            // response if fails
            Log::error('Failed to delete users:' . $e->getMessage());
            return fails('Gagal menghapus pengguna', 500);
        }
    }

    public function authenticate(Request $request)
    {

        //pengecekan validasi form yang diisi pada form login
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return fails($validator->errors(), 422);
        }

        $email = $request->input('email');
        $password = $request->input('password');

        //cek jika email dan password sesuai dengan apa yang ada di database

        $user = User::where("email", $email)->first();
        if ($user == null || !Hash::check($password, $user->password)) {
            return fails('Gagal Masuk', 422);
        }

        $token = $user->createToken('authToken')->plainTextToken;
        return success($token, 'Berhasil Masuk');
    }
}
