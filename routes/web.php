<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\intakeController;
use App\Http\Controllers\Admin\enquiryController;
use App\Http\Controllers\Admin\contactController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\JobOpeningController;
use App\Http\Controllers\Admin\JobApplyFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route non-user and auth user can get
Route::get('/',[HomeController::class,'index']);

 //route for home dashboard which has profile and logout like that, begins here
 Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//route for home dashboard which has profile and logout like that, ends here

//route for auth user means only the logged in user can get route of below, begins here
// Route::middleware('auth')->group(function() {
    // Route::get('/',[DashboardController::class,'redirect']);

// });
//route for auth user means only the logged in user can get route of below, ends here


//route for auth admin means only the logged in admin can get route of below, begins here
Route::prefix('back')->middleware(['auth', 'admin'])->group(function () {

    //for redirect to back-end dashboard
    Route::get('/',[AdminController::class,'redirect']);

    //routes for intake form section starts
    Route::get('/index',[intakeController::class,'index'])->name('intake.index');
    Route::get('/create',[intakeController::class,'create'])->name('intake.create');
    Route::post('/store',[intakeController::class,'store'])->name('intake.store');
    Route::get('/edit/{id}',[intakeController::class,'edit'])->name('intake.edit');
    Route::get('/show/{id}',[intakeController::class,'show'])->name('intake.show');
    Route::put('/update/{id}',[intakeController::class,'update'])->name('intake.update');
    Route::delete('/delete/{id}',[intakeController::class,'destroy'])->name('intake.delete');
    Route::get('/intakePDF/{id}',[intakeController::class,'intakePDF'])->name('intake.pdf');
    //End of routes for intake form section

    //route for enquiry form
    Route::get('/enquiry',[enquiryController::class,'index'])->name('enquiry');
    Route::get('/enquiry/create',[enquiryController::class,'create'])->name('enquiry.create');
    Route::post('/enquiry/store',[enquiryController::class,'store'])->name('enquiry.store');
    Route::get('/enquiry/edit/{id}',[enquiryController::class,'edit'])->name('enquiry.edit');
    Route::get('/enquiry/show/{id}',[enquiryController::class,'show'])->name('enquiry.show');
    Route::put('/enquiry/update/{id}',[enquiryController::class,'update'])->name('enquiry.update');
    Route::delete('/enquiry/delete/{id}',[enquiryController::class,'destroy'])->name('enquiry.delete');
    Route::get('/enquiryPDF/{id}',[enquiryController::class,'enquiryPDF'])->name('enquiry.pdf');
    //End of routes for enquiry form section

    //route for contact form
    Route::get('/contact',[contactController::class,'index'])->name('contact');
    Route::get('/contact/create',[contactController::class,'create'])->name('contact.create');
    Route::post('/contact/store',[contactController::class,'store'])->name('contact.store');
    Route::get('/contact/edit/{id}',[contactController::class,'edit'])->name('contact.edit');
    Route::get('/contact/show/{id}',[contactController::class,'show'])->name('contact.show');
    Route::put('/contact/update/{id}',[contactController::class,'update'])->name('contact.update');
    Route::delete('/contact/delete/{id}',[contactController::class,'destroy'])->name('contact.delete');
    Route::get('/contactPDF/{id}',[contactController::class,'contactPDF'])->name('contact.pdf');

    //route for notification 
    Route::get('/notifications/{type}/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    
    //End of routes for contact form section

    //route for blog form
    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
    Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
    Route::get('/blog/show/{id}',[BlogController::class,'show'])->name('blog.show');
    Route::put('/blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
    Route::delete('/blog/delete/{id}',[BlogController::class,'destroy'])->name('blog.delete');
    Route::get('/blogPDF/{id}',[BlogController::class,'blogPDF'])->name('blog.pdf');
 
    //route for job_opening form
    Route::get('/jobOpening',[JobOpeningController::class,'index'])->name('jobOpening');
    Route::get('/jobOpening/create',[JobOpeningController::class,'create'])->name('jobOpening.create');
    Route::post('/jobOpening/store',[JobOpeningController::class,'store'])->name('jobOpening.store');
    Route::get('/jobOpening/edit/{id}',[JobOpeningController::class,'edit'])->name('jobOpening.edit');
    Route::put('/jobOpening/update/{id}',[JobOpeningController::class,'update'])->name('jobOpening.update');
    Route::delete('/jobOpening/delete/{id}',[JobOpeningController::class,'destroy'])->name('jobOpening.delete');
    Route::put('/jobOpening/publish/{id}', [JobOpeningController::class,'publish'])->name('jobOpening.publish');
    
    //route for job_apply form
    Route::get('/jobApply',[JobApplyFormController::class,'index'])->name('jobApply');
    Route::get('/jobApply/create',[JobApplyFormController::class,'create'])->name('jobApply.create');
    Route::post('/jobApply/store',[JobApplyFormController::class,'store'])->name('jobApply.store');
    Route::get('/jobApply/edit/{id}',[JobApplyFormController::class,'edit'])->name('jobApply.edit');
    Route::put('/jobApply/update/{id}',[JobApplyFormController::class,'update'])->name('jobApply.update');
    Route::delete('/jobApply/delete/{id}',[JobApplyFormController::class,'destroy'])->name('jobApply.delete');
    Route::put('/jobApply/publish/{id}', [JobApplyFormController::class,'publish'])->name('jobApply.publish');
    Route::get('/jobApply/show/{id}',[JobApplyFormController::class,'show'])->name('jobApply.show');
    Route::get('/jobApplyPDF/{id}',[JobApplyFormController::class,'jobApplyPDF'])->name('jobApply.pdf');
    
});
//route for auth admin means only the logged in admin can get route of below, ends here
