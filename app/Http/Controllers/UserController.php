<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        // $userAll = User::where('is_active', true)->get();
        // $users = User::where('is_active', false)->get();
        $userAll = User::all();
        return view('admin.user.index', compact('userAll'));
    }

    public function activate(User $user)
    {
        $user->is_active = true;
        $user->save();

        return redirect('admin/user')->with('success', 'Akun Berhasil Diaktifkan');
    }

    public function showProfile()
    {
        $user = User::findOrFail(Auth::id());
        return view('admin.user.profile', compact('user'));
    }
}
