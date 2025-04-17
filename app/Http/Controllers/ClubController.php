<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClubRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
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
        $categories = Category::all();
        return view('club.form', compact('categories'));
    }

    public function store(Request $request)
    {
        try{
            $user = auth()->user();
            $maxClubsAllowed = 2;
            $existingClubCount = ClubRegistration::where('created_by', $user->id)->count();
            if($existingClubCount >= $maxClubsAllowed){
                return response()->json(['success' => false, 'message' => 'You have reached the maximum limit of ' . $maxClubsAllowed . ' registered clubs.'], 429);
            }

            $validator = Validator::make($request->all(),[
                'club_name' => 'required|string|max:255|unique:club_registrations,club_name',
                'club_description' => 'required|string|max:300',
                'club_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'club_email' => 'required|email|max:255',
                'club_advisor' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'created_by' => 'nullable|exists:users,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $validatedData = $validator->validated();

            // Handle file upload for club logo
            if ($request->hasFile('club_logo')) {
                $file = $request->file('club_logo');
                $filename = date('Y').'-'.time() . '-'. Str::random(8). '.' . $file->getClientOriginalExtension();
                $path = 'images/club_logos/' . $filename; 
                $file->move(public_path('images/club_logos'), $filename);
                $validatedData['club_logo'] = $filename; 
            }
            
            $clubRegistration = new ClubRegistration($validatedData);
            $clubRegistration->created_by = auth()->id();
            $clubRegistration->save();

            return response()->json(['success' => true, 'message' => 'Awesome! Your club registration has been submitted and is now pending admin approval.']);
        }
        catch (\Exception $e){
            return response()->json(['success' => false, 'message' => 'An error occurred.'], 500);
        }
    }

    // Manage Club
    public function manageClub()
    {
        $clubs = ClubRegistration::with('creator')->get();
        return view('club.manage', compact('clubs'));
    }

    // Edit Club
    public function edit($id)
    {
        $clubs = ClubRegistration::findOrFail($id);
        $categories = Category::all();
        //check if the user is authorized to edit the club
        // if ($clubs->id != Auth::id()) {
        //     abort(403, 'Unauthorized action.');
        // }
        return view('club.editClub', compact('clubs', 'categories'));
    }

    // Update Club
    public function update(Request $request, $id)
    {
        Log::info('Request All: ' . print_r($request->all(), true));
        try {
            $validator = Validator::make($request->all(),[
                'id' => 'required',
                'club_name' => 'required|string|max:255',
                'club_description' => 'required|string|max:300',
                'club_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'club_email' => 'required|email|max:255',
                'club_advisor' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'created_by' => 'nullable|exists:users,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }

            $validatedData = $validator->validated();

            // Handle file upload for club logo
            if ($request->hasFile('club_logo')) {
                $file = $request->file('club_logo');
                $filename = date('Y').'-'.time() . '-'. Str::random(8). '.' . $file->getClientOriginalExtension();
                $path = 'images/club_logos/' . $filename; 
                $file->move(public_path('images/club_logos'), $filename);
                $validatedData['club_logo'] = $filename; 
            }
            $clubs = ClubRegistration::findOrFail($id);
            $clubs->update($validatedData);
            return response()->json(['success' => true, 'message' => 'Your club registration has been updated successfully.']);

        } catch (\Exception $e) {   
            return response()->json(['success' => false, 'message' => 'An error occurred.'], 500);            
        }
    }
}
