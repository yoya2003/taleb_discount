<?php

namespace App\Http\Controllers;

use App\Models\Schoolstudent;
use App\Models\UniStudent;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function vendorProfile(){
        $vendorId = session('vendor_id');
        $vendor = Vendor::find($vendorId);
        if (!$vendor) {
            return redirect()->route('loginForm')->withErrors(['access' => 'Please log in first.']);
    }
        return view('editVendorProfile' ,compact('vendor'));
    }
    



    public function updateVendorProfile(Request $request){
        $vendorId = session('vendor_id');
        $vendor = Vendor::find($vendorId);
        
        if (!$vendor) {
            return redirect()->route('loginForm')->withErrors(['access' => 'Please log in first.']);
        }
        //  dd($request->all());

        $messages = [
            'b_name.required'        => 'Business name is required.',
            'b_name.max'             => 'Business name must not exceed 255 characters.',
            'email.required'         => 'Email is required.',
            'email.email'            => 'Please enter a valid email address.',
            'phone.required'         => 'Phone number is required.',
            'phone.regex'            => 'Phone number must be 11 digits starting with 01.',
            'description.required'   => 'Description is required.',
            'description.max'        => 'Description must not exceed 255 characters.',
            'address.required'       => 'Primary address is required.',
            'address.max'            => 'Address must not exceed 255 characters.',
            'address_2.max'          => 'Secondary address must not exceed 255 characters.',
            'website.url'            => 'Website must be a valid URL.',
            'facebook.url'           => 'Facebook link must be a valid URL.',
            'logo.image'             => 'Logo must be an image.',
            'logo.mimes'             => 'Only jpg, jpeg, png images are allowed.',
            'logo.max'               => 'Logo must not exceed 2MB.',
            'photo1.image'           => 'Photo 1 must be an image.',
            'photo1.mimes'           => 'Photo 1 must be jpg, jpeg, or png.',
            'photo1.max'             => 'Photo 1 must not exceed 2MB.',
            'photo2.image'           => 'Photo 2 must be an image.',
            'photo2.mimes'           => 'Photo 2 must be jpg, jpeg, or png.',
            'photo2.max'             => 'Photo 2 must not exceed 2MB.',
            'photo3.image'           => 'Photo 3 must be an image.',
            'photo3.mimes'           => 'Photo 3 must be jpg, jpeg, or png.',
            'photo3.max'             => 'Photo 3 must not exceed 2MB.',
            'photo4.image'           => 'Photo 4 must be an image.',
            'photo4.mimes'           => 'Photo 4 must be jpg, jpeg, or png.',
            'photo4.max'             => 'Photo 4 must not exceed 2MB.',
            'photo5.image'           => 'Photo 5 must be an image.',
            'photo5.mimes'           => 'Photo 5 must be jpg, jpeg, or png.',
            'photo5.max'             => 'Photo 5 must not exceed 2MB.',
    
];
    $data = $request->validate([
        'b_name'        => 'required|string|max:255',
        'email'         => 'required|email',
        'phone'         => 'required|regex:/^01[0-9]{9}$/',
        'description'   => 'required|string|max:255',
        'address'       => 'required|string|max:255',
        'address_2'     => 'nullable|string|max:255',
        'website'       => 'nullable|url',
        'facebook'      => 'nullable|url',
        'logo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'photo1'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'photo2'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'photo3'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'photo4'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'photo5'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
], $messages);




if ($request->hasFile('logo')) {
        if ($vendor->logo) {
            Storage::delete($vendor->logo); // احذف الصورة القديمة
        }
        $data['logo'] = Storage::putFile('data' , $request->logo);
    }
if ($request->hasFile('photo1')) {
    if ($vendor->photo1) {
        Storage::disk('public');
    }
    $data['photo1'] = $request->file('photo1')->store('vendor_photos', 'public');
}

if ($request->hasFile('photo2')) {
    if ($vendor->photo2) {
        Storage::disk('public');
    }
    $data['photo2'] = $request->file('photo2')->store('vendor_photos', 'public');
}

if ($request->hasFile('photo3')) {
    if ($vendor->photo3) {
        Storage::disk('public');
    }
    $data['photo3'] = $request->file('photo3')->store('vendor_photos', 'public');
}

if ($request->hasFile('photo4')) {
    if ($vendor->photo4) {
        Storage::disk('public');
    }
    $data['photo4'] = $request->file('photo4')->store('vendor_photos', 'public');
}

if ($request->hasFile('photo5')) {
    if ($vendor->photo5) {
        Storage::disk('public');
    }
    $data['photo5'] = $request->file('photo5')->store('vendor_photos', 'public');
}

$vendor->update($data);

return redirect()->route('vendorHome')->with('success', 'Profile updated successfully.');
}









