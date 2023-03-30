<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(4);

        return view('posts', compact('posts'));
    }

    /**
     * Display a listing of the resource after search.
     */
    public function search(Request $request)
    {
        $posts = Post::query()
            ->when($request->input('search'), fn($q, $s) => $q->where('title', 'like', "%$s%")
                ->orWhere('content', 'like', "%$s%"))
            ->paginate(4);

        return view('posts', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = request()->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        auth()->user()->posts()->create($attributes);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect('/posts');
    }
}
