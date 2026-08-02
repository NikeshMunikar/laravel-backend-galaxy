<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\contact;
use App\Models\enquiry;
use App\Models\intakeForm;
use App\Models\JobApplyForm;


class NotificationController extends Controller
{
    
    public function show($type, $id)
    {
        $user = Auth::user();
        $notification = $user->notifications->find($id);

        if ($notification) {
            // Mark the notification as read
            $notification->markAsRead();
            
            // Perform specific action based on notification type
            switch ($type) {
                case 'App\Notifications\NotifyNewContactFormSubmission':
                    // Redirect to contact form related action
                    $contact = contact::where('name', $notification->data['name'])->first();

                    if ($contact) {
                        return redirect()->route('contact.show',$contact->id);
                    }
                    break;
                case 'App\Notifications\NotifyNewEnquiryFormSubmission':
                    // Redirect to enquiry form related action
                    $enquiry = enquiry::where('name', $notification->data['name'])->first();

                    if ($enquiry) {
                        return redirect()->route('enquiry.show',$enquiry->id);
                    }
                    break;
                case 'App\Notifications\NotifyNewIntakeFormSubmission':
                    // Redirect to intake form related action
                    $intake = intakeForm::where('name', $notification->data['name'])->first();

                    if ($intake) {
                        return redirect()->route('intake.show',$intake->id);
                    }
                    break;
                case 'App\Notifications\NotifyNewJobApplyFormSubmission':
                    // Redirect to intake form related action
                    $jobApply = JobApplyForm::where('name', $notification->data['name'])->first();

                    if ($jobApply) {
                        return redirect()->route('jobApply.show',$jobApply->id);
                    }
                    break;
                // Add more cases for other notification types
                
                default:
                    return redirect()->back()->with('error', 'Invalid notification type.');
            }
        }
        
        return redirect()->back()->with('error', 'Notification not found.');
    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications->find($id);
        
        if ($notification) {
            $notification->markAsRead();
            return redirect()->back()->with('success', 'Notification marked as read.');
        }
        
        return redirect()->back()->with('error', 'Notification not found.');
    }
}
