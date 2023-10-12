<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;

class Blog extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;

    protected $guarded = [''];

    public function RelationshipwithTags(){

        return $this->belongsToMany(Tag::class);
    }

    public function Relationwithcategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function Relationwithuser(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
