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
    Route::get('/student/club/category/{id}', [StudentController::class, 'showClubList'])->name('student.clublist');
    Route::get('/student/club/category/{club}/{id}', [StudentController::class, 'showClubDetails'])->name('student.club.details');
    Route::post('/student/club/apply', [StudentController::class, 'store'])->name('student.club.apply');
    Route::put('/student/club/re-apply', [StudentController::class, 'update'])->name('student.club.reapply');
    Route::put('/student/club/{id}/withdraw', [StudentController::class, 'withdraw'])->name('student.club.withdraw');

    Route::get('/student/event', [StudentController::class, 'showEvent'])->name('student.event.index');
});
// Only Club Admins can access these
Route::middleware(['auth', 'role:club_admin'])->group(function () {
    Route::get('/club', [ClubController::class, 'index'])->name('club_admin.dashboard');
    Route::get('/club/manage', [ClubController::class, 'manageClub'])->name('club_admin.manage');
    Route::get('/club/create', [ClubController::class, 'showForm'])->name('club_admin.showForm');
    Route::post('/club/create', [ClubController::class, 'store'])->name('club_admin.store');
    Route::get('/club/edit/{id}', [ClubController::class, 'edit'])->name('club_admin.edit');
    Route::put('/club/update/{id}', [ClubController::class, 'update'])->name('club_admin.update');
    
    Route::get('/club/manage/announcement/create', [ClubAnnouncementController::class, 'create'])->name('club_admin.announcement.create');
    Route::post('/club/manage/announcement/create', [ClubAnnouncementController::class, 'store'])->name('club_admin.announcement.store');
    Route::get('/club/manage/announcement/edit/{id}', [ClubAnnouncementController::class, 'edit'])->name('club_admin.announcement.edit');
    Route::put('/club/manage/announcement/update/{id}', [ClubAnnouncementController::class, 'update'])->name('club_admin.announcement.update');
    Route::delete('/club/manage/announcement/delete/{id}', [ClubAnnouncementController::class, 'destroy'])->name('club_admin.announcement.destroy');


    Route::get('/club/applicants', [ClubApplicationController::class, 'showApplicant'])->name('club_admin.showApplicant');
    Route::get('/club/{club}/applicants/pending', [ClubApplicationController::class, 'showPendingApplicant'])->name('club_admin.showPendingApplicant');
    Route::get('/club/{club}/applicants/rejected', [ClubApplicationController::class, 'showRejectedApplicant'])->name('club_admin.showRejectedApplicant');
    Route::get('/club/{club}/applicants/closed', [ClubApplicationController::class, 'showClosedApplicants'])->name('club_admin.showClosedApplicants');
    Route::get('/club/{club}/members', [ClubApplicationController::class, 'showMembers'])->name('club_admin.showMembers');

    Route::get('/club/applicants/{id}', [ClubApplicationController::class, 'show'])->name('club_admin.show');
    Route::put('/club/applicants/{id}/remove', [ClubApplicationController::class, 'removeMember'])->name('club_admin.removeMember');
    Route::put('/club/applicants/{id}/approve', [ClubApplicationController::class, 'approvePendingMember'])->name('club_admin.approvePendingMember');
    Route::put('/club/applicants/{id}/reject', [ClubApplicationController::class, 'rejectPendingMember'])->name('club_admin.rejectPendingMember');
    Route::put('/club/applicants/{id}/decline', [ClubApplicationController::class, 'declinedPendingMember'])->name('club_admin.declinedPendingMember');
});

// Only Super Admins can access admin stuff
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/', [SuperAdminController::class, 'index'])->name('super_admin.dashboard');

    Route::get('/students', [SuperAdminController::class, 'showStudents'])->name('super_admin.showStudents');
    Route::get('/students/search', [SuperAdminController::class, 'searchStudents'])->name('super_admin.searchStudents');
    Route::put('/students/{studentsId}', [SuperAdminController::class, 'updateStudent'])->name('super_admin.updateStudent');
    Route::delete('/students/{studentsId}', [SuperAdminController::class, 'destroyStudent'])->name('super_admin.destroyStudent');

    Route::get('/clubs', [SuperAdminController::class, 'showClub'])->name('super_admin.showClubs');
    Route::get('/club/deletion-requests', [SuperAdminController::class, 'showClubDeletionRequests'])->name('super_admin.showClubDeletionRequests');
    Route::get('/club/registered', [SuperAdminController::class, 'showRegisteredClubs'])->name('super_admin.showRegisteredClubs');
    Route::get('/club/registration-requests', [SuperAdminController::class, 'showClubRegistrationClubs'])->name('super_admin.showClubRegistrationRequests');
    Route::put('/club/registration-requests/{id}', [SuperAdminController::class, 'approveClubRegistration'])->name('super_admin.approveClubRegistration');
    Route::get('/club/pending-announcement', [SuperAdminController::class, 'showPendingAnnouncement'])->name('super_admin.showPendingAnnouncement');

    // CRUD for categories
    Route::get('/club/categories', [CategoryController::class, 'index'])->name('super_admin.categories.index');
    Route::post('/club/categories', [CategoryController::class, 'store'])->name('super_admin.categories.store');
    Route::put('/club/categories/{category}', [CategoryController::class, 'update'])->name('super_admin.categories.update');
    Route::delete('/club/categories/{category}', [CategoryController::class, 'destroy'])->name('super_admin.categories.destroy');
});


require __DIR__.'/auth.php';
