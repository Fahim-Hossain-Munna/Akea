<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithFileUploads;

    public $category_name;
    public $category_slug;
    public $category_description;
    public $category_image;
    public $category_id;
    public $category_image_update;
    public $test;

    public function insert_category(){

        $new_name = auth()->id().'-'.$this->category_name.'.'.$this->category_image->getClientOriginalExtension();
        $img = Image::make($this->category_image)->resize(300, 200);
        $img->save(base_path('public/uploads/category/'.$new_name), 80);

        if($this->category_slug){
            Category::insert([
                'category_name' => $this->category_name,
                'category_slug' => Str::slug($this->category_slug),
                'category_description' => $this->category_description,
                'category_image' =>  $new_name,
                'created_at' => now(),
            ]);
            $this->resetInput();
        }else{
            Category::insert([
                'category_name' => $this->category_name,
                'category_slug' => Str::slug($this->category_name),
                'category_description' => $this->category_description,
                'category_image' =>  $new_name,
                'created_at' => now(),
            ]);
            $this->resetInput();
        }

        $this->resetInput();


    }

    public function modalcategory($id){
        $categories = Category::where('id',$id)->first();

        $this->category_name = $categories->category_name;
        $this->category_id = $categories->id;
        $this->category_slug = $categories->category_slug;
        $this->category_description = $categories->category_description;
        $this->category_image_update = $categories->category_image;

    }

    public function resetInput(){
        $this->category_name = " ";
        $this->category_slug = " ";
        $this->category_description = " ";
        $this->category_image = " ";
    }

    public function updateCategory($eid){
        Category::find($eid)->update([
            'category_name' => $this->category_name,
            'category_slug' => Str::slug($this->category_slug),
            'category_description' => $this->category_description,
            // 'category_image' =>  $this->category_image,
            'created_at' => now(),
        ]);

    }

    public function updateCategoryImage($id){
                // $image = $this->category_image;
                // $explode = explode('.',$image);
                // $extension = end($explode);
                // $this->test = $extension ;

                $categories = Category::where('id',$id)->first();
                $new_name = $this->category_name.'-'.now()->format('s-i-h').'-'.now()->format('d-m-Y').'.'.$this->category_image->getClientOriginalExtension();
                $img = Image::make($this->category_image)->resize(300, 200);
                $img->save(base_path('public/uploads/category/'.$new_name), 80);

                if($categories->category_image){

                    unlink(public_path('uploads/category/'. $categories->category_image));
                }

                    Category::find($id)->update([
                        'category_image' =>  $new_name,
                        'created_at' => now(),
                    ]);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.category.index',compact('categories'));
    }
}
