<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Schoolstudent;
use App\Models\UniStudent;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackThankYou;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function viewFeedback(){
        return view('feedback');
    }
    public function sendFeedback(Request $request){
    // dd($request->all());
    $request->validate([
        'email' => 'required|email',
        'type' => 'required|in:vendor,product,website',
        'rate' => 'required|integer|between:1,5',
        'suggestion' => 'nullable|string|max:255'  // لو هتستخدميها
    ]);
     
        
        $feedbackData = [
        'type' => $request->type,
        'rate' => $request->rate,
        'suggestion' => $request->suggestion,
        ];
        if (session()->has('student_id')) {
            $feedbackData['student_id'] = session('student_id');
            $feedbackData['email'] = Schoolstudent::find(session('student_id'))?->email;

        } elseif (session()->has('uni_id')) {
            $feedbackData['uni_id'] = session('uni_id');
            $feedbackData['email'] = UniStudent::find(session('uni_id'))?->email;

        } elseif (session()->has('vendor_id')) {
            $feedbackData['vendor_id'] = session('vendor_id');
            $feedbackData['email'] = Vendor::find(session('vendor_id'))?->email;
        } else {
            return back()->with('error', 'You must be logged in as a student to send feedback.');
        }

        // if (session()->has('student_id')) {
        //     $student = Schoolstudent::find(session('student_id'));
        //     $feedbackData['student_id'] = $student->s_id;
        //     $feedbackData['email'] = $student->email;
        // } elseif (session()->has('uni_id')) {
        //     $student = UniStudent::find(session('uni_id'));
        //     $feedbackData['uni_id'] = $student->u_id;
        //     $feedbackData['email'] = $student->email;
        // } else {
        //     return back()->with('error', 'You must be logged in as a student to send feedback.');
        // }

        Feedback::create($feedbackData);

    // إرسال الإيميل بعد التأكد من الحفظ
    Mail::to($request->email)->send(new FeedbackThankYou());

    return redirect()->route('home')->with('success', 'Thank You for your feedback!');
}
}