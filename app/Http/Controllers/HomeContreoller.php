<?php

namespace App\Http\Controllers;


use App\Jobs\ProgressBar;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeContreoller
{

    public function index(){
        if (!Auth::id()){
            return redirect()->route('fake');
        }

        return view('main', [
            'id' => Auth::id(),
            'role' => Auth::user()->role,
            'user' => Auth::user(),
            'content' => File::simplePaginate(6),
        ]);
    }

    public function fake(){
        return view('main', [
            'id' => Auth::id(),
            'role' => 0,
            'user' => Auth::user(),
            'content' => File::simplePaginate(6),
        ]);
    }

    public function profile(){
        return view('profile', [
            'id' => Auth::id(),
            'role' => Auth::user()->role,
            'user' => Auth::user(),
        ]);
    }

    public function editUser(Request $request){

        $id = $request->id;

        return view('edit', [
            'id' => $request->id,
            'role' => Auth::user()->role,
            'user' => Auth::user(),
            'edit_user' => User::find('users', $request->id)
        ]);
    }

    public function users(){
        return view('users', [
            'id' => Auth::id(),
            'role' => Auth::user()->role,
            'user' => Auth::user(),
            'users' => User::simplePaginate(6),
        ]);
    }

    public function addNote(){
        return view('addNote', [
            'id' => Auth::id(),
            'role' => Auth::user()->role,
            'user' => Auth::user(),
        ]);
    }

    public function download(){
        return view('download', [
            'id' => Auth::id(),
            'role' => Auth::user()->role,
            'user' => Auth::user(),
        ]);
    }

    public function registration(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
