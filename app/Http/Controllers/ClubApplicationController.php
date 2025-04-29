<?php

namespace App\Http\Controllers;

use App\Models\ClubMember;
use App\Models\ClubRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubApplicationController extends Controller
{
    // Show applicants
    public function showApplicant()
    {
        $manageClub = ClubRegistration::all();
        return view('club.applicants.index', compact('manageClub'));
    }

    // Get Current Member
    public function showMembers($club)
    {
        $members = ClubMember::where('club_id', $club)->where('status', 'approved')->with('student')->get();

        $formattedMembers = $members->map(function ($member){
            return [
                'id' => $member->id,
                'name' => $member->student->name,
                'email' => $member->student->email,
                'student_number' => $member->student_number,
                'created_at' => $member->created_at->format('m/d/y'),
                'role' => $member->role,
            ];
        });

        return response()->json($formattedMembers);
    }

    // Show Pending Applicants
    public function showPendingApplicant($club)
    {
        $pendingMembers = ClubMember::where('club_id', $club)->where('status', 'pending')->with('student')->get();

        $formattedPendingMembers = $pendingMembers->map(function ($member){
            return [
                'id' => $member->id,
                'name' => $member->student->name,
                'email' => $member->student->email,
                'student_number' => $member->student_number,
                'created_at' => $member->created_at->format('m/d/y'),
            ];
        });

        return response()->json($formattedPendingMembers);
    }
    // Show Rejected Applicants
    public function showRejectedApplicant($club)
    {
        $rejectedMembers = ClubMember::where('club_id', $club)->where('status','rejected')->with('student')->get();

        $formattedRejectedMembers = $rejectedMembers->map(function ($member){
            return [
                'id' => $member->id,
                'name' => $member->student->name,
                'email' => $member->student->email,
                'submission_count' => $member->resubmission_count,
                'student_number' => $member->student_number,
                'created_at' => $member->created_at->format('m/d/y'),
                'reject_message' => $member->reject_message,
            ];
        });
        return response()->json($formattedRejectedMembers);
    }

    // Show Declined Applicants
    public function showClosedApplicants($club)
    {
        $declinedMember = ClubMember::where('club_id', $club)->whereIn('status', ['declined', 'withdrawn'])->with('student')->get();
        $formattedDeclinedMembers = $declinedMember->map(function ($member){
            return [
                'id' => $member->id,
                'name' => $member->student->name,
                'email' => $member->student->email,
                'student_number' => $member->student_number,
                'declined_at' => $member->created_at->format('m/d/y'),
            ];
        });
        return response()->json($formattedDeclinedMembers);
    }

    // Show Applicant Details
    public function show($id)
    {
        $applicant = ClubMember::with('student')->findOrFail($id);
        return view('club.applicants.show', compact('applicant'));
    }

    // Approve Pending Member
    public function approvePendingMember($id)
    {
        $member = ClubMember::findOrFail($id);
        $member->status = 'approved';
        $member->reject_message = null;
        $member->can_resubmit = false;
        $member->actioned_by = auth()->id(); 
        $member->save();

        return response()->json(['success' => true, 'message' => 'Member approved successfully.']);
    }

    // Remove Member
    public function removeMember($id)
    {
        $member = ClubMember::findOrFail($id);
        $member->status = 'declined';
        $member->actioned_by = auth()->id();
        $member->save();

        return response()->json(['success' => true, 'message' => 'Member removed successfully.']);
    }

    // Reject Pending Member
    public function rejectPendingMember($id)
    {

        $validatedData = request()->validate([
            'reject_message' => 'required|string|max:255',
        ]);
        
        $member = ClubMember::findOrFail($id);
        $member->status = 'rejected';
        $member->reject_message = $validatedData['reject_message'];
        $member->resubmission_count = $member->resubmission_count + 1;

        // Check if the maximum number of re-submissions has been reached
        if ($member->resubmission_count >= 3) {
            $member->can_resubmit = false;
        } else {
            $member->can_resubmit = true;
        }
        $member->actioned_by = auth()->id(); 
        $member->save();

        return response()->json(['success' => true, 'message' => 'Member rejected successfully.']);
    }

    // Decline Pending Member
    public function declinedPendingMember($id)
    {
        $validatedData = request()->validate([
            'decline_reason' => 'required|string|max:255',
        ]);
        $member = ClubMember::findOrFail($id);
        $member->status = 'declined';
        $member->reject_message = null;
        $member->decline_reason = $validatedData['decline_reason'];
        $member->declined_at = now();
        $member->resubmission_count = 0;
        $member->actioned_by = auth()->id(); 
        $member->save();

        return response()->json(['success' => true, 'message' => 'Member declined successfully.']);
    }
}
