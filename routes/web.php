<?php

use App\Http\Controllers\ChatGPTIndexController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::middleware('auth')->group(function(){
    Route::get('/profile',[UserProfileController::class,'edit'])->name('profile.edit');
    Route::get('/profile',[UserProfileController::class,'update'])->name('profile.update');
    Route::get('/profile',[UserProfileController::class,'destroy'])->name('profile.destroy');

    Route::get('/chat/{id?}',ChatGPTIndexController::class)->name('chat.show');
});
