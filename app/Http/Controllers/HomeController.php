<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class HomeController extends Controller
{

    

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }

    
    public function dashboard()
    {
        return view('dashboard')      
        ->with('tags_count' , Tag::all()->count() ) 
        ->with('post_count' , Post::all()->count() )
        ->with('users_count' , User::all()->count())
        ->with('categories_count' , Category::all()->count())
       ->with('trashed_count' , Post::onlyTrashed()->get()->count())  ;
    }
}
