<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'publish_at' => 'required|date',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'publish_at' => Carbon::parse($request->publish_at),
            'status' => false,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post scheduled successfully.');
    }

    public function index()
    {
        $currentTime = now();
        Log::info('Current Time: ' . $currentTime); // This will log the current time to storage/logs/laravel.log
       // $posts = Post::all();
       $posts = Post::where('status', false)->get();
        // $posts = Post::where('status', true)
        // ->where('publish_at', '<=', now())
        // ->get();

        return view('posts.index', compact('posts'));
    }
}

