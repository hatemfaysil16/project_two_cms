<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::all();
        return view('tags.index')->with('tags',$tag);
    }

    public function create()
    {
        return view('tags.create');
        
    }


    
    public function store(Request $request)
    {
        $this->validate($request,[
            'tag'=>'required'
        ]);
        Tag::create([
            'tag'=>$request->tag
        ]);
        return redirect()->back();


    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->with('tags',$tag);
    }


    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this->validate($request,[
            'tag'=>'required'
        ]);
        $tag->tag = $request->tag;
        $tag->save();
        return redirect()->route('tags');

    }


    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back();
    }
}
