<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplyForm;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Notifications\NotifyNewContactFormSubmission;
use App\Models\JobOpening;
use Illuminate\Support\Facades\Storage;


class JobApplyFormController extends Controller
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
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
  
        $page_name = 'Job Apply Form';
        $jobApply = JobApplyForm::orderBy('id','desc')->get();
        return view('admin.job_apply_form.list',compact('page_name','jobApply','user','notification'));
    }   //end of method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_name = 'Create Job Applicant';
        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
        
        //for showing job_title in Job Apply form where job_to_be_publishe is 1 only
        $jobOpenings = JobOpening::where('job_to_be_published',1)->pluck('job_title','id');

        return view('admin.job_apply_form.create', compact('page_name','user','notification','jobOpenings'));
    }   //end of method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //for validation section starts
        $request->validate([
            'name' => 'required',
            'applicant_location' => 'required',
            'applicant_number' => 'required',
            'applicant_email' => 'required',
            'applicant_resume' => 'required|mimes:pdf|max:2048',
            'applicant_coverletter' => 'required',
            'applicant_job_title' => 'required|exists:job_openings,id',
        ],[
            'name.required' => 'Please input name',
            'applicant_location.required' => 'Please provide applicant location',
            'applicant_number.required' => 'Please Provide Contact Number',
            'applicant_email.required' => 'Please Provide valid Email',
            'applicant_coverletter.required' => 'This field is required',
        ]);
        //for validation section ends
        //for storing data
        $jobApply = new JobApplyForm();
        $jobApply->name = $request->name;
        $jobApply->applicant_location = $request->applicant_location;
        $jobApply->applicant_number = $request->applicant_number;
        $jobApply->applicant_email = $request->applicant_email;
        $jobApply->applicant_coverletter = $request->applicant_coverletter;
        $jobApply->applicant_job_title  = $request->applicant_job_title ;
        
        if ($request->file('applicant_resume')) {
            $file = $request->file('applicant_resume');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('pdf'), $filename);
            $jobApply->applicant_resume = $filename; // Assign the filename to the field
        }

        $jobApply->save();

        return redirect()->route('jobApply')->with('success', 'Applicant Added Sucessfully.');
       
    }   //end of method

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page_name = 'View Applicant Data';
        $jobApply = JobApplyForm::findOrFail($id);

        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
        
        return view('admin.job_apply_form.show',compact('page_name','jobApply','user','notification'));
    }   //end of method

    public function jobApplyPDF(string $id)
    {
        $page_name = 'Applicant PDF';
        $jobApply = JobApplyForm::findOrFail($id);
        
        // Generate PDF using Dompdf
        $pdf = PDF::loadView('admin.job_apply_form.show_pdf', compact('jobApply'));
        return $pdf->download('applicantDataPDF'. time(). rand('9999','99999999'). Str::random('10') . '.pdf');
    }   //end of method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page_name = 'Edit Applicatn';
        $jobApply = JobApplyForm::findOrFail($id);
        $jobOpenings = JobOpening::where('job_to_be_published', 1)->pluck('job_title', 'id');

        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
        
        return view('admin.job_apply_form.edit',compact('page_name','jobApply','jobOpenings','user','notification'));
    }   //end of method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //for validation section starts
        $request->validate([
            'name' => 'required',
            'applicant_location' => 'required',
            'applicant_number' => 'required',
            'applicant_email' => 'required',
            'applicant_resume' => 'nullable|mimes:pdf|max:2048',
            'applicant_coverletter' => 'required',
            'applicant_job_title' => 'required|exists:job_openings,id',
        ],[
            'name.required' => 'Please input name',
            'applicant_location.required' => 'Please provide applicant location',
            'applicant_number.required' => 'Please Provide Contact Number',
            'applicant_email.required' => 'Please Provide valid Email',
            'applicant_coverletter.required' => 'This field is required',
        ]);
        //for validation section ends
        //for storing data
        $jobApply = JobApplyForm::findOrFail($id);
        $jobApply->name = $request->name;
        $jobApply->applicant_location = $request->applicant_location;
        $jobApply->applicant_number = $request->applicant_number;
        $jobApply->applicant_email = $request->applicant_email;
        $jobApply->applicant_coverletter = $request->applicant_coverletter;
        $jobApply->applicant_job_title  = $request->applicant_job_title ;
        
        if ($request->file('applicant_resume')) {
            if ($jobApply->applicant_resume) {
                @unlink(public_path('pdf/'.$jobApply->applicant_resume));
            }
            
            $file = $request->file('applicant_resume');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('pdf'), $filename);
            $jobApply->applicant_resume = $filename; // Assign the filename to the field
        }

        $jobApply->save();

        return redirect()->route('jobApply')->with('success', 'Applicant Updated Sucessfully.');
       
    }   //end of method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobApply = JobApplyForm::findOrFail($id);
        @unlink(public_path('pdf/'.$jobApply->applicant_resume));
        $jobApply->delete();
        return redirect()->back()->with('success', 'Applicant Data Deleted Sucessfully.');
    }   //end of method
}
