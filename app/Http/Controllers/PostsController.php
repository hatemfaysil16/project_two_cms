<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;




class PostsController extends Controller
{

    public function index()
    {
        $post = Post::where('user_id',Auth::id())->get();
        return view('posts.index')->with('posts',$post);
    }


    public function create()
    {
        $categories = Category::all();
        $tag = Tag::all();
        if($categories->count()==0){
            return redirect()->route('category.create');
        }
        if($tag->count()==0){
            return redirect()->route('tag.create');
        }
        return view('posts.create')
        ->with('categories',$categories)
        ->with('tags',$tag);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'featrued'=>'image',
            'tags'=>'required',
        ]);
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
            "title"    => $request->title,
            "content"  => $request->content,
            "category_id"  => $request->category_id,
            "featrued" => 'uploads/posts/'.$featured_new_name,
            "slug"    => str::slug($request->title),
            "user_id" => Auth::id(),
        ]);

        $post->tags()->attach($request->tags);

         
        return redirect()->back();
        
        

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tag = Tag::all();

        return view('posts.edit')
        ->with('posts',$post)
        ->with('categories',$categories)
        ->with('tags',$tag);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);






        if( $request->hasFile('featured'))
        {
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);



        

        $post->featrued = 'uploads/posts/'.$featured_new_name;
        }

        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;

        $post->tags()->sync($request->tags);
        $post->save();

        return redirect()->route('posts');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    public function trashed(){
        $post = Post::onlyTrashed()->get();
        return view('posts.softdeleted')->with('posts',$post);
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->route('posts');
    }

    public function hdelete($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }



}
    // public function trashed()
    // {
    //     $post = Post::onlyTrashed()->get();
    //     return view('posts.softdeleted')->with('posts',$post);
    // }

    // public function restore($id)
    // {
    //     $post = Post::withTrashed()->where('id',$id)->first();
    //     $post->restore();
    //     return redirect()->route('posts');
    // }

    // public function hdelete($id)
    // {
    //     $post = Post::withTrashed()->where('id',$id)->first();
    //     $post->forceDelete();
    //     return view('posts.softdeleted')->with('posts',$post);
    //     return redirect()->back();
    // }