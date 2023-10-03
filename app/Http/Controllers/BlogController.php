<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::where('user_id',auth()->id())->get();
        $tags = Tag::all();
        $categories = Category::all();
        return view('dashboard.blog.index',compact('blogs','tags','categories'));
    }
    public function blog_edit($id){
        $blog = Blog::where('id',$id)->first();
        $tags = Tag::all();
        $categories = Category::all();
        return view('dashboard.blog.edit',compact('blog','tags','categories'));
    }
    public function blog_delete($id){
        Blog::findOrFail($id)->delete();
        return redirect()->route('blog')->with('blog_success','Blog posts delete successfully');
    }

    public function blog_delete_all(Request $request){
        $ids = $request->ids;
        if($ids){
            foreach($ids as $id){
                Blog::where('id',$id)->delete();
            }
        }else{

            return redirect()->route('blog')->with('blog_error','please check input and then submit delete all');
        }
        return redirect()->route('blog')->with('blog_success','Blog posts delete successfully');
    }

    public function edit_post(Request $request,$id){
        $request->validate([
            '*' => 'required',
        ]);
        $image_unlink = Blog::where('id',$id)->first();
        if($request->hasFile('image')){

            if($image_unlink->image){
                unlink(public_path('uploads/blog/'.$image_unlink->image));
            }
            $new_name = auth()->id().'-'.$request->title.'.'.$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(300, 200);
            $img->save(base_path('public/uploads/blog/'.$new_name), 80);

            $blog = Blog::find($id);
            $blog->user_id = auth()->id();
            $blog->category_id = $request->blog_category;
            $blog->image = $new_name;
            $blog->title = $request->title;
            $blog->submit_date = $request->submit_date;
            $blog->description = $request->description;
            $blog->created_at = now();

            $blog->RelationshipwithTags()->sync($request->tag_id);

            $blog->save();

            return redirect()->route('blog')->with('blog_success','Blog posts update successfully');
        }else{
            $blog = Blog::find($id);

            $blog->user_id = auth()->id();
            $blog->category_id = $request->blog_category;
            $blog->title = $request->title;
            $blog->submit_date = $request->submit_date;
            $blog->description = $request->description;
            $blog->created_at = now();

            $blog->RelationshipwithTags()->sync($request->tag_id);

            $blog->save();

            return redirect()->route('blog')->with('blog_success','Blog posts update successfully');
        }
    }

    public function insert_page(){
        $tags = Tag::all();
        $categories = Category::all();
        return view('dashboard.blog.blog_insert',compact('tags','categories'));
    }
    public function insert(Request $request){

        $request->validate([
            '*' => 'required',
        ]);

        if($request->hasFile('image')){
            $new_name = auth()->id().'-'.$request->title.'.'.$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(300, 200);
            $img->save(base_path('public/uploads/blog/'.$new_name), 80);

            $blog = Blog::create([
                'user_id' => auth()->id(),
                'category_id' => $request->blog_category,
                'title' => $request->title,
                'image' => $new_name,
                'submit_date' => $request->submit_date,
                'description' => $request->description,
                'created_at' => now(),
            ]);

            $blog->RelationshipwithTags()->attach($request->tag_id);

            $blog->save();

            return redirect()->route('blog')->with('blog_success','Blog posts inserted successfully');
        }else{
            return back()->with('blog_error','Blog posts inserted unsuccessfully');
        }

    }

    public function status_change(Request $request,$id){

        $blogs = Blog::where('id',$id)->first();

        if($blogs->status == 'active'){
            Blog::find($id)->update([
                'status' => 'deactive',
                'created_at' => now(),
            ]);
            return back()->with('change_status','Blog posts status change successfully');
        }else{
            Blog::find($id)->update([
                'status' => 'active',
                'created_at' => now(),
            ]);
            return back()->with('change_status','Blog posts status change successfully');
        }
    }
}
