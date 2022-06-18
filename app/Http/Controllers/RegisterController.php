<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register',["title"=>"Register"]);
    }
    public function store(Request $request){
        // dd($request);
        $data = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:4|max:20|unique:users',
            'password' => 'required|min:6|max:20'
        ]);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        // return response()->json($data, 200);
        return redirect('/register')->with('success', 'Registration Success! Please login');
    }
}
