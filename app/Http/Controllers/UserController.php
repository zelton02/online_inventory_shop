<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('user.home', ['users' => $users]);
    }

    public function store(Request $request)
    {
        // Validate user input (you can add more validation rules as needed)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address' => 'required|string',
            'contact' => 'required|string',
            'is_admin' => 'boolean', // Validate the 'is_admin' field
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->contact = $request->input('contact');
        $user->is_admin = $request->input('is_admin', false); // Default to false if not provided
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function showUpdate($id)
    {
        $user = User::findOrFail($id);
        return view('user.updateUser', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Validate user input (you can add more validation rules as needed)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'address' => 'required|string',
            'contact' => 'required|string',
            'is_admin' => 'boolean', // Validate the 'is_admin' field
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->address = $request->input('address');
        $user->contact = $request->input('contact');
        $user->is_admin = $request->input('is_admin', false); // Default to false if not provided
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
