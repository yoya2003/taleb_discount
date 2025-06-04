<?php

namespace App\Http\Controllers;

use App\Models\verify_document;
use Illuminate\Http\Request;
use App\Models\SchoolStudent;
use App\Models\UniStudent;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function vendorForm(){
        return view ('vendorSignup');
    }
    public function vendorRegister(Request $request){
        $message = [
            'b_name.required'        => 'Business name is required.',
            'b_name.unique'        => 'Business name is already taken.',
            'b_name.max'             => 'Business name must not exceed 255 characters.',
            'email.required'         => 'Email is required.',
            'email.email'            => 'Please enter a valid email address.',
            'email.unique'           => 'This email is already taken.',
            'phone.required'         => 'Phone number is required.',
            'phone.regex'            => 'Phone number must be 11 digits starting with 01.',
            'description.required'   => 'Description is required.',
            'description.max'        => 'Description must not exceed 255 characters.',
            'address.required'       => 'Primary address is required.',
            'address.max'            => 'Address must not exceed 255 characters.',
            'address_2.max'          => 'Secondary address must not exceed 255 characters.',
            'pass.required'          => 'Password is required.',
            'pass.min'               => 'Password must be at least 6 characters.',
            'pass.max'               => 'Password must not exceed 16 characters.',
            'pass.regex'             => 'Password must contain at least 1 uppercase, 1 lowercase, 1 number, and 1 special character.',
            'pass.confirmed'         => 'Password confirmation does not match.',
            'website.url'            => 'Website must be a valid URL.',
            'facebook.url'           => 'Facebook link must be a valid URL.',
            'logo.image'             => 'Logo must be an image.',
            'logo.mimes'             => 'Only jpg, jpeg, png images are allowed.',
            'logo.max'               => 'Logo must not exceed 2MB.',
];
    $data = $request->validate([
        'b_name'        => 'required|string|max:255|unique:vendor,b_name',
        'email'         => 'required|email|unique:vendor,email',
        'phone'         => 'required|regex:/^01[0-9]{9}$/',
        'description'   => 'required|string|max:255',
        'address'       => 'required|string|max:255',
        'address_2'     => 'nullable|string|max:255',
        'pass'          => [
            'required',
            'confirmed',
            'min:6',
            'max:16',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/',
    ],
        'website'       => 'nullable|url',
        'facebook'      => 'nullable|url',
        'logo'          => 'required|image|mimes:jpg,jpeg,png|max:2048',
], $message);


// if ($request->hasFile('logo')) {
//             $path = $request->file('logo')->store('data', 'public'); // 'public' مهم
//             $products['logo'] = $path;
// }
if ($request->hasFile('logo')) {
            $data['logo'] = Storage::putFile('data' , $request->logo);
}


        // $vendorId = session('vendor_id');
        // if (!$vendorId) {
        //     return redirect()->route('loginForm')->withErrors(['access' => 'Please log in as a vendor first.']);
        // }


        $vendor = Vendor::create([
            'b_name' => $data['b_name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'address_2' => $data['address_2'],
            'phone' => $data['phone'],
            'description' => $data['description'],
            'website' => $data['website'],
            'facebook' => $data['facebook'],
            'logo' => $data['logo'],
            'pass' => Hash::make($data['pass']), // نستخدم Hash لتشفير الباسورد
        ]);



        if ($vendor) {
            return redirect()->route('loginForm')->with('Success', 'Registration successful, please Login.');
        } else {
            return redirect()->route('vendorForm'); // خالي
        }
    }













    public function showSchool()
    {
        return view('signUpSchool');
    }
    


    public function schoolRegister(Request $request)
{
    $message = [
        'name.required' => 'The Name field is required.',
        'pass.required' => 'The Password field is required.',
        'pass.confirmed' => 'Password confirmation does not match.',
        'pass.min' => 'Password must be at least 6 characters.',
        'pass.max' => 'Password may not be greater than 16 characters.',
        'pass.regex' => 'Password must contain: 1 uppercase, 1 lowercase, 1 number, and 1 special character (@$!%*?&).',
        'NI.required' => 'National ID is required.',
        'NI.digits' => 'National ID must be 14 characters.',
        'NI.unique' => 'This National ID is already registered.',
        'email.required' => 'Email is required.',
        'email.email' => 'Email must be valid.',
        'email.unique' => 'This Email is already registered.',
        'level.required' => 'Education level is required',
        'level.min' => 'Education level must not be less than 1',
        'level.max' => 'Education level must not be more than 12',
        'age.required' => 'age is required.',
        'age.min' => 'age must not be less than 1',
        'age.max' => 'age must not be more than 19',
        'address.required'       => 'Primary address is required.',
        'address.max'            => 'Address must not exceed 255 characters.',
        'phone.required' => 'Phone number is required.',
        'phone.regex' => 'Phone number must be 11 characters starting with 01.',
        'schoolName.required' => 'School name is required.',
        'doc.required' => 'Document is required.',
        'doc.mimes' => 'Only PDF, JPG, JPEG, PNG files are allowed.',
        'doc.max' => 'Document size must not exceed 2MB.',
    ];

// dd($request->all());
    $data= $request->validate([
        'name'       => 'required|string|max:255',
        'pass'       => [
            'required',
            'confirmed',
            'min:6',
            'max:16',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/',
        ],
        'NI'         => 'required|digits:14|unique:school_student,NI',
        'email'      => 'required|email|unique:school_student,email',
        'phone'      => 'required|regex:/^01[0-9]{9}$/',
        'age'        => 'required|integer|min:1|max:19',
        'address'    => 'required|string',
        'level'      => 'required|integer|min:1|max:12',
        'schoolName' => 'required|string|max:255',
        'doc'        => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ], $message);

    // تخزين الملف
    $docPath = null;
    if ($request->hasFile('doc')) {
        $docPath = $request->file('doc')->store('verify_docs', 'public');
    }

    

    
    $user = SchoolStudent::create([
        'name'        => $data['name'],
        'pass'        => Hash::make($data['pass']),
        'NI'          => $data['NI'],
        'email'       => $data['email'],
        'phone'       => $data['phone'],
        'age'         => $data['age'],
        'address'     => $data['address'],
        'level'       => $data['level'],
        'schoolName'  => $data['schoolName'],
    ]);
    verify_document::create([
            'type' => 'school student',
            'doc' => $docPath,
            'submit_status' => 'pending',
            'submit_date' => now(),
            'verify_status' => 'pending',
            'student_id' => $user->s_id,
    ]);
         if ($user) {
            return redirect()->route('loginForm')->with('Success', 'Registration successful, please Login.');
        } else {
            return redirect()->route('showSchool'); // خالي
        }
}











public function showUni()
    {
        return view('signUpUni');
    }

    public function uniRegister(Request $request)
{
    $message = [
        'name.required' => 'The Name field is required.',
        'pass.required' => 'The Password field is required.',
        'pass.confirmed' => 'Password confirmation does not match.',
        'pass.min' => 'Password must be at least 6 characters.',
        'pass.max' => 'Password may not be greater than 16 characters.',
        'pass.regex' => 'Password must contain: 1 uppercase, 1 lowercase, 1 number, and 1 special character (@$!%*?&).',
        'NI.required' => 'National ID is required.',
        'NI.digits' => 'National ID must be 14 characters.',
        'NI.unique' => 'This National ID is already registered.',
        'email.required' => 'Email is required.',
        'email.email' => 'Email must be valid.',
        'email.unique' => 'This Email is already registered.',
        'uni_email.email' => 'University Email must be valid.',
        'phone.required' => 'Phone number is required.',
        'phone.regex' => 'Phone number must be 11 characters starting with 01.',
        'uni_name.required' => 'University name is required.',
        'faculty.required' => 'Faculty is required.',
        'level.required' => 'Education level is required.',
        'level.min' => 'Education level must not be less than 1',
        'level.max' => 'Education level must not be more than 7',
        'age.required' => 'age is required.',
        'age.min' => 'age must not be less than 17',
        'age.max' => 'age must not be more than 35',
        'address.required'   => 'Primary address is required.',
        'address.max'  => 'Address must not exceed 255 characters.',
        'doc.required' => 'Document is required.',
        'doc.mimes' => 'Only PDF, JPG, JPEG, PNG files are allowed.',
        'doc.max' => 'Document size must not exceed 2MB.',
    ];

    $validate = $request->validate([
        'name'       => 'required|string|max:255',
        'pass'       => [
            'required',
            'confirmed',
            'min:6',
            'max:16',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/',
        ],
        'NI'         => 'required|digits:14|unique:uni_student,NI',
        'email'      => 'required|email|unique:uni_student,email',
        'uni_email'  => 'nullable|email',
        'phone'      => 'required|regex:/^01[0-9]{9}$/',
        'age'        => 'required|integer|min:17|max:35',
        'address'    => 'required|string',
        'uni_name'   => 'required|string|max:255',
        'faculty'    => 'required|string|max:255',
        'level'      => 'required|integer|min:1|max:7',
        'doc'        => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ], $message);

    $docPath = null;
    if ($request->hasFile('doc')) {
        $docPath = $request->file('doc')->store('verify_docs', 'public');
    }

    // تخزين بيانات الطالب
    $uniUser = UniStudent::create([
        'name'      => $validate['name'],
        'pass'      => Hash::make($validate['pass']),
        'NI'        => $validate['NI'],
        'email'     => $validate['email'],
        'uni_email' => $validate['uni_email'],
        'phone'     => $validate['phone'],
        'age'       => $validate['age'],
        'address'   => $validate['address'],
        'level'     => $validate['level'],
        'uni_name'  => $validate['uni_name'],
        'faculty'   => $validate['faculty'],
    ]);
    verify_document::create([
           'type' => 'uni student',
            'doc' => $docPath,
            'submit_status' => 'pending',
            'submit_date' => now(),
            'verify_status' => 'pending',
            'uni_id' => $uniUser->u_id,
    ]);

    if ($uniUser) {
            return redirect()->route('loginForm')->with('Success', 'Registration successful, please Login.');
        } else {
            return redirect()->route('showUni'); // خالي
        }
    }


}