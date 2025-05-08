<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Category\ListCategories;
use App\Livewire\Admin\Category\CreateCategory;
use App\Livewire\Admin\User\ListUsers;
use App\Livewire\Admin\Game\ListGames;
use App\Livewire\Admin\Question\ListQuestions;
use App\Livewire\Admin\Question\CreateQuestion;
use App\Livewire\Admin\Settings;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::middleware(['auth'])->group(function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', AdminDashboard::class)->name('admin');
      // Categories
      Route::get('/categories', ListCategories::class)->name('admin.categories.index');
      Route::get('/categories/create', CreateCategory::class)->name('admin.categories.create');

      // Users
      Route::get('/users', ListUsers::class)->name('admin.users.index');

      // Games
      Route::get('/games', ListGames::class)->name('admin.games.index');

      // Questions
      Route::get('/questions', ListQuestions::class)->name('admin.questions.index');
      Route::get('/questions/create', CreateQuestion::class)->name('admin.questions.create');

      // Settings
      Route::get('/settings', Settings::class)->name('admin.settings');
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
