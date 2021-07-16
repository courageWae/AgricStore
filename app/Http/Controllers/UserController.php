<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserController()
    {
        $this->middleware( ['auth', 'user'] ) ;
    }

    public function index()
    {
        return view("user.dashboard") ;
    }

    public function profile()
    {
    	return view('user.profile');
    }

    public function edit_profile()
    {
    	return view('user.edit_profile');
    }
}
