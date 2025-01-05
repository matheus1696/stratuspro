<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect()->route('login'); });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
