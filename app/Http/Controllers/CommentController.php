<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request,$id){
        $request->validate([
            '*' => 'required',
        ]);

       if(auth()->id()){
        Comment::insert([
            'user_id' => auth()->id(),
            'post_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => now(),
        ]);
        return back()->with('comment_done',"Your comment Approved Successfully");

        }else{

        return back()->with('comment_error',"if you want for comment please register our system first");
       }

    }
}
