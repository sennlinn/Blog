<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable  and store all the posts in it from the database
        $posts = Post::orderBy('id','desc') -> paginate(10);
        //return a view and pass the variable above
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id'=>'required|numeric',
            'body' => 'required',
            'featured_image'=>'sometimes|image'
        ]);
        // store the contents wrote in the create view in the database
        $post = new Post;
        $post->title = $request->title;
       $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path($filename);
            Storage::put($filename,$location);
            $post->image = $filename;

        }

        $post->save();
        $post->tags()->sync($request->tags,false);
        // redirect to another page  with  a message
        return redirect()->route('posts.index')->with('success','The blog was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::all();
        $post = $posts->find($id);
        return view("posts.show")->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::all();
        $post = $posts->find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this-> validate($request, array(
            'title' => ['required', 'max:255'],
            'body' => ['required'],
           'featured_image' => 'image|sometimes'
        ));
        $posts = Post::all();
        $post = $posts->find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->tags()->sync($request->tags);

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path($filename);
            Storage::put($filename,$location);
            $oldFilename = $image->image;
            $post->image = $filename;
            Storage::delete($oldFilename);
        }
        $post->save();

        // redirect to another page
        return redirect()->route('posts.show', $post->id)->with('success', 'The blog was successfully updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        // redirect to another page
        return redirect()->route('posts.index')->with('success', 'The blog was successfully deleted!');
    }
}
