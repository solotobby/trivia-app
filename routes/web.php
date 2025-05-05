<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::middleware(['auth'])->group(function () { 
        Route::get('home', [HomeController::class, 'home'])->name('home');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('home/admin', AdminDashboard::class)->name('admin');
    
});

Route::middleware(['auth', 'role:regular'])->group(function () {
    Route::get('home/user', UserDashboard::class)->name('regular');
    
});


// Route::middleware(['auth'])->group(function () {

//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });

require __DIR__.'/auth.php';
