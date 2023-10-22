<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request,$id){

                Comment::insert([
                    'user_id' => auth()->id(),
                    'post_id' => $id,
                    'replay_id' => $request->replay_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'message' => $request->message,
                    'created_at' => now(),
                ]);

        return back()->with('comment_done',"Your comment Approved Successfully");


    }
}
