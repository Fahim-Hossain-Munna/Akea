<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorRegistrationController extends Controller
{
    public function registration(){
        return view('frontend.auth.registration');
    }
    public function registration_create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|confirmed',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'author',
            'created_at' => now(),
        ]);

        return back()->with('author_registration','Registration Proccess Complete Successful');
    }
}
