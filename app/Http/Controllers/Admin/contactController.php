<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Notifications\NotifyNewContactFormSubmission;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
  
        $page_name = 'Contacts';
        $contact = contact::orderBy('id','desc')->get();
        return view('admin.contact.list',compact('page_name','contact','user','notification'));
    }   //end of method


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_name = 'Contact Form';
        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
  
        return view('admin.contact.create', compact('page_name','user','notification'));
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
        contact::create($request->all());

        return redirect()->route('contact')->with('success', 'Contact Data Added Sucessfully.');


    }   //end of method

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
  
        $page_name = 'View Contact';
        $contact = contact::findOrFail($id);
        
        return view('admin.contact.show',compact('page_name','contact','user','notification'));
    }   //end of method
    
    public function contactPDF(string $id)
    {
        $page_name = 'Contact PDF';
        $contact = contact::findOrFail($id);
        
        // Generate PDF using Dompdf
        $pdf = PDF::loadView('admin.contact.show_pdf', compact('contact'));
        return $pdf->download('contactPDF'. time(). rand('9999','99999999'). Str::random('10') . '.pdf');
    }   //end of method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page_name = 'Edit Contact';
        $contact = contact::findOrFail($id);

        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
      $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
        
        return view('admin.contact.edit',compact('page_name','contact','user','notification'));
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
        //for updating data
        $contact = contact::findOrFail($id);

        // Update the contact form fields
        $contact->update($request->all());

        return redirect()->route('contact')->with('success', 'Contact Data Updated Successfully.');


    }   //end of emthod

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact Data Deleted Sucessfully.');
    }   //end of method
}
