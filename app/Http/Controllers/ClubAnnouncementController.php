<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubAnnouncementController extends Controller
{
    // Create Form
    public function create()
    {
        return view('club.announcement.create');
    }
}
