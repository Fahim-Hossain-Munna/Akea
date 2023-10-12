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
        $populerblogs = Blog::popularAllTime()->get();
        return view('frontend.root.index',compact('categories','blogs','populerblogs'));
    }

    public function category_blogs($id){
        $blogs = Blog::where('category_id',$id)->latest()->get();
        $blog = Category::where('id',$id)->first();
        return view('frontend.blogs.index',compact('blogs','blog'));
    }

    public function single_blogs($id){
        $blog = Blog::where('id',$id)->first();
        return view('frontend.blogs.singleBlog',compact('blog'));
    }
}
