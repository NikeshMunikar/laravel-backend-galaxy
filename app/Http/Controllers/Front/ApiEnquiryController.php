<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enquiry;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Notifications\NotifyNewEnquiryFormSubmission;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class ApiEnquiryController extends Controller
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
            'enq_address' => 'required|string|max:255',
            'enq_contact_number' => 'required|string|max:255',
            'enq_date' => 'required|date',
            'enq_support_hour' => 'required|string|max:255',
            'enq_support_description' => 'required|string',
            'enq_any_risk' => 'required|string|max:255',
        ],[
            'enq_name.required' => 'Please input enquiry name',
            'email.required' => 'Please input valid email',
            'enq_address.required' => 'Address is required',
            'enq_contact_number.required' => 'Please Provide Contact Number',
            'enq_date.required' => 'This filed is required',
            'enq_support_hour.required' => 'This field is required',
            'enq_support_description.required' => 'Support Description field is required',
            'enq_any_risk.required' => 'This field is required',

        ]);
        //for validation section ends
        //for storing
        enquiry::create($request->all());

        $user = User::where('usertype',1)->get();
        // Send notification to usertype 1 users
        Notification::send($user, new NotifyNewEnquiryFormSubmission($request->name));

        return response()->json('OK');

    }   //end of method

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
