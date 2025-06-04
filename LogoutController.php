<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {

        $request->session()->forget('user');
        
        return redirect()->route('index');

        // Auth::logout();
        
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        
        // return redirect('login');
   }
}
