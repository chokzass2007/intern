<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ControllerProvince;
use App\Http\Controllers\EvalutionController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    if (isset(Auth::user()->id)) {
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $profileData = User::find($id); //ค้าหาข้อมูล user id ที่ได้เก็บไว้ในตัวแปรแล้วไปเรียกใช้ข้อมูลที่ต้องการแสดง

        return view('' . $profileData->role . '.' . $profileData->role . '_dashboard', $profileData);
    } else {
        return view('sau_login');
    }
});
//ประเมิณบริษัท
Route::get('/evalution', [EvalutionController::class, 'index']);

Route::post('/evalution/inserts', [EvalutionController::class, 'insertData'])->name('evalution.insert');
// select idStudent
Route::post('/evalution/idstudent', [EvalutionController::class, 'idstudent']);

Route::get('/dashboard', function () {
    return view('sau_login');
})->middleware(['auth', 'verified'])->name('dashboard');

// Register
Route::post('/registerr', [TeacherController::class, 'store'])->name('sau_register');
// Select Province
Route::post('/student/company/amphoe', [ControllerProvince::class, 'amphoe']);
Route::post('/student/company/tambon', [ControllerProvince::class, 'tambon']);
Route::post('/student/company/zipcode', [ControllerProvince::class, 'zipcode']);
// Select Province Update
Route::post('/student/company_detail/amphoe', [ControllerProvince::class, 'amphoe']);
Route::post('/student/company_detail/tambon', [ControllerProvince::class, 'tambon']);
Route::post('/student/company_detail/zipcode', [ControllerProvince::class, 'zipcode']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Teacher Middleware Group
Route::middleware(['auth', 'role:teacher'])->group(function () {
    // ->name('ใช้ชื่อแทนชื่อเร้าที่เรียก') แทน เมธอด
    Route::get('/teacher', [TeacherController::class, 'TeacherDashboard'])->name('teacher_dashboard');
    // View Report Student
    Route::get('/teacher/data/api/view-detail/{com_id}/{user_id}',  [TeacherController::class, 'TeacherViewReportStudent'])->name('teacher.view.report');
    // Logout
    Route::get('/teacher/logout', [TeacherController::class, 'TeacherLogout'])->name('teacher.logout');
    //เปลี่ยนพาสเวิร์ค
    Route::get('/teacher/change_password', [TeacherController::class, 'TeacherChangePassword'])->name('teacher.change.password');
    Route::post('/teacher/update_password', [TeacherController::class, 'TeacherUpdatePassword'])->name('teacher.update.password');
    // แก้ไขโปรไฟล์
    Route::get('/teacher/change_profile', [TeacherController::class, 'TeacherChangeProfile'])->name('teacher.change.profile');
    Route::post('/teacher/update_profile', [TeacherController::class, 'TeacherUpdateProfile'])->name('teacher.update.profile');
    // Report Teacher
    Route::get('/teacher/report',  [TeacherController::class, 'TeacherReport'])->name('teacher.report');
    // Select Year intern Teacher
    Route::post('/teacher/data',  [TeacherController::class, 'TeacherSelect'])->name('teacher.select');
    // API
    Route::get('/teacher/data/api/{id}/{ic}',  [TeacherController::class, 'TeacherApiApprove'])->name('teacher.api');
    Route::put('/teacher/data/cancel/',  [TeacherController::class, 'TeacherApiCancel'])->name('teacher.cancel');
    Route::get('/teacher/data/api/success/{id}/{ic}',  [TeacherController::class, 'TeacherApisuccess']);
    // Approve Intern Teacher
    Route::put('/teacher/data/approve',  [TeacherController::class, 'TeacherApprove'])->name('teacher.approve');
    // PDF Teacher
    Route::get('/teacher/pdf/{id}',  [PDFController::class, 'generatePDF'])->name('pdf.no1');
    Route::get('/teacher/pdf-no2/{id}',  [PDFController::class, 'generatePDFNo2'])->name('pdf.no2');
    Route::get('/teacher/pdf-no3/{id}',  [PDFController::class, 'generatePDFNo3'])->name('pdf.no3');
    // Detail Company
    Route::get('/teacher/details/{id}',  [TeacherController::class, 'TeacherDetailCompany'])->name('teacher.detail.company');

}); // End Group Teacher Middleware



Route::middleware(['auth', 'role:agent'])->group(function () {

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent_dashboard');
}); // End Group Agent Middleware




Route::middleware(['auth', 'role:student'])->group(function () {

    // API Report
    Route::get('/student/report/{id}',  [StudentController::class, 'StudentViewReport']);
    // Report Student
    Route::get('/student/report',  [StudentController::class, 'StudentReport'])->name('student.report');
    Route::post('/student/report_store',  [StudentController::class, 'StudentReportStore'])->name('student.report.store');
    Route::put('/student/report/report_update',  [StudentController::class, 'StudentReportUpdate'])->name('student.report.update');
    // Update Company
    Route::get('/student/company_detail_/{id}',  [StudentController::class, 'StudentCompanyDetailId'])->name('student.company.update');
    Route::put('/student/company_detail_update/{id}',  [StudentController::class, 'StudentCompanyUpadate'])->name('student.company.update.update');
    // Company
    Route::get('/student/company_detail',  [StudentController::class, 'StudentCompanyDetail'])->name('student_company_detail');
    Route::get('/student/company', [StudentController::class, 'StudentCompany'])->name('student_company');
    Route::post('/student/company_store', [StudentController::class, 'StudentCompanyStore'])->name('student.store.company');
    Route::patch('/student/company_cancel', [StudentController::class, 'StudentCancelCompany'])->name('student.cancel.company');
    // Logout
    Route::get('/student/logout', [StudentController::class, 'StudentLogout'])->name('student.logout');
    //เปลี่ยนพาสเวิร์ค
    Route::get('/student/change_password', [StudentController::class, 'StudentChangePassword'])->name('student.change.password');
    Route::post('/student/update_password', [StudentController::class, 'StudentUpdatePassword'])->name('student.update.password');
    // แก้ไขโปรไฟล์
    Route::get('/student/change_profile', [StudentController::class, 'StudentChangeProfile'])->name('student.change.profile');
    Route::post('/student/update_profile', [StudentController::class, 'StudentUpdateProfile'])->name('student.update.profile');
}); // End Group Student Middleware
