<?php

namespace App\Http\Controllers;

use App\Models\ClubAnnouncement;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubAnnouncementController extends Controller
{
    // Create Form
    public function create()
    {
        return view('club.announcement.create');
    }

    // Store Announcement
    public function store(Request $request)
    {
        try {
            // Convert mm/dd/yyyy to Y-m-d 
            if ($request->announcement_date) {
                $dateParts = explode('/', $request->announcement_date);

                // Ensure the date format is valid
                if (count($dateParts) === 3) {
                    $formattedDate = sprintf('%s-%s-%s', $dateParts[2], $dateParts[0], $dateParts[1]);
                    $request->merge([
                        'announcement_date' => $formattedDate,
                    ]);
                } else {
                    return response()->json(['success' => false, 'errors' => ['announcement_date' => ['Invalid date format.']]], 422);
                }
            }
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
                'content' => 'required|string|max:1000|regex:/^[a-zA-Z ]+$/',
                'announcement_date' => 'required|date_format:Y-m-d',
                'time' => 'nullable|date_format:H:i',
                'place' => 'nullable|string|max:255',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }
            $validatedData = $validator->validated();
            // Store the announcement in the database
            $announcement = new ClubAnnouncement($validatedData);
            $announcement->created_by = auth()->id();
            $announcement->save();
            return response()->json(['success' => true, 'message' => 'Announcement created successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while creating the announcement.'], 500);
        }
    }
    
    // Edit Announcement
    public function edit($id)
    {
        $announcements = ClubAnnouncement::findOrFail($id);
        $formattedDate = new DateTime($announcements->announcement_date);
        $announcements->formatted_announcement_date = $formattedDate->format('m/d/Y');
        return view('club.announcement.edit', compact('announcements'));
    }

    // Update Announcement
    public function update(Request $request, $id)
    {
        try {
            // Convert mm/dd/yyyy to Y-m-d 
            if ($request->announcement_date) {
                $dateParts = explode('/', $request->announcement_date);

                // Ensure the date format is valid
                if (count($dateParts) === 3) {
                    $formattedDate = sprintf('%s-%s-%s', $dateParts[2], $dateParts[0], $dateParts[1]);
                    $request->merge([
                        'announcement_date' => $formattedDate,
                    ]);
                } else {
                    return response()->json(['success' => false, 'errors' => ['announcement_date' => ['Invalid date format.']]], 422);
                }
            }

            if ($request->filled('time')) {
                try {
                    $time = new \DateTime($request->time);
                    $request->merge(['time' => $time->format('H:i')]);
                } catch (\Exception $e) {
                    return response()->json(['success' => false, 'errors' => ['time' => ['Invalid time format.']]], 422);
                }
            }

            $validator = Validator::make($request->all(),[
                'title' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
                'content' => 'required|string|max:1000|regex:/^[a-zA-Z ]+$/',
                'announcement_date' => 'required|date_format:Y-m-d',
                'time' => ['sometimes', 'nullable', 'date_format:H:i'],
                'place' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }
            $validatedData = $validator->validated();

            $announcement = ClubAnnouncement::findOrFail($id);
            $announcement->created_by = auth()->id();
            $announcement->update($validatedData);

            return response()->json(['success' => true, 'message' => 'Announcement updated successfully.'], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the announcement.'], 500);
        }
    }

    // Delete Announcement
    public function destroy($id)
    {
        try {
            $announcement = ClubAnnouncement::findOrFail($id);
            $announcement->delete();
            return redirect()->route('club_admin.manage')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting the announcement.'], 500);
        }
    }
}
