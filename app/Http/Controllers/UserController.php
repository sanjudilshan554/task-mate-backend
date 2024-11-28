<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Ensure it's a string
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user,
        ], 201);
    }

    public function login(Request $request)
{
    // Validate the input
    $validated = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Find the user by email
    $user = User::where('email', $validated['email'])->first();

    // Check if user exists and the password is correct
    if ($user && \Hash::check($validated['password'], $user->password)) {
        return response()->json([
            'success' => true,
            'data' => $user,
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password',
        ], 200);
    }
}

    public function update(int $id, Request $request)
    {
         $user = User::find($id);

         $user->name = $request->name;
         $user->email = $request->email;
         $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $user,
        ], 201);
    }

    public function delete(int $id)
    {
         $user = User::find($id);
         $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User account deleted successfully',
            'data' => $user,
        ], 201);
    }

    public function themeUpdate(int $id, Request $request)
    {
         $user = User::find($id);
         $user->theme = $request->theme;
         $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Theme updated successfully',
            'data' => $user,
        ], 201);
    }

}
