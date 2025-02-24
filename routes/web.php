<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Employer Routes
Route::get('/employer/register', [EmployerController::class, 'showRegistrationForm']);
Route::post('/employer/register', [EmployerController::class, 'register']);


// Employee Routes
Route::get('/employee/register', [EmployeeController::class, 'showRegistrationForm']);
Route::post('/employee/register', [EmployeeController::class, 'register']);
Route::post('/employee/login', [EmployeeController::class, 'login']);


//Comon Routes
Route::post('/sendOtp', [ProfileController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verifyOtp', [ProfileController::class, 'verifyOtp'])->name('verifyOtp');
Route::post('/reset_password', [ProfileController::class, 'resetPassword'])->name('reset_password');




Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('employee.dashboard');
})->middleware(['auth', 'employee'])->name('employee.dashboard');









// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/manage/employers', [AdminController::class, 'manageEmployers']);
    Route::get('/admin/manage/employees', [AdminController::class, 'manageEmployees']);
});
// Admin routes (must be authenticated and authorized as admin)
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/manage/employers', [AdminController::class, 'manageEmployers'])->name('admin.manage.employers');
    Route::get('/approve/employer/{id}', [AdminController::class, 'approveEmployer'])->name('admin.approve.employer');
    Route::get('/reject/employer/{id}', [AdminController::class, 'rejectEmployer'])->name('admin.reject.employer');

    Route::get('/employer/dashboard', [AdminController::class, 'manageEmployees'])->name('employer.dashboard');
    Route::get('/manage/employees', [AdminController::class, 'manageEmployees'])->name('admin.manage.employees');
    Route::get('/approve/employee/{id}', [AdminController::class, 'approveEmployee'])->name('admin.approve.employee');
    Route::get('/deactivate/employer/{id}', [AdminController::class, 'deactivateEmployer'])->name('admin.deactivate.employer');
    Route::get('/deactivate/employee/{id}', [AdminController::class, 'deactivateEmployee'])->name('admin.deactivate.employee');
});
// require __DIR__.'/auth.php';
