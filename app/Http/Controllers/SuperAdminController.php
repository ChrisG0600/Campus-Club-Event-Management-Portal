<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function showStudents()
    {
        return view('admin.users.students');
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
