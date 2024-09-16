<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});
Route::resource('tickets', TicketController::class);
Route::resource('comments', CommentController::class);
Route::resource('notifications', NotificationController::class);



Route::get('/dashboard', DashboardController::class);
