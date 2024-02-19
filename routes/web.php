<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;   
use App\Http\Controllers\StudentController; 
use App\Http\Controllers\ProfessorController; 
use App\Http\Controllers\StaffController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\RFIDController; 
use App\Http\Controllers\FirebaseController; 
use App\Http\Controllers\LoginController; 
// use App\Http\Middleware\EnsureTokenIsValid;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'submit_login'])->name('submit-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/get-data', [RFIDController::class, 'getData'])->name('get-data');
Route::get('/set-card-id', [RFIDController::class, 'setCardID'])->name('set-card-id');
Route::get('/latest-log', [RFIDController::class, 'latestLog'])->name('latest-log');
Route::post('/latest-log', [RFIDController::class, 'getLatestLog'])->name('get-latest-log');

Route::group(['middleware'=>['token_valid']], function() {
    
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-home');
    Route::post('/admin/dashboard', [AdminController::class, 'add_announcemnet'])->name('admin-add-announcement');
    Route::get('/admin/requests', [AdminController::class, 'requests'])->name('admin-requests');
    Route::get('/admin/requests/accept-request', [AdminController::class, 'acceptRequest'])->name('admin-accept-request');
    Route::get('/admin/requests/reject-request', [AdminController::class, 'rejectRequest'])->name('admin-reject-request');
    Route::get('/admin/manage-requests', [AdminController::class, 'manageRequests'])->name('admin-manage-requests');
    Route::post('/admin/manage-requests', [AdminController::class, 'addIDtoStudent'])->name('admin-manage-requests-add-id');
    Route::get('/admin/users/faculty', [AdminController::class, 'users_faculty'])->name('admin-users-faculty');
    Route::get('/admin/users/student', [AdminController::class, 'users_student'])->name('admin-users-student');
    Route::get('/admin/users/disable-card', [AdminController::class, 'disable_card'])->name('admin-users-disable');
    Route::get('/admin/users/enable-card', [AdminController::class, 'enable_card'])->name('admin-users-enable');
    Route::get('/admin/logs/room', [AdminController::class, 'logs_room'])->name('admin-logs-room');
    Route::get('/admin/logs/location', [AdminController::class, 'logs_location'])->name('admin-logs-location');
    Route::get('/admin/set-readers-scanners', [FirebaseController::class, 'setMCUs'])->name('admin-set-mcu');
    Route::get('/admin/blocks', [AdminController::class, 'blocks'])->name('admin-blocks');
    Route::post('/admin/blocks', [AdminController::class, 'uploadBlock'])->name('admin-upload-block');
    Route::post('/admin/set-readers-scanners', [FirebaseController::class, 'change'])->name('admin-submit-mcu');

    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student-home');
    Route::get('/student/signup', [StudentController::class, 'signup'])->name('student-signup');
    Route::post('/student/submit-signup', [StudentController::class, 'submit_signup'])->name('student-submit-signup');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student-profile');
    Route::get('/student/logs', [StudentController::class, 'logs'])->name('student-logs');

    Route::get('/faculty/dashboard', [ProfessorController::class, 'index'])->name('professor-home');
    Route::get('/faculty/requests', [ProfessorController::class, 'request'])->name('professor-request');
    Route::get('/faculty/requests/accept-request', [ProfessorController::class, 'acceptRequest'])->name('prof-accept-request');
    Route::get('/faculty/requestss/reject-request', [ProfessorController::class, 'rejectRequest'])->name('prof-reject-request');
    Route::get('/faculty/class', [ProfessorController::class, 'class'])->name('professor-class');
    Route::post('/faculty/class', [ProfessorController::class, 'add_class'])->name('professor-add-class');
    Route::get('/faculty/class/add-students', [ProfessorController::class, 'add_students_to_class'])->name('professor-add-students');
    Route::get('/faculty/student-class', [ProfessorController::class, 'student_class'])->name('professor-student');
    Route::post('/faculty/student-class', [ProfessorController::class, 'send_message'])->name('professor-send-message');
    Route::get('/faculty/history', [ProfessorController::class, 'view_history'])->name('professor-history');
    Route::get('/faculty/attendance', [ProfessorController::class, 'attendance'])->name('professor-attendance');
    Route::post('/faculty/attendance', [ProfessorController::class, 'view_absents'])->name('professor-absents');
    Route::get('/faculty/profile', [ProfessorController::class, 'profile'])->name('professor-profile');
    Route::get('/faculty/signup', [ProfessorController::class, 'signup'])->name('professor-signup');
    Route::post('/faculty/signup', [ProfessorController::class, 'submit_signup'])->name('professor-submit-signup');

    Route::get('/staff/dashboard', [StaffController::class, 'index'])->name('staff-home');
    Route::post('/staff/dashboard', [StaffController::class, 'add_announcemnet'])->name('staff-add-announcement');
    Route::get('/staff/profile', [StaffController::class, 'profile'])->name('staff-profile');
    Route::get('/staff/logs', [StaffController::class, 'logs'])->name('staff-logs');
});
