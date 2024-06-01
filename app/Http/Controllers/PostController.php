<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //index
    public function index()
    {
        $posts = Post::all();
        return view('pages.postingan.feature-post', compact('posts'));
    }

    //show create post
    public function show()
    {
        return view('pages.postingan.feature-post');
    }

    //feature-post
    public function create()
    {
        return view('pages.postingan.feature-post-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:Tech,News,Political',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming maximum file size is 2MB
            'tags' => 'nullable|string',
            'status' => 'required|string|in:Publish,Draft,Pending',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        $post->tags = $request->tags;
        $post->status = $request->status;

        // Handle thumbnail upload if provided
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = $thumbnail->hashName();
            $thumbnail->storeAs('public/thumbnails', $thumbnailName);
            $post->thumbnail = $thumbnailName;
        }

        $post->save();

        return redirect()->route('show')
            ->with('success', 'Post created successfully.');
    }
}
