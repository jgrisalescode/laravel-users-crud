<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Get the users
        $users = User::latest()->get();
        // Load the view and send the users
        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // Return before view
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
