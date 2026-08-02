<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\intakeForm;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Notifications\NotifyNewIntakeFormSubmission;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class ApiIntakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return ["abc"];
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
            'participant_address' => 'required|string|max:255',
            'participant_email' => 'required|email|max:255',
            'participant_contact_number' => 'required|string|max:255',
            'participant_date_of_birth' => 'required',
            'participant_gender' => 'required|in:male,female,other',
            'participant_support_hours' => 'required|string|max:255',
            'participant_desc_support' => 'required|string',
            'participant_any_risk' => 'required|string|max:255',

            'invoicing_particular_name' => 'required|string|max:255',
            'invoicing_particular_email' => 'required|email|max:255',
            'invoicing_particular_contact_number' => 'required|string|max:255',
            'invoicing_plan_funding' => 'required|string|max:255',

            'participant_living_situatuion' => 'required|string',
            'participant_current_behavioural_plan' => 'required|in:yes,no',
            'participant_mobility_need_assistance' => 'required|in:yes,no',
            'participant_mobility_independent' => 'required|in:yes,no',
            'participant_mobility_desc' => 'required|string',

            'participant_comm_need_assistance' => 'required|in:yes,no',
            'participant_comm_perfer' => 'required|in:verbally,auslan,nonVerbally,gesture,iPad,other',
            'participant_comm_desc' => 'required|string',

            'participant_personal_care_need_assistance' => 'required|in:yes,no',
            'participant_transfer_need_assistance' => 'required|in:yes,no',
            'participant_eatinganddrinking_need_assistance' => 'required|in:yes,no',
            'participant_continence_need_assistance' => 'required|in:yes,no',
            'participant_continence_desc' => 'required|string',
            'participant_cald_background_need_assistance' => 'required|in:yes,no',
            'participant_work_preferences_desc' => 'required|string',

            'referrer_name' => 'required|string|max:255',
            'referrer_org' => 'required|string|max:255',
            'referrer_position' => 'required|string|max:255',
            'referrer_contact_number' => 'required|string|max:255',
            'referrer_email' => 'required|email|max:255',
            'referrer_remark' => 'required|string',
        ],[
            'name.required' => 'Please input participant name',
            'participant_address.required' => 'Participant Address is required',
            'participant_email.required' => 'Email is required',
            'participant_contact_number.required' => 'Please Provide Contact Number',
            'participant_date_of_birth.required' => 'Date of birth is required',
            'participant_support_hours.required' => 'This field is required',
            'participant_desc_support.required' => 'Support Description field is required',
            'participant_any_risk.required' => 'This field is required',

            'invoicing_particular_name.required' => 'Name is required',
            'invoicing_particular_email.required' => 'Email is required',
            'invoicing_particular_contact_number.required' => 'Contact No. is required',
            'invoicing_plan_funding.required' => 'Please provide some details about how you plan to fund',

            'participant_living_situatuion.required' => 'This field is required',
            'participant_mobility_desc.required' => 'Please provide some details about participant mobility',

            'participant_comm_desc.required' => 'Please describe how you would like to communicate',
            'participant_continence_desc.required' => 'This field is required',
            'participant_work_preferences_desc.required' => 'This field is required',

            'referrer_name.required' => 'Please provide referrer name',
            'referrer_org.required' => 'Please provide referrer organization',
            'referrer_position.required' => 'Please provide referrer position',
            'referrer_contact_number.required' => 'Please provide referrer contact no.',
            'referrer_email.required' => 'Please provide referrer email',
            'referrer_remark.required' => 'This field is required',
        ]);
        //for validation section ends

        //for storing
        // intakeForm::create($request->all());
        try {
            intakeForm::create($request->all());
            DB::commit();

            $user = User::where('usertype',1)->get();
            // Send notification to usertype 1 users
            Notification::send($user, new NotifyNewIntakeFormSubmission($request->name));

            return response()->json([
                'message' => 'Intake data added successfully'
            ], 200);
        } catch (\Exception $e) {
            // DB::rollBack();
            return response()->json([
                'message' => 'Internal server error'
            ], 500);
        }

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
