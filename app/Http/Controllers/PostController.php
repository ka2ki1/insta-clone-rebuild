<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with(['user', 'likedUsers', 'comments.user'])->latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:2048'],
            'caption' => ['nullable', 'string', 'max:1000'],
        ]);

        $path = $request->file('image')->store('posts', 'public');

        Post::create([
            'user_id' => Auth::id(),
            'image' => $path,
            'caption' => $request->caption,
        ]);

        return redirect()->route('posts.index')->with('success', '投稿しました');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', '投稿を削除しました');
    }
}
