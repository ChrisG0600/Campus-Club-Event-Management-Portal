<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClubAnnouncementController;
use App\Http\Controllers\ClubApplicationController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Only Students can access these
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/student/announcement', [StudentController::class, 'showAnnouncement'])->name('student.announcement');
    Route::get('/student/club', [StudentController::class, 'showClub'])->name('student.club.index');
    Route::get('/student/event', [StudentController::class, 'showEvent'])->name('student.event.index');
});
// Only Club Admins can access these
Route::middleware(['auth', 'role:club_admin'])->group(function () {
    Route::get('/club', [ClubController::class, 'index'])->name('club_admin.dashboard');
    Route::get('/club/create', [ClubController::class, 'showForm'])->name('club_admin.showForm');
    Route::get('/club/manage', [ClubController::class, 'manageClub'])->name('club_admin.manage');
    
    Route::get('/club/manage/announcement/create', [ClubAnnouncementController::class, 'create'])->name('create');
    Route::get('/club/applicants', [ClubApplicationController::class, 'showApplicant'])->name('club_admin.showApplicant');
    // Change to {id} 
    Route::get('/club/applicants/1', [ClubApplicationController::class, 'show'])->name('club_admin.show');
});

// Only Super Admins can access admin stuff
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('super_admin.dashboard');
    Route::get('/students', [SuperAdminController::class, 'showStudents'])->name('super_admin.showStudents');
    Route::get('/clubs', [SuperAdminController::class, 'showClub'])->name('super_admin.showClubs');
    Route::get('/club/deletion-requests', [SuperAdminController::class, 'showClubDeletionRequests'])->name('super_admin.showClubDeletionRequests');
    Route::get('/club/registered', [SuperAdminController::class, 'showRegisteredClubs'])->name('super_admin.showRegisteredClubs');
    Route::get('/club/registration-requests', [SuperAdminController::class, 'showClubRegistrationClubs'])->name('super_admin.showClubRegistrationRequests');
    Route::get('/club/pending-announcement', [SuperAdminController::class, 'showPendingAnnouncement'])->name('super_admin.showPendingAnnouncement');

    // CRUD for categories
    Route::get('/club/categories', [CategoryController::class, 'index'])->name('super_admin.categories.index');
    Route::post('/club/categories', [CategoryController::class, 'store'])->name('super_admin.categories.store');
    Route::put('/club/categories/{category}', [CategoryController::class, 'update'])->name('super_admin.categories.update');
    Route::delete('/club/categories/{category}', [CategoryController::class, 'destroy'])->name('super_admin.categories.destroy');
});


require __DIR__.'/auth.php';
