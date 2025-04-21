<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClubAnnouncement;
use App\Models\ClubRegistration;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Dashboard for stundets
    public function index()
    {
        return view('students.index');
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
        return view('students.clubs.index', compact('categories'));
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
        return view('students.clubs.show', compact('club'));
    }
    
    // Event for students
    public function showEvent()
    {
        return view('students.events.index');
    }
}
