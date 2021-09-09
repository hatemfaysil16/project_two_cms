<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{

    
    public function index()
    {
        $category = Category::all();
        return view('categories.index')->with('categories',$category);
    }


    
    public function create()
    {
       return view('categories.create');
    }


    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $category = new Category;

        $category->name = $request->name;
        $category->save();

         
        return redirect()->back();
        
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit')->with('category',$category);

    }


    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $this->validate($request,[
            'name' => 'required'
        ]);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories');

    }


    
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
