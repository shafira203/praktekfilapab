<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($username)
    {
        // Ambil user berdasarkan username
        $author = User::where('username', $username)->firstOrFail();

        // Ambil semua post yang ditulis user tersebut
        $posts = Post::where('user_id', $author->id)
                     ->where('published', true)
                     ->latest()
                     ->paginate(6);

        // Kirim ke view
        return view('author.show', compact('author', 'posts'));
    }
}