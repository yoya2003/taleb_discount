<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Schoolstudent;
use App\Models\UniStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function loginForm(){
        return view ('login');
    }
    public function login(Request $request){
        Session::flush();
        $message = [
            'pass.required' => 'Password is required',
            'pass.min' => 'Password must be at least 6 characters',
            'pass.max' => 'Password cannot exceed 16 characters',
            'pass.regex' => 'Password must contain at least: 1 uppercase, 1 lowercase, 1 number, and 1 special character (@$!%*?&)',
            'pass.confirmed' => 'Password confirmation does not match',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',];

        $request->validate([
            'email' => 'required|email',
            'pass'  => [
                'required',
                'min:6',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/',
            ],
        ],$message);


        $student = Schoolstudent::where('email', $request->email)->first();
        if ($student && Hash::check($request->pass, $student->pass)) {
            session([
                'student_id' => $student->s_id,
                'student_email' => $student->email
            ]);
            return redirect()->route('home'); // Route الطالب
    }
    
    $uni = UniStudent::where('email', $request->email)->first();
        if ($uni && Hash::check($request->pass, $uni->pass)) {
            session([
                'uni_id' => $uni->u_id,
                'uni_email' => $uni->email
            ]);
            return redirect()->route('home'); // Route الطالب
    }

    // ابحث في جدول البائعين
    $vendor = Vendor::where('email', $request->email)->first();
    if ($vendor && Hash::check($request->pass, $vendor->pass)) {
        session([
            'vendor_id' => $vendor->v_id,
            'vendor_email' => $vendor->email
        ]);
        return redirect()->route('vendorHome'); // Route البائع
    }

    return back()->withInput()->withErrors([
        'email' => 'Invalid email or password.',
    ]);
    
    
}










public function vendorHome(){
    return view ('vendorHome');
}
public function userHome(){
    return view ('home');
}





public function editProfile()//by3rfnee ana anhe user 34an y3ml edit profile fe anhe form
{
    if (session()->has('student_id')) {
        return redirect()->route('editSchoolProfile');
    } elseif (session()->has('uni_id')) {
        return redirect()->route('editUniProfile');
    } else {
        return redirect()->route('loginForm')->withErrors(['access' => 'Please log in first.']);
    }
}


public function search(Request $request)
{
    // $vendorId = session('vendor_id'); // لو بتخزني ID في السيشن بعد اللوج إن

    // $query = Offers::where('v_id', $vendorId);

    // if ($request->has('search')) {
    //     $search = $request->input('search');
    //     $query->where('p_name', 'like', '%' . $search . '%');
    // }

    // $offers = $query->get();

    // return view('vendorHome', compact('offers'));
}



}



