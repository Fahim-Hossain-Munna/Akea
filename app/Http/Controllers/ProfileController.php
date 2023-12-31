<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function index(){
        return view('dashboard.profile.index');
    }


    public function name_update(Request $request){
            $request->validate([
                '*' => 'required',
            ]);
            User::find(auth()->id())->update([
                'name' => $request->name,
                'created_at' => now(),
            ]);
            return back()->with('name_updated','name update successfull');

    }

    public function image_update(Request $request){

            $request->validate([
                'image' => 'required|image',
            ]);

            if($request->hasFile('image')){
                if(auth()->user()->image != "default.png"){
                    unlink(public_path('uploads/profile/'. auth()->user()->image));
                    $new_name = auth()->id().'-'.auth()->user()->name.'-'.now()->format('d-m-Y').'.'.$request->file('image')->getClientOriginalExtension();
                    $img = Image::make($request->file('image'))->resize(300, 200);
                    $img->save(base_path('public/uploads/profile/'.$new_name), 80);

                    User::findOrFail(auth()->id())->update([
                        'image' => $new_name,
                        'created_at' => now(),
                    ]);

                    return back();

                }else{
                    $new_name = auth()->id().'-'.auth()->user()->name.'-'.now()->format('d-m-Y').'.'.$request->file('image')->getClientOriginalExtension();
                    $img = Image::make($request->file('image'))->resize(300, 200);
                    $img->save(base_path('public/uploads/profile/'.$new_name), 80);

                    User::findOrFail(auth()->id())->update([
                        'image' => $new_name,
                        'created_at' => now(),
                    ]);

                    return back()->with('image_updated','image update successfull');

                }
            }

    }


    public function password_update(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if(Hash::check($request->current_password , auth()->user()->password)){
            User::find(auth()->id())->update([
                'password' => $request->password,
                'created_at' => now(),
            ]);
            return back()->with('password_updated','password update successfull');
        }else{
            return back()->with('password_updated_error','your given current password cannot match with DATABASE');
        }

    }

}
