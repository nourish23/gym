<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();

        return view('post.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * $posts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('post.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'seo_meta_title' => 'required',
            'seo_meta_text' => 'required',
            'seo_meta_keywords' => 'required',
            'image' => 'required|image',
            'description' => 'required',
        ]);

        $data = $this->handleTranslatableInput(
            $validatedData,
            ["title", "description"]
        );

        if ($file = $request->file('image')) {
            $data['image'] = $this->uploads($file, "posts");
        }

        Post::create($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        request()->validate(Post::$rules);

        $data = $this->handleTranslatableInput(
            $request->all(),
            ["title", "description"]
        );
        
        if ($file = $request->file('image')) {
            $data['image'] = $this->uploads($file, "posts");
        }
        $post->update($data);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::disk('s3')->delete("posts/" . substr($post->image, strrpos($post->image, '/') + 1));
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
