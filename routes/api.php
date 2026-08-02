<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ApiContactController;
use App\Http\Controllers\Front\ApiEnquiryController;
use App\Http\Controllers\Front\ApiIntakeController;
use App\Http\Controllers\Front\ApiJobApplyFormController;
use App\Http\Controllers\Front\ApiJobOpeningController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api route for contact form
Route::resource('/contactsapi', ApiContactController::class);
Route::resource('/enquiryapi', ApiEnquiryController::class);
Route::resource('/intakeapi', ApiIntakeController::class);
Route::resource('/jobopeningapi', ApiJobOpeningController::class);
Route::resource('/jobapplyapi', ApiJobApplyFormController::class);
