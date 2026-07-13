<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ComplaintController as UserComplaintController;
use App\Http\Controllers\User\ProfileController as UserProfileController;

// Home/Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Category CRUD
        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
        Route::post('category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        // Subcategory CRUD
        Route::get('subcategory', [SubcategoryController::class, 'index'])->name('subcategory.index');
        Route::post('subcategory', [SubcategoryController::class, 'store'])->name('subcategory.store');
        Route::get('subcategory/{id}/edit', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
        Route::put('subcategory/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
        Route::delete('subcategory/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');

        // State CRUD
        Route::get('state', [StateController::class, 'index'])->name('state.index');
        Route::post('state', [StateController::class, 'store'])->name('state.store');
        Route::get('state/{id}/edit', [StateController::class, 'edit'])->name('state.edit');
        Route::put('state/{id}', [StateController::class, 'update'])->name('state.update');
        Route::delete('state/{id}', [StateController::class, 'destroy'])->name('state.destroy');

        // Users
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/search', [UserController::class, 'search'])->name('users.search');
        Route::post('users/search', [UserController::class, 'search'])->name('users.search.submit');
        Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // Complaints
        Route::get('complaints', [ComplaintController::class, 'index'])->name('complaints.index');
        Route::get('complaints/search', [ComplaintController::class, 'search'])->name('complaints.search');
        Route::post('complaints/search', [ComplaintController::class, 'search'])->name('complaints.search.submit');
        Route::get('complaints/status/{status}', [ComplaintController::class, 'byStatus'])->name('complaints.status');
        Route::get('complaints/user/{userId}', [ComplaintController::class, 'userComplaints'])->name('complaints.user');
        Route::get('complaints/{id}', [ComplaintController::class, 'show'])->name('complaints.show');
        Route::put('complaints/{id}', [ComplaintController::class, 'update'])->name('complaints.update');

        // Reports
        Route::get('reports/users', [ReportController::class, 'userReport'])->name('reports.users');
        Route::post('reports/users', [ReportController::class, 'userReport'])->name('reports.users.submit');
        Route::get('reports/complaints', [ReportController::class, 'complaintReport'])->name('reports.complaints');
        Route::post('reports/complaints', [ReportController::class, 'complaintReport'])->name('reports.complaints.submit');

        // Profile
        Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::get('settings', [AdminProfileController::class, 'showSetting'])->name('settings');
        Route::put('settings', [AdminProfileController::class, 'updatePassword'])->name('settings.update');
    });
});

// User Routes
Route::prefix('user')->name('user.')->group(function () {
    // Auth
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('check-availability', [AuthController::class, 'checkAvailability'])->name('check-availability');

    // Protected routes
    Route::middleware('user.auth')->group(function () {
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

        // Complaints
        Route::get('complaints', [UserComplaintController::class, 'index'])->name('complaints.index');
        Route::get('complaints/create', [UserComplaintController::class, 'create'])->name('complaints.create');
        Route::post('complaints', [UserComplaintController::class, 'store'])->name('complaints.store');
        Route::post('complaints/subcategories', [UserComplaintController::class, 'getSubcategories'])->name('get-subcategories');
        Route::get('complaints/{id}', [UserComplaintController::class, 'show'])->name('complaints.show');

        // Profile
        Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
        Route::put('profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::post('profile/image', [UserProfileController::class, 'updateImage'])->name('profile.image');
        Route::get('settings', [UserProfileController::class, 'showSetting'])->name('settings');
        Route::put('settings', [UserProfileController::class, 'updatePassword'])->name('settings.update');
    });
});
