<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\MembershipListController;
use App\Http\Controllers\MembershipController;
use App\Models\Event;
use App\Models\TeamMember;
use App\Models\Committee;
use App\Models\Publication;
use Illuminate\Database\QueryException;

// ── Public pages ─────────────────────────────────────────────────────────────
Route::get('/', function () {
    try {
        $heroSlides = \App\Models\Slide::active()->where('location', 'hero')->orderBy('sort_order')->get();
        $aboutSlides = \App\Models\Slide::active()->where('location', 'about')->orderBy('sort_order')->get();
    } catch (\Exception $e) {
        $heroSlides = \App\Models\Slide::where('location', 'hero')->orderBy('sort_order')->get();
        $aboutSlides = \App\Models\Slide::where('location', 'about')->orderBy('sort_order')->get();
    }
    return view('index', compact('heroSlides', 'aboutSlides'));
});
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/contact-us', 'contact'); // legacy
Route::view('/newsletter', 'newsletter')->name('newsletter');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms-of-use', 'terms')->name('terms');

Route::get('/events', function () {
    try {
        $events = Event::published()->latest('event_date')->get()->groupBy('category');
    } catch (QueryException $e) {
        $events = collect();
    }

    return view('events', compact('events'));
});

Route::get('/team', function () {
    try {
        $members    = TeamMember::where('is_active', true)->orderBy('sort_order')->get();
        $committees = Committee::active()->with('members')->orderBy('sort_order')->get();
    } catch (QueryException $e) {
        $members    = collect();
        $committees = collect();
    }

    return view('team', compact('members', 'committees'));
});

Route::get('/publications', function () {
    $publications = Publication::published()->latest()->get();
    return view('publications', compact('publications'));
});

Route::get('/membership', function () {
    return view('membership');
});

Route::post('/membership', [MembershipController::class, 'store'])
    ->middleware('throttle:membership-submit')
    ->name('membership.store');

// ── Admin Auth ────────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])
        ->middleware('throttle:admin-login')
        ->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('events', EventController::class)->except(['show']);
        Route::post('events/{event}/toggle', [EventController::class, 'toggle'])->name('events.toggle');
        Route::resource('team', TeamMemberController::class)->except(['show']);
        Route::post('team/{team}/toggle', [TeamMemberController::class, 'toggle'])->name('team.toggle');
        Route::resource('publications', PublicationController::class)->except(['show']);
        Route::post('publications/{publication}/toggle', [PublicationController::class, 'toggle'])->name('publications.toggle');
        Route::get('slides/{slide}', [SlideController::class, 'show'])->name('slides.show');
        Route::resource('slides', SlideController::class)->except(['show']);
        Route::post('slides/{slide}/toggle', [SlideController::class, 'toggle'])->name('slides.toggle');

        // Committees
        Route::resource('committees', CommitteeController::class);
        Route::get('committees/{committee}/members/create',  [CommitteeController::class, 'memberCreate'])->name('committees.members.create');
        Route::post('committees/{committee}/members',        [CommitteeController::class, 'memberStore'])->name('committees.members.store');
        Route::get('committees/{committee}/members/{member}/edit',   [CommitteeController::class, 'memberEdit'])->name('committees.members.edit');
        Route::put('committees/{committee}/members/{member}',        [CommitteeController::class, 'memberUpdate'])->name('committees.members.update');
        Route::delete('committees/{committee}/members/{member}',     [CommitteeController::class, 'memberDestroy'])->name('committees.members.destroy');

        Route::get('membershiplist', [MembershipListController::class, 'index'])->name('membershiplist.index');

        Route::get('members', [MemberController::class, 'index'])->name('members.index');
        Route::get('members/export', [MemberController::class, 'export'])->name('members.export');
        Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
        Route::post('members', [MemberController::class, 'store'])->name('members.store');
        Route::get('members/{member}', [MemberController::class, 'show'])->name('members.show');
        Route::get('members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
        Route::put('members/{member}', [MemberController::class, 'update'])->name('members.update');
        Route::post('members/{member}/approve', [MemberController::class, 'approve'])->name('members.approve');
        Route::post('members/{member}/reject', [MemberController::class, 'reject'])->name('members.reject');
        Route::post('members/{member}/verify-payment', [MemberController::class, 'verifyPayment'])->name('members.verify-payment');
        Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

        // Settings
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('settings/{group}', [SettingsController::class, 'group'])->name('settings.group');
        Route::put('settings/{group}', [SettingsController::class, 'update'])->name('settings.update');
    });
});

Route::fallback(function () {
    return redirect('/');
});