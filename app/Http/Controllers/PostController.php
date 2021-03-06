<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\Category;



class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);
        return view('posts.index',['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
             'category' =>'required',
            ]);


         $p = new Post;
         $p->title = $validatedData['title'];
         $p->body = $validatedData['body'];
         $p->user_id = Auth::id();

         if($request->hasFile('featured_image')){
             $image = $request->file('featured_image');
             $filename = time() . '.' . $image->getClientOriginalExtension();
             $location = public_path('images/' . $filename);
             Image::make($image)->resize(1080,400)->save($location);

             $p->image = $filename;
         }

         $category = new Category;
         $category->body = $validatedData['category'];
         $p->save();
         $p->category() ->save($category);


         session()->flash('success','Post was created.');

         return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',['post'=> $post]);
    }

    public function apiPresent($id)
    {

        $post = Post::findOrFail($id);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post )
    {
        return view('posts.edit', compact('post'));
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);



        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];

        $post->save();
        session()->flash('success','Post was updated.');

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */

    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('error','Post was deleted.');

        return redirect()->route('posts.index');
    }
}
