<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/about', 'about');

// New HIASWANA pages
Route::view('/membership', 'membership');
Route::view('/events', 'events');
Route::view('/team', 'team');
Route::view('/publications', 'publications');
Route::view('/contact', 'contact');

// Legacy route kept temporarily for compatibility
Route::view('/contact-us', 'contact');