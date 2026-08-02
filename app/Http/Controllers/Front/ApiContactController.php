<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Notifications\NotifyNewContactFormSubmission;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ApiContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //for validation section starts
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'remark' => 'required|string|max:255',
        ],[
            'name.required' => 'Please input name',
            'email.required' => 'Email is required',
            'phone.required' => 'Please Provide Contact Number',
            'organization.required' => 'This filed is required',
            'remark.required' => 'This field is required',
        ]);
        //for validation section ends
        //for storing
        $user = User::where('usertype',1)->get();
        contact::create($request->all());

        // Send notification to usertype 1 users
        Notification::send($user, new NotifyNewContactFormSubmission($request->name));

        return response()->json('OK');

    }   //end of method

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }   // end of method


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
