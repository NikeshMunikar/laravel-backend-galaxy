<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function redirect()
   {
      //for notifaction to user id 1
      $user = User::where('usertype',1)->first();
      $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
      $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
      $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
      $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();

      return view('admin.home', compact('notification','user'));
   }


}   //AdminController ends
