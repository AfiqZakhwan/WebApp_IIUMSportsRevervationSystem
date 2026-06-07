<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminVenueController;
use App\Http\Controllers\Admin\AdminEquipmentController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});

// ─── Student Routes ───────────────────────────────────────────────────────────
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard');
    Route::get('/bookings', [BookingController::class, 'myBookings'])->name('bookings.index');

    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

    Route::get('/booking/{id}/rental', [RentalController::class, 'create'])->name('rental.create');
    Route::post('/booking/{id}/rental', [RentalController::class, 'store'])->name('rental.store');

    Route::get('/booking/{id}/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/booking/{id}/payment', [PaymentController::class, 'store'])->name('payment.store');
});

// ─── Admin Routes ─────────────────────────────────────────────────────────────
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin',
])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Venues
    Route::get('/venues', [AdminVenueController::class, 'index'])->name('venues.index');
    Route::get('/venues/create', [AdminVenueController::class, 'create'])->name('venues.create');
    Route::post('/venues', [AdminVenueController::class, 'store'])->name('venues.store');
    Route::get('/venues/{venue}/edit', [AdminVenueController::class, 'edit'])->name('venues.edit');
    Route::put('/venues/{venue}', [AdminVenueController::class, 'update'])->name('venues.update');
    Route::delete('/venues/{venue}', [AdminVenueController::class, 'destroy'])->name('venues.destroy');
    Route::post('/venues/{venue}/toggle', [AdminVenueController::class, 'toggleAvailability'])->name('venues.toggle');

    // Equipment
    Route::get('/equipment', [AdminEquipmentController::class, 'index'])->name('equipment.index');
    Route::get('/equipment/create', [AdminEquipmentController::class, 'create'])->name('equipment.create');
    Route::post('/equipment', [AdminEquipmentController::class, 'store'])->name('equipment.store');
    Route::get('/equipment/{equipment}/edit', [AdminEquipmentController::class, 'edit'])->name('equipment.edit');
    Route::put('/equipment/{equipment}', [AdminEquipmentController::class, 'update'])->name('equipment.update');
    Route::delete('/equipment/{equipment}', [AdminEquipmentController::class, 'destroy'])->name('equipment.destroy');

    // Bookings
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::delete('/bookings/{id}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');

    // Users
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/toggle-role', [AdminUserController::class, 'toggleRole'])->name('users.toggle-role');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});
