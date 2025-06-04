<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Vendor;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all(); // هات كل البائعين من قاعدة البيانات
        $offers = Offers::all(); 
        return view('home', compact('vendors', 'offers')); // ابعتهم للصفحة
    }
}
