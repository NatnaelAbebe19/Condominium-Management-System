<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(['data' => $users]);
    }
    public function show(User $user)
    {
        return response()->json(['data' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,renter,admin',
        ]);

        $user->update($validated);

        return response()->json(['message' => 'User updated successfully!', 'data' => $user]);
    }

    public function destroy(User $user)
    {

        $user->delete();

        return response()->json(['message' => 'User deleted successfully!']);
    }
}
