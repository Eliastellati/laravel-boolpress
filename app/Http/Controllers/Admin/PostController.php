<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title'=> 'required|max:255',
            'content'=>'required',
            'category_id'=>'nullable|exists:categories,id' 
        ]);

        $newPost = new Post();

        $slug= Str::slug($data['title'], '-');
        $data['slug']= $slug;
        $existingPost = Post::where('slug', $slug)->first();

        $slugBase= $slug;
        $counter = 1;

        while($existingPost) {
            $slug = $slugBase . '-' . $counter;

            $existingPost = Post::where('slug', $slug)->first();

            $counter++;

        };

        $newPost->fill($data);

        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
       $data = $request->all();

       $request->validate([
        'title'=> 'required|max:255',
        'content'=>'required' 
       ]);

       if($post->title != $data['title']) {
        $slug= Str::slug($data['title'], '-');
        $data['slug']= $slug;
        $existingPost = Post::where('slug', $slug)->first();

        $slugBase= $slug;
        $counter = 1;

        while($existingPost) {
            $slug = $slugBase . '-' . $counter;

            $existingPost = Post::where('slug', $slug)->first();

            $counter++;

        };

        $data['slug']= $slug;
       };

      $post->update($data);

      return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()
            ->route('admin.posts.index')
            ->with('delete', 'Il post "' . addslashes($post->title) . '" è stato eliminato con successo!');
    }
}
