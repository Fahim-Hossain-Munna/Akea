<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
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
        $comments = Comment::where('post_id',$id)->get();
        return view('frontend.blogs.singleBlog',compact('blog','comments'));
    }
    public function blogs(){
        $blogs = Blog::latest()->get();
        return view('frontend.blogs.allBlogs',compact('blogs'));
    }
    public function search(Request $request){
        $search = $request->search;
        $blogs = Blog::where('title','like',"%$search%")->get();
        return view('frontend.search.search',compact('blogs','search'));
    }
}
