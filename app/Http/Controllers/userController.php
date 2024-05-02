<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class userController extends Controller
{
    //
    public function index(){

    $users=User::all();

    return view('users.index',compact('users'));

    }

    public function create(){

        return view('users.create');

    }

    public function store(Request $request){
        // return $request;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);
   
        User::create([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),

        ]);

        return redirect()->route('users.index')->with('success',' user ADD successfully');

    }

  }

