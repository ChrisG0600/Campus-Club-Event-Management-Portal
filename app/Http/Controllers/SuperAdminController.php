<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClubAnnouncement;
use App\Models\ClubRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SuperAdminController extends Controller
{
    //
    public function index()
    {
        $studentsCount = User::whereIn('role', ['student', 'club_admin'])->count();
        $clubsTotal = ClubRegistration::where('is_pending', false)->count();
        return view('admin.index', compact('studentsCount', 'clubsTotal'));
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
            //Log::info('Student updated successfully:', ['id' => $studentsId->id, 'new_role' => $studentsId->role]);
            return response()->json(['success' => 'Student updated successfully!', 'student' => $studentsId->fresh()]);
        } else {
            // Log failure
            //Log::error('Failed to update student:', ['id' => $studentsId->id, 'requested_role' => $request->input('role')]);
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

        $users = User::query()
            ->where('role', '!=', 'super_admin'); // Exclude super admins

        if ($query) {
            $users->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->orWhere('role', 'like', '%' . $query . '%');
            });
        } else {
            $users->whereIn('role', ['student', 'club_admin']);
        }

        $users = $users->get();

        $formattedUsers = $users->map(function ($user) {
            $formattedRole = '';
            if ($user->role === 'student') {
                $formattedRole = __('Student');
            } elseif ($user->role === 'club_admin') {
                $formattedRole = __('Club Admin');
            } else {
                $formattedRole = $user->role;
            }

            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'formatted_role' => $formattedRole,
                'created_at' => $user->created_at
            ];
        });

        return response()->json($formattedUsers);
    }
    public function showClub()
    {
        $pendingClubsCount = ClubRegistration::where('is_pending', true)->count();
        $registeredClub = ClubRegistration::where('is_pending', false)->count();
        $pendingAnnouncment = ClubAnnouncement::where('status', 'pending')->count();

        $categoryCount = Category::all()->count();
        return view('admin.club.show', compact('pendingClubsCount', 'registeredClub', 'categoryCount', 'pendingAnnouncment'));
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
        $clubRegistration = ClubRegistration::with('creator','category')->where('is_pending', true)->get();
        return view('admin.club.registration.registrationClubs', compact('clubRegistration'));
    }

    public function approveClubRegistration($id)
    {
        $clubRegistration = ClubRegistration::findorFail($id);
        $clubRegistration->is_pending = false;
        $clubRegistration->save();
        return response()->json(['message' => 'Club approved successfully.']);
    }

    public function showPendingAnnouncement()
    {
        $pendingAnnouncements = ClubAnnouncement::where('status', 'pending')->with('club', 'creator')->get();
        return view('admin.club.announcement.showAnnouncement', compact('pendingAnnouncements'));
    }

    public function rejectAnnouncement(Request $request, $id)
    {
        try {
            
            $validatedData = $request->validate([
                'rejection_reason' => ['required', 'string', 'max:200'],
            ]);
            
            $announcement = ClubAnnouncement::findOrFail($id);
            $announcement->status = 'rejected';
            $announcement->rejection_reason = $validatedData['rejection_reason'];
            $announcement->save();


        return response()->json(['success' => true, 'message' => 'Announcement has been rejected successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error on rejecting this announcement.']);
        }
    }

    public function publishAnnouncement($id)
    {
        try {
            $announcement = ClubAnnouncement::findOrFail($id);
            $announcement->status = 'published';
            $announcement->save();

            return response()->json(['success' => true, 'message' => 'Announcement has been approved and published.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error on approving this announcement. Pleas try again later.']);
        }
    }
}
