<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClubAnnouncement;
use App\Models\ClubMember;
use App\Models\ClubRegistration;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // Dashboard for stundets
    public function index()
    {
        $hasApplied = ClubMember::with('club')->where('student_id', auth()->id())
        ->get();
        return view('students.index', compact('hasApplied'));
    }

    // Announcement for students
    public function showAnnouncement()
    {
        $clubAnnouncements = ClubAnnouncement::with('club')->orderBy('created_at', 'asc')->paginate(5);
        return view('students.announcement', compact('clubAnnouncements'));
    }

    // Club for students
    public function showClub()
    {
        $categories = Category::all();
        $hasApplied = ClubMember::with('club')->where('student_id', auth()->id())->get();
        return view('students.clubs.index', compact('categories', 'hasApplied'));
    }

    // Show Club List based on category
    public function showClubList($id)
    {
        $category = Category::with('clubRegistrations')->findOrFail($id);
        return view('students.clubs.category', compact('category'));
    }

    // Show Club Details
    public function showClubDetails($club, $id)
    {
        $club = ClubRegistration::with('category')->findOrFail($id);
        $hasApplied = ClubMember::where('student_id', auth()->id())
            ->where('club_id', $club->id)
            ->where('status', 'pending')
            ->exists();
        return view('students.clubs.show', compact('club', 'hasApplied'));
    }

    // Store
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'club_id' => 'required|exists:club_registrations,id',
                'student_number' => 'required|string|max:255|unique:club_members,student_number|Regex:/^[0-9]+$/',
                'why_interested' => 'required|string|max:500',
                'experience' => 'nullable|string|max:500',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $validatedData = $validator->validated();

            $application = new ClubMember($validatedData);
            $application['student_id'] = auth()->id();
            $application->save();

            return response()->json(['success' => true, 'message' => 'Application submitted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while submitting the application.'], 500);
        }
    }

    // Re-Apply the student if the application is rejected
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'applicant_id' => 'required|exists:club_members,id',
                'student_number' => 'nullable|string|max:255|Regex:/^[0-9]+$/',
                'why_interested' => 'nullable|string|max:500',
                'experience' => 'nullable|string|max:500',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $validatedData = $validator->validated();
            
            $application = ClubMember::where('id', $validatedData['applicant_id'])->where('student_id', auth()->id())->first();
            
            if (!$application) {
                return response()->json(['success' => false, 'message' => 'Application not found.'], 404);
            }
            
            $application->status = 'pending';
            $application->reject_message = null;
            $application->update($validatedData);

            return response()->json(['success' => true, 'message' => 'Application updated successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the application.'], 500);
        }
    }

    public function withdraw($id)
    {
        try {
            $applicant = ClubMember::where('id', $id)->where('student_id', auth()->id())->first();
            $validatedData = request()->validate([
                'withdrawn_reason' => 'required|string|max:255',
            ]);
            $applicant->status = 'withdrawn';
            $applicant->withdrawn_reason = $validatedData['withdrawn_reason'];
            $applicant->withdrawn_at = now();
            $applicant->actioned_by = null;
            $applicant->resubmission_count = 0;
            $applicant->can_resubmit = false;
            $applicant->save();
            return response()->json(['success' => true, 'message' => 'Application withdrawn successfully.']);
        } catch (\Exception $e) {
            Log::error('Error withdrawing application: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while withdrawing the application.'], 500);
        }
    
    }

    // Event for students
    public function showEvent()
    {
        return view('students.events.index');
    }
}
