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
    public function index()
    {
        $users = User::all();

        return success($users, 'Data fetched successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|max:255',
            'phone_number' => 'required|min:7|max:20',
            'email' => 'required|unique:users|email:dns',
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
            'password' => Hash::make('12345'),
        ]);
        if ($storeData) {
            return success(null, 'User created successfully');
        }

        return fails('Error', 400);
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

        return fails('Error', 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'nullable|min:4|max:255',
            'phone_number' => 'required|min:7|max:20',
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

        $updatedData = false;
        
        if($user->phone_number != $request->phone_number) {
            $updatedData = User::where('id', $id)
            ->update([
                'phone_number' => $request->phone_number,
            ]);
        }
        
        if($request->password) {
            $updatedData = User::where('id', $id)
            ->update([
                'password' => Hash::make($request->password),
            ]);
        }
        
        if ($updatedData) {
            return success(null, 'User updated successfully');
        }

        return fails('User update failed', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::destroy($id);
        if($user) {
            return success(null, 'User deleted successfully');
        }

        return fails('Failed', 400);
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
            return fails('Login Failed', 422);
        }
        // $request->session()->regenerate();
        // $user = Auth::user();

        $token = $user->createToken(uniqid())->plainTextToken;

        return success($user, 'Login Success');

    }
}
