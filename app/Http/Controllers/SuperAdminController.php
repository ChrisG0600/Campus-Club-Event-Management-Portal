<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SuperAdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    // Show admin->students
    public function showStudents()
    {
        $users = User::where('role', 'student')->orWhere('role', 'club_admin')->paginate(10);


        return view('admin.users.students', compact('users'));
    }

    // Handle Update admin->students
    public function updateStudent(Request $request, User $studentsId)
    {

        $validatedData = $request->validate([
            'role' => 'required|string|in:student,club_admin',
        ]);

        $studentsId->role = $validatedData['role'];

        if ($studentsId->save()) {
            // Log success
            Log::info('Student updated successfully:', ['id' => $studentsId->id, 'new_role' => $studentsId->role]);
            return response()->json(['success' => 'Student updated successfully!', 'student' => $studentsId->fresh()]);
        } else {
            // Log failure
            Log::error('Failed to update student:', ['id' => $studentsId->id, 'requested_role' => $request->input('role')]);
            return response()->json(['error' => 'Failed to update student. Check logs for details.']);
        }
    }

    // Handle Delete admin->students
    public function destroyStudent(User $studentsId)
    {
    
        $studentsId->delete();

        return redirect()->route('super_admin.showStudents')->with('success', 'Student deleted successfully!');

    }

    // Handle Search admin->students
    public function searchStudents(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $users = User::where('name', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%')
                        ->orWhere('role', 'like', '%' . $query . '%')
                        ->get();

            return response()->json($users);
        } else {
            // Return all users (adjust query as needed for your base data)
            $users = User::where('role', 'student')->orWhere('role', 'club_admin')->get();
            return response()->json($users);
        }
    }

    public function showClub()
    {
        return view('admin.club.show');
    }

    public function showClubDeletionRequests()
    {
        return view('admin.club.deletion.deletionRequests');
    }

    public function showRegisteredClubs()
    {
        return view('admin.club.registered.registeredClubs');
    }

    public function showClubRegistrationClubs()
    {
        return view('admin.club.registration.registrationClubs');
    }

    public function showPendingAnnouncement()
    {
        return view('admin.club.announcement.showAnnouncement');
    }
}
