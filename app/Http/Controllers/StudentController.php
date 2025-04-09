<?php

namespace App\Http\Controllers;

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
        return view('students.announcement');
    }

    // Club for students
    public function showClub()
    {
        return view('students.clubs.index');
    }

    // Event for students
    public function showEvent()
    {
        return view('students.events.index');
    }
}
