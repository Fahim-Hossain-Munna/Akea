<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $tags = Tag::latest()->take(10)->get();
        $blogs = Blog::where('status','active')->latest()->get();
        $populerblogs = Blog::where('status','active')->orderBy('visitor_count','desc')->take(3)->get();
        $recentblogs = Blog::where('status','active')->take(8)->get();
        // return $populerblogs;
        return view('frontend.root.index',compact('categories','blogs','populerblogs','recentblogs','tags'));
    }

    public function category_blogs($id){
        $blogs = Blog::where('category_id',$id)->latest()->get();
        $blog = Category::where('id',$id)->first();
        return view('frontend.blogs.index',compact('blogs','blog'));
    }

    public function single_blogs($id){
        $blog = Blog::where('id',$id)->first();
        // $blog->visit();
        if($blog){
            Blog::find($id)->update([
                'visitor_count' => $blog->visitor_count + 1,
            ]);
        }
        $comments = Comment::with('relationwithReply')->where('post_id',$id)->whereNull('replay_id')->get();
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
    public function tag_blogs($id){
        $tag_name = Tag::where('id',$id)->first();
        $relation = Tag::with('relationshipwithblogs')->where('id',$id)->get();
        $blogs = $relation[0]->relationshipwithblogs;

        return view('frontend.tagblogs.index',compact('blogs','tag_name'));
    }
}
