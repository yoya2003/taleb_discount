<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserViewController;
use App\Http\Middleware\CheckUniLogin;
use App\Http\Middleware\CheckUserLogin;
use App\Http\Middleware\CheckVendorLogin;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;



Route::get('index', function () {
    return view('cover');
})->name('index');

//Route::get('home', function () {
    //return view('home');
//})->name('home');


//------------------VENDOR SIGN UP ----------------------------
Route::get('vendorForm',[RegisterController::class,'vendorForm'])->name('vendorForm');
Route::post('vendorRegister',[RegisterController::class,'vendorRegister'])->name('vendorRegister');

//------------------VENDOR LOGIN----------------------------
Route::get('loginForm',[loginController::class,'loginForm'])->name('loginForm');
Route::post('login',[loginController::class,'login'])->name('login');
Route::get('vendorHome',[loginController::class,'vendorHome'])->name('vendorHome')->middleware(CheckVendorLogin::class);
// Route::get('userHome',[loginController::class,'userHome'])->name('home')->middleware([CheckUserLogin::class , CheckUniLogin::class]);
// Route::get('search', [loginController::class, 'search'])->name('search');


//-------------LogOut--------------
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


//---------------VENDOR ADDS OFFER------------
Route::get('showOffer',[OfferController::class,'showOffer'])->name('showOffer');
Route::post('addOffer',[OfferController::class,'addOffer'])->name('addOffer');
Route::get('vendorHome', [OfferController::class, 'viewOffer'])->name('vendorHome');


//--------------VENDOR EDIT OFFER-------------
Route::get('editOffer/{id}', [OfferController::class, 'editOffer'])->name('editOffer');
Route::PUT('updateOffer/{id}', [OfferController::class, 'updateOffer'])->name('updateOffer');


//-----------VENDOR DELETE OFFER--------------
Route::get('deleteOffer/{id}',[OfferController::class , 'deleteOffer'])->name('deleteOffer');



//------------VENDOR EDIT PROFILE--------------
Route::get('vendorProfile',[ProfileController::class,'vendorProfile'])->name('vendorProfile');
Route::PUT('updateVendorProfile',[ProfileController::class,'updateVendorProfile'])->name('updateVendorProfile');



//---------------VENDOR TRANSACTIONS-------------
Route::get('viewTransaction',[TransactionController::class,'viewTransaction'])->name('viewTransaction');



//------------------ABOUT PAGE---------------------
Route::get('about', function () {
    return view('about');
})->name('about');





//----------------------SignUp---------------
Route::get('showSchool', [RegisterController::class, 'showSchool'])->name('showSchool');
Route::get('showUni', [RegisterController::class, 'showUni'])->name('showUni');
Route::post('schoolRegister', [RegisterController::class, 'schoolRegister'])->name('schoolRegister');
Route::post('uniRegister', [RegisterController::class, 'uniRegister'])->name('uniRegister');




//------------------------UserProfile-----------------
Route::get('showUni', [RegisterController::class, 'showUni'])->name('showUni');
Route::post('schoolRegister', [RegisterController::class, 'schoolRegister'])->name('schoolRegister');



//------------------USER EDIT PROFILE---------------
Route::get('uniProfile',[ProfileController::class,'uniProfile'])->name('uniProfile');
Route::get('schoolProfile',[ProfileController::class,'schoolProfile'])->name('schoolProfile');
Route::PUT('updateUniProfile',[ProfileController::class,'updateUniProfile'])->name('updateUniProfile');
Route::PUT('updateSchoolProfile',[ProfileController::class,'updateSchoolProfile'])->name('updateSchoolProfile');
Route::get('editProfile', [loginController::class, 'editProfile'])->name('editProfile');





//---------Feedback--------
Route::get('feedback',[FeedbackController::class,'viewFeedback'])->name('feedback');
Route::post('sendFeedback',[FeedbackController::class,'sendFeedback'])->name('sendFeedback');




//------------------USER HOME--------------------
Route::get('home',[homeController::class,'index'])->name('home');







//---------------USER VIEW OFFERS---------------------
Route::get('viewOffer' , [UserViewController::class , 'viewOffer'])->name('viewOffer');