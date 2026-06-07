<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::withCount('bookings')->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function toggleRole(User $user)
    {
        // Don't allow demoting yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot change your own role.');
        }

        $user->update([
            'role' => $user->role === 'admin' ? 'student' : 'admin'
        ]);

        return back()->with('success', "User role updated to {$user->role}.");
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }
        $user->delete();
        return back()->with('success', 'User deleted.');
    }
}
