<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return Inertia::render('Index');
});

Route::get('/menu',function() {
    return Inertia::render('Menu');
});

Route::get('/about',function() {
    return Inertia::render('About');
});

Route::get('/book',function() {
    return Inertia::render('Book');
});

Route::post('/make-reservation',[ReservationController::class,'store'])->name('reservation.store');