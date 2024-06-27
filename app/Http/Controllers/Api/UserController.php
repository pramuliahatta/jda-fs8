<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $pageSize = $request->input('pageSize', 10); // Default page size

        // $users = User::paginate($pageSize);
        $search = $request->input('search', null);

        $query = User::query();

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $users = $query->get();

        return success($users, 'Data fetched successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|max:255',
            'phone_number' => 'required|unique:users|min:7|max:20',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:4|confirmed',
        ]);

        if ($validator->fails()) {
            return fails($validator->errors(), 422);
        }

        // $user = new User;
        // $user->name = $request->post('name');
        // $user->phone_number = $request->post('phone_number');
        // $user->email = $request->post('email');
        // $user->role = 'member';
        // $user->password = Hash::make('12345');

        $storeData = User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'role' => 'member',
            'password' => Hash::make($request->password),
        ]);
        if ($storeData) {
            return success(null, 'Pengguna berhasil ditambah');
        }

        return fails('Pengguna gagal ditambah', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if($user) {
            return success($user, 'Data fetched successfully');
        }

        return fails('Failed to fetch data', 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|max:255',
            'phone_number' => 'required|min:7|max:20',
            'email' => 'required|email:dns',
            'password' => 'nullable|min:4|confirmed',
        ]);

        if ($validator->fails()) {
            return fails($validator->errors(), 422);
        }

        $user = User::find($id);

        // $user = new User;
        // $user->name = $request->post('name');
        // $user->phone_number = $request->post('phone_number');
        // $user->email = $request->post('email');
        // $user->role = 'member';
        // $user->password = Hash::make('12345');

        // return $request;

        $updatedData = User::where('id', $id)
            ->update([
                'name' => $request->name,
            ]);
        
        if($user->phone_number != $request->phone_number) {
            $updatedData = User::where('id', $id)
            ->update([
                'phone_number' => $request->phone_number,
            ]);
        }

        if($user->email != $request->email) {
            $updatedData = User::where('id', $id)
            ->update([
                'email' => $request->email,
            ]);
        }
        
        if(!is_null($request->password)) {
            $updatedData = User::where('id', $id)
            ->update([
                'password' => Hash::make($request->password),
            ]);
        }
        
        if ($updatedData) {
            return success(null, 'Pengguna berhasil diubah');
        }

        return fails('Pengguna gagal diubah', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::destroy($id);
        if($user) {
            return success(null, 'Pengguna berhasil dihapus');
        }

        return fails('Pengguna gagal dihapus', 400);
    }

    public function authenticate(Request $request) {

        //pengecekan validasi form yang diisi pada form login
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return fails($validator->errors(), 422);
        }

        $email = $request->post("email");
        $password = $request->post("password");

        //cek jika email dan password sesuai dengan apa yang ada di database

        $user = User::where("email", $email)->first();
        if ($user == null || !Hash::check($password, $user->password)) {
            return fails('Gagal Masuk', 422);
        }
        // $request->session()->regenerate();
        // $user = Auth::user();

        $token = $user->createToken(uniqid())->plainTextToken;

        return success($token, 'Berhasil Masuk');

    }
}
