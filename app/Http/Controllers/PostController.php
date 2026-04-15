<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('meulogin'); // 🔥 força seu login
        }

        $posts = Post::with('user')->latest()->get();
        return view('menu', compact('posts'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('meulogin');
        }

        $request->validate([
            'content' => 'required|max:280'
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->content
        ]);

        return back();
    }
}