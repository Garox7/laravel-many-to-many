<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Validation
    private $checkValidation = [
        'category_id' => 'required|integer|exists:categories,id',
        'slug' => [
            'required',
            'string',
            'max:100',
        ],
        'title' => 'required|string|max:100',
        'uploaded_img' => 'image|max:2048',
        'content' => 'string',
        'excerpt' => 'string',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        $category = Category::all();
        return view('admin.posts.index', [
            'posts' => $posts,
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all('id', 'name');
        $tags = Tag::all();
        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkValidation['slug'][] = 'unique:posts';
        $request->validate($this->checkValidation);
        $data = $request->all();

        $file_path = isset($data['uploaded_img']) ? Storage::put('uploads', $data['uploaded_img']) : null;

        $post = new Post();
        $post->category_id = $data['category_id'];
        $post->slug = $data['slug'];
        $post->title = $data['title'];
        $post->uploaded_img = $file_path;
        $post->content = $data['content'];
        $post->excerpt = $data['excerpt'];
        $post->save();

        return redirect()
            ->route('admin.posts.show', ['post' => $post])
            ->with('success_created', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all('id', 'name');
        $tags = Tag::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->checkValidation['slug'][] = Rule::unique('posts')->ignore($post);
        $request->validate($this->checkValidation);
        $data = $request->all();

        $file_path = isset($data['uploaded:img']) ? Storage::put('uploads', $data['uploaded_img']) : $post->uploaded_img;

        $post->category_id = $data['category_id'];
        $post->slug = $data['slug'];
        $post->title = $data['title'];
        $post->uploaded_img = $file_path;
        $post->content = $data['content'];
        $post->excerpt = $data['excerpt'];
        $post->update();

        return redirect()
            ->route('admin.posts.show', ['post' => $post])
            ->with('success_created', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()
            ->route('admin.posts.index')
            ->with('success_deleted', $post);
    }
}
