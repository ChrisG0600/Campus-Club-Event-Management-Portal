<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    // Dashboard
    public function index()
    {
        return view('club.index');
    }

    // Show Club Form
    public function showForm()
    {
        return view('club.form');
    }

    // Manage Club
    public function manageClub()
    {
        return view('club.manage');
    }
}