public function uniProfile(){
    $uni_id = session('uni_id');
    $uni = UniStudent::find($uni_id);
    if (!$uni) {
        return redirect()->route('loginForm')->withErrors(['access' => 'Please log in first.']);
    }
    
    return view('editUniProfile', compact('uni'));


}
public function schoolProfile(){
        $school_id = session('student_id'); // لازم تتأكدي إنه نفس اسم السيشن اللي حطتيه وقت اللوجين
        $school = Schoolstudent::find($school_id);
        if (!$school) {
            return redirect()->route('loginForm')->withErrors(['access' => 'Please log in first.']);
        }
        return view('editSchoolProfile', compact('school'));
    }




public function updateSchoolProfile(Request $request){
        $school_id = session('student_id');
        $school = Schoolstudent::find($school_id);
        
        if (!$school) {
            return redirect()->route('loginForm')->withErrors(['access' => 'Please log in first.']);
        }
       

        $message = [
            'name.required' => 'The Name field is required.',
            'NI.required' => 'National ID is required.',
            'NI.digits' => 'National ID must be 14 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be valid.',
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


    $user= $request->validate([
        'name'       => 'required|string|max:255',
        'NI'         => 'required|digits:14',
        'email'      => 'required|email',
        'phone'      => 'required|regex:/^01[0-9]{9}$/',
        'age'        => 'required|integer|min:1|max:19',
        'address'    => 'required|string',
        'level'      => 'required|integer|min:1|max:12',
        'schoolName' => 'required|string|max:255',
        'doc'        => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ], $message);




if ($request->hasFile('doc')) {
            if ($request->hasFile('doc')) {
            if ($school->doc) {
                Storage::delete($school->doc); // احذف الصورة القديمة
        }
        $user['doc'] = $request->file('doc')->store('Images', 'public');

        }else {
            return redirect()->route('schoolProfile');
        }
$school->update($user);

return redirect()->route('home')->with('success', 'Profile updated successfully.');

    }
}








public function updateUniProfile(Request $request){
    $uni_id = session('uni_id');
    $uni = UniStudent::find($uni_id);
        
    if (!$uni) {
        return redirect()->route('loginForm')->withErrors(['access' => 'Please log in first.']);
    }


     $message = [
        'name.required' => 'The Name field is required.',
        'NI.required' => 'National ID is required.',
        'NI.digits' => 'National ID must be 14 characters.',
        'email.required' => 'Email is required.',
        'email.email' => 'Email must be valid.',
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

    // dd($request->all());
    $validate = $request->validate([
        'name'       => 'required|string|max:255',
        'NI'         => 'required|digits:14',
        'email'      => 'required|email',
        'uni_email'  => 'nullable|email',
        'phone'      => 'required|regex:/^01[0-9]{9}$/',
        'age'        => 'required|integer|min:17|max:35',
        'address'    => 'required|string',
        'uni_name'   => 'required|string|max:255',
        'faculty'    => 'required|string|max:255',
        'level'      => 'required|integer|min:1|max:7',
        'doc'        => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ], $message);



    if ($request->hasFile('doc')) {
            if ($uni->doc) {
                Storage::delete($uni->doc); // احذف الصورة القديمة
        }
        $validate['doc'] = $request->file('doc')->store('Images', 'public');

        $uni->update($validate);

        }else {
            return redirect()->route('uniProfile');
        }
        
return redirect()->route('home')->with('success', 'Offer updated successfully!');
}



// if ($request->hasFile('doc')) {
//     if ($uni->doc) {
//         Storage::delete($uni->doc); // احذف الصورة القديمة
//     }
//     $validate['doc'] = $request->file('doc')->store('uni_doc', 'public');
//     }
    
    
// $uni->update($validate);
    
// return redirect()->route('home')->with('success', 'Profile updated successfully.');

// }

}