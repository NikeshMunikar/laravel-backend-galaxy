<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;


class DashboardController extends Controller
{
    public function redirect()
    {
        return view('front.userpage');

        // Retrieve the currently logged-in user
        $user = Auth::user();

        if ($user->usertype == 1) {
            return redirect()->action([AdminController::class, 'redirect']);
        } else {

            return view('front.userpage');
        }
        
    }   //end of method

    public function about_us()
    {
        return view('front.about_us.list');
    }   //end of about_us method

    public function refferal_p()
    {
        return view('front.refferal.list');
    }   //end of refferal_p method

    public function gallery_p()
    {
        return view('front.gallery.list');
    }   //end of gallery_p method

    public function contact_us()
    {
        return view('front.contact_us.list');
    }   //end of contact_us method

    public function enquiry_p()
    {
        return view('front.enquiry.list');
    }   //end of enquiry_p method
}   
