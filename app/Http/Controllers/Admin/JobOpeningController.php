<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOpening;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Notifications\NotifyNewContactFormSubmission;

class JobOpeningController extends Controller
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
  
        $page_name = 'Job Opening';
        $jobOpenings = JobOpening::orderBy('id','desc')->get();
        return view('admin.job_opening.list',compact('page_name','jobOpenings','user','notification'));
    }   //end of method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_name = 'Create Job';
        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
  
        return view('admin.job_opening.create', compact('page_name','user','notification'));
    }   //end of method


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //for validation section starts
        $request->validate([
            'job_title' => 'required',
            'job_operating_area' => 'required',
            'job_desc' => 'required',
        ],[
            'job_title.required' => 'Please input job title',
            'job_operating_area.required' => 'Please provide job operating area',
            'job_desc.required' => 'Please Provide Job Description',
        ]);
        //for validation section ends
        //for storing data
        $jobOpenings = new JobOpening();
        $jobOpenings->job_title = $request->job_title;
        $jobOpenings->job_operating_area = $request->job_operating_area;
        $jobOpenings->job_desc = $request->job_desc;
        $jobOpenings->job_to_be_published = 1;
        $jobOpenings->save();

        return redirect()->route('jobOpening')->with('success', 'Job Added Sucessfully.');

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
        $page_name = 'Edit Job';
        $jobOpenings = JobOpening::findOrFail($id);

        //for notifaction to usertype 1
        $user = User::where('usertype',1)->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewContactFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewEnquiryFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewIntakeFormSubmission')->first();
        $notification = Auth::user()->notifications->where('type', 'App\Notifications\NotifyNewJobApplyFormSubmission')->first();
        
        return view('admin.job_opening.edit',compact('page_name','jobOpenings','user','notification'));
    }   //end of method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //for validation section starts
        $request->validate([
            'job_title' => 'required',
            'job_operating_area' => 'required',
            'job_desc' => 'required',
        ],[
            'job_title.required' => 'Please input job title',
            'job_operating_area.required' => 'Please provide job operating area',
            'job_desc.required' => 'Please Provide Job Description',
        ]);
        //for validation section ends
        //for storing data
        $jobOpenings = JobOpening::findOrFail($id);
        $jobOpenings->job_title = $request->job_title;
        $jobOpenings->job_operating_area = $request->job_operating_area;
        $jobOpenings->job_desc = $request->job_desc;
        $jobOpenings->save();

        return redirect()->route('jobOpening')->with('success', 'Job Data Updated Successfully.');
    }   //end of method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobOpenings = JobOpening::findOrFail($id);
        $jobOpenings->delete();
        return redirect()->back()->with('success', 'Job Data Deleted Sucessfully.');
    }   //end of method


    public function publish($id)
    {
        $jobOpenings = JobOpening::find($id);
        if ($jobOpenings->job_to_be_published === 1) {
            $jobOpenings->job_to_be_published = 0;
        }else{
            $jobOpenings->job_to_be_published = 1;
        }
        $jobOpenings->save();
        return redirect()->route('jobOpening')->with('success', 'Job Publish Status Updated Sucessfully');
    }   //end of method
}
