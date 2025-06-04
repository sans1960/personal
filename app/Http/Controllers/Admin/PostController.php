<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'title' => 'required|max:200',
            'image' => File::types(['jpg', 'png', 'webp', 'jpeg'])

                ->max(1024),
            'description'=>'required',
       

        ]);
        if ($request->hasFile('image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/posts', request()->file('image'));
        }
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->image = $filePath;
        $post->description = $request->description;
        $post->save();
          Alert::success('Post creat','Post afegit amb exit');
            return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
            $request->validate([
            'title' => 'required|max:200',
            'image' => File::types(['jpg', 'png', 'webp', 'jpeg'])

                ->max(1024),
            'description'=>'required',
       

        ]);
        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($post->image);

            $filePath = Storage::disk('public')->put('images/post', request()->file('image'), 'public');
            $post->image = $filePath;
          
        }
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->update();
          Alert::success('Post actualitzat','Post actualitzat amb exit');
            return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
          Storage::disk('public')->delete($post->image);
        $post->delete();
         Alert::success('Post eliminat','Post eliminat amb exit');
            return redirect()->route('posts.index');
    }
}
