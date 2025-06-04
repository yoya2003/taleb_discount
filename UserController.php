<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
    //     if (!session()->has('user')) {
    //     return redirect()->route('login.show');
    // }
    return view('home');    
}
}
