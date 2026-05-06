<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\MembershipController;
use App\Models\Event;
use App\Models\TeamMember;
use App\Models\Publication;

// ── Public pages ─────────────────────────────────────────────────────────────
Route::view('/', 'index');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/contact-us', 'contact'); // legacy

Route::get('/events', function () {
    $events = Event::published()->latest('event_date')->get()->groupBy('category');
    return view('events', compact('events'));
});

Route::get('/team', function () {
    $members = TeamMember::orderBy('sort_order')->get();
    return view('team', compact('members'));
});

Route::get('/publications', function () {
    $publications = Publication::published()->latest()->get();
    return view('publications', compact('publications'));
});

Route::get('/membership', function () {
    return view('membership');
});

Route::post('/membership', [MembershipController::class, 'store'])->name('membership.store');

// ── Admin Auth ────────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('events', EventController::class)->except(['show']);
        Route::resource('team', TeamMemberController::class)->except(['show']);
        Route::resource('publications', PublicationController::class)->except(['show']);

        Route::get('members', [MemberController::class, 'index'])->name('members.index');
        Route::get('members/{member}', [MemberController::class, 'show'])->name('members.show');
        Route::post('members/{member}/approve', [MemberController::class, 'approve'])->name('members.approve');
        Route::post('members/{member}/reject', [MemberController::class, 'reject'])->name('members.reject');
        Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

        // Settings
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('settings/{group}', [SettingsController::class, 'group'])->name('settings.group');
        Route::put('settings/{group}', [SettingsController::class, 'update'])->name('settings.update');

        // Settings
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('settings/{group}', [SettingsController::class, 'group'])->name('settings.group');
        Route::put('settings/{group}', [SettingsController::class, 'update'])->name('settings.update');
    });
});