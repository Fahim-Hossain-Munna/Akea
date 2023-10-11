<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $blogs = Blog::where('status','active')->latest()->get();
        return view('frontend.root.index',compact('categories','blogs'));
    }

    public function category_blogs($id){
        $blogs = Blog::where('category_id',$id)->latest()->get();
        $blog = Category::where('id',$id)->first();
        return view('frontend.blogs.index',compact('blogs','blog'));
    }
}