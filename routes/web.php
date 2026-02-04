<?php
use App\Http\Controllers\HomeController;            // CONTROLLER DA HOME
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');        // PÁGINA PRINCIPAL

