<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubApplicationController extends Controller
{
    // Show applicants
    public function showApplicant()
    {
        return view('club.applicants.index');
    }

    public function show()
    {
        return view('club.applicants.show');
    }
}
