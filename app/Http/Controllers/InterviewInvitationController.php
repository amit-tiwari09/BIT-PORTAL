<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InterviewInvitation;
use App\ApprovedStaff;
use App\JobApplication;

class InterviewInvitationController extends Controller
{
    public function index()
    {
        // Fetch all interview invitations
        $invitations = InterviewInvitation::with('application.student')->get();

        // Return the view with the invitations
        return view('interviews.index', compact('invitations'));
    }


    public function approve($id)
    {
        
        $invitation = InterviewInvitation::findOrFail($id);
        $invitation1 = JobApplication::findOrFail($id);
       

        // Move the student to the approved_staff table
        ApprovedStaff::create([
            'application_id' => $invitation->application_id,
        ]);

        // Update the status of the invitation to approved
        $invitation->status = 'approved';
        $invitation->save();

        // Delete the invitation from the interview_invitations table
        $invitation->delete();
        $invitation1->delete();


        return redirect()->route('interviews.index')->with('success', 'Student approved and moved to approved staff.');
    }

    // Method to reject the invitation
    public function reject($id)
    {
        $invitation = InterviewInvitation::findOrFail($id);
        $invitation1 = JobApplication::findOrFail($id);

        // Update the status of the invitation to rejected
        $invitation->status = 'rejected';
        $invitation->save();


        $invitation1->status = 'rejected';
        $invitation1->save();

        return redirect()->route('interviews.index')->with('success', 'Student rejected.');
    }
}
