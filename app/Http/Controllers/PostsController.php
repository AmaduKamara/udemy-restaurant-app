<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() // This makes non-authenticated users blocked
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); // Add exceptions on which pages to show by passing an array of options
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = DB::select('select * from posts');
        // $posts =  Post::orderBy('title', 'asc')->take(1)->get();
        // return Post::where('title', 'Post Two')->get();
        // $posts = Post::all()

        // $posts =  Post::orderBy('title', 'asc')->get();
        $posts =  Post::orderBy('created_at', 'desc')->paginate(3); // Gives a good and functional pagination
        return view('posts.index')->with('posts', $posts);
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
        // Validate the fields
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create the Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get post by id and pass to $post variable
        $post = Post::find($id);
        return view('/posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'You are not Unauthorized access this page');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Validate the fields
         $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Create the Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'You are not Unauthorized access this page');
        }
        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }
}
