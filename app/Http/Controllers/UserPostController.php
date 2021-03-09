<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(5);
        return view('user.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
