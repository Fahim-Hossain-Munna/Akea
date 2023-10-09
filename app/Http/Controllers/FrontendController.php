<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $blogs = Blog::all();
        return view('frontend.root.index',compact('categories','blogs'));
    }
}
