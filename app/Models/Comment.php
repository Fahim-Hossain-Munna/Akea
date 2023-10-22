<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[''];

    public function relationwithUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function relationwithReply(){
        return $this->hasMany(Comment::class,'replay_id','id');
    }
}
