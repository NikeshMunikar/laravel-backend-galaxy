<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplyForm;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Notifications\NotifyNewJobApplyFormSubmission;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ApiJobApplyFormController extends Controller
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

        $user = User::where('usertype',1)->get();
        // Send notification to usertype 1 users
        Notification::send($user, new NotifyNewJobApplyFormSubmission($request->name));


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
