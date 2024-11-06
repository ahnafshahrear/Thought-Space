<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller 
{
    public function index () 
    {
        $posts = Auth::user()->posts()->latest()->paginate(3);

        return view('users.dashboard', ['posts' => $posts]);
    }
    
    public function posts(User $user)
    {   
        $posts = $user->posts()->latest()->paginate(3);

        return view('users.posts', [
            'posts' => $posts,
            'user' => $user
        ]); 
    }
}