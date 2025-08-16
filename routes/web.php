<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CategoryController,
    DashboardController,
    ItemController,
    ItemLogController,
    LoanController,
    LocationController,
    MhsController,
    ProfileController,
    RepairController,
    UserController
};

// ====================
// Public Routes
// ====================
Route::get('/', function () {
    return view('welcome');
});

// Tes
// Route::resource('mahasiswa', MhsController::class);
Route::get('/mahasiswa', [MhsController::class, 'index'])->name('mhs.index');
Route::get('/mahasiswa/create', [MhsController::class, 'create'])->name('mhs.create');
Route::post('/mahasiswa/store', [MhsController::class, 'store'])->name('mhs.store');
// endtes
// ====================
// Dashboard (auth + verified)
// ====================
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// ====================
// Profile Routes (auth)
// ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/item-logs', [ItemLogController::class, 'index'])
        ->name('item_logs.index');
});

// ====================
// Admin Only Routes
// ====================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('items', ItemController::class);
    Route::resource('users', UserController::class);

    // Item Logs
    Route::get('items/{item}/logs', function (\App\Models\Item $item) {
        $logs = $item->logs()->with('user')->latest()->get();
        return view('items.logs', compact('item', 'logs'));
    })->name('items.logs');
});

// ====================
// Admin & Teknisi Routes
// ====================
Route::middleware(['auth', 'role:admin,teknisi'])->group(function () {
    // Route::resource('repairs', RepairController::class);
});

Route::middleware(['auth', 'role:admin,teknisi,staff'])->group(function () {
    Route::resource('loans', LoanController::class);
    Route::resource('repairs', RepairController::class);
});

// ====================
// Auth Routes
// ====================
require __DIR__.'/auth.php';
