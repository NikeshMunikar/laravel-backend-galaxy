<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enquiry;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Notifications\NotifyNewContactFormSubmission;

class enquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_name = 'Enquiry';
        $enquiry = enquiry::orderBy('id','desc')->get();

        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();

        return view('admin.enquiry.list',compact('page_name','enquiry','user','notification'));
    }   //end of method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_name = 'Enquiry Form';
        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();

        return view('admin.enquiry.create', compact('page_name','user','notification'));
    }   //end of method

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
            'name.required' => 'Please input enquiry name',
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

        return redirect()->route('enquiry')->with('success', 'Enquiry Data Added Sucessfully.');


    }   //end of method

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page_name = 'View Enquiry';
        $enquiry = enquiry::findOrFail($id);

        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
        
        return view('admin.enquiry.show',compact('page_name','enquiry','user','notification'));
    }   //end of method

    public function enquiryPDF(string $id)
    {
        $page_name = 'Enquiry PDF';
        $enquiry = enquiry::findOrFail($id);
        
        // Generate PDF using Dompdf
        $pdf = PDF::loadView('admin.enquiry.show_pdf', compact('enquiry'));
        return $pdf->download('enquiryPDF'. time(). rand('9999','99999999'). Str::random('10') . '.pdf');
    }   //end of method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page_name = 'Edit Enquiry';
        $enquiry = enquiry::findOrFail($id);

        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
        
        return view('admin.enquiry.edit',compact('page_name','enquiry','user','notification'));
    }   //end of method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'name.required' => 'Please input enquiry name',
            'email.required' => 'Please input valid email',
            'enq_address.required' => 'Address is required',
            'enq_contact_number.required' => 'Please Provide Contact Number',
            'enq_date.required' => 'This filed is required',
            'enq_support_hour.required' => 'This field is required',
            'enq_support_description.required' => 'Support Description field is required',
            'enq_any_risk.required' => 'This field is required',

        ]);
        //for validation section ends
        //for updating data
        $enquiry = enquiry::findOrFail($id);

        // Update the enquiry form fields
        $enquiry->update($request->all());

        return redirect()->route('enquiry')->with('success', 'Enquiry Data Updated Successfully.');

    }   //end of method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enquiry = enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect()->back()->with('success', 'Enquiry Data Deleted Sucessfully.');
    }   //end of method
}
