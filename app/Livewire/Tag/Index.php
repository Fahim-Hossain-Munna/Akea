<?php

namespace App\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{

    public $tag_name;
    public $tag_slug;
    public $tag_description;
    public $tag_id;

    public function insert_tag(){

        if($this->tag_slug){
            Tag::insert([
                'tag_name' => $this->tag_name,
                'tag_slug' => Str::slug($this->tag_slug),
                'tag_description' => $this->tag_description,
                'created_at' => now(),
            ]);
        }else{
            Tag::insert([
                'tag_name' => $this->tag_name,
                'tag_slug' => Str::slug($this->tag_name),
                'tag_description' => $this->tag_description,
                'created_at' => now(),
            ]);
        }

    }

    public function modaltag($id){
        $tags = Tag::where('id',$id)->first();

        $this->tag_id = $tags->id;
        $this->tag_name = $tags->tag_name;
        $this->tag_slug = $tags->tag_slug;
        $this->tag_description = $tags->tag_description;

    }

    public function resetInput(){

        $this->tag_name = " ";
        $this->tag_slug = " ";
        $this->tag_description = " ";

    }

    public function updateTag($id){

        if($this->tag_slug){
            Tag::findOrFail($id)->update([
                'tag_name' => $this->tag_name,
                'tag_slug' => Str::slug($this->tag_slug),
                'tag_description' => $this->tag_description,
                'created_at' => now(),
            ]);
        }else{
            Tag::findOrFail($id)->update([
                'tag_name' => $this->tag_name,
                'tag_slug' => Str::slug($this->tag_name),
                'tag_description' => $this->tag_description,
                'created_at' => now(),
            ]);
        }

    }


    public function render()
    {
        $tags = Tag::all();
        return view('livewire.tag.index',compact('tags'));
    }

}
