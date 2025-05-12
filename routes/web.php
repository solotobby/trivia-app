<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\User\Game\CreateQuestions;
use App\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Category\ListCategories;
use App\Livewire\Admin\Category\CreateCategory;
use App\Livewire\Admin\User\ListUsers;
use App\Livewire\Admin\Game\ListGames;
use App\Livewire\Admin\Question\ListQuestions;
use App\Livewire\Admin\Settings;
use App\Livewire\User\Game\AllGames;
use App\Livewire\User\Game\Create as GameCreate;
use App\Livewire\User\Game\MyGames;
use App\Livewire\User\Game\Play;
use App\Livewire\User\Game\Join;
use App\Livewire\User\Game\Details;
use App\Livewire\User\Games\CreateQuestion;
use App\Livewire\User\Wallet\Deposit;
use App\Livewire\User\Wallet\Withdraw;
use App\Livewire\User\Wallet\Transactions;
use App\Livewire\User\Profile\View as ProfileView;
use App\Livewire\User\Profile\Edit as ProfileEdit;
use App\Livewire\User\Security\ChangePassword;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::middleware(['auth'])->group(function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');
});

Route::middleware(['auth', 'role:regular'])->prefix('user')->name('user.')->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('user.dashboard');
    // })->name('dashboard');

   Route::get('/dashboard', UserDashboard::class)->name('dashboard');

    // Game Routes
    Route::get('/games', AllGames::class)->name('games.index');
    Route::get('/games/create', GameCreate::class)->name('games.create');
    Route::get('/games/my', MyGames::class)->name('games.my');
    Route::get('/games/{game}/play', Play::class)->name('games.play');
    Route::get('/games/{game}/join', Join::class)->name('games.join');
    Route::get('/games/{game}', Details::class)->name('games.details');
    Route::get('/games/{game}/questions/create', CreateQuestions::class)->name('games.questions.create');
   // Route::get('/games/{game}/questions/create', CreateQuestion::class)->name('games.questions.create');

    // Wallet Routes
    Route::get('/wallet/deposit', Deposit::class)->name('wallet.deposit');
    Route::get('/wallet/withdraw', Withdraw::class)->name('wallet.withdraw');
    Route::get('/wallet/transactions', Transactions::class)->name('wallet.transactions');

    // Profile & Security Routes
    // Route::get('/profile', ProfileView::class)->name('settings');
    Route::get('/profile', ProfileView::class)->name('profile.view');
    Route::get('/profile/edit', ProfileEdit::class)->name('profile.edit');
    Route::get('/profile/change-password', ChangePassword::class)->name('profile.password');

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
     // Route::get('/questions/create', CreateQuestion::class)->name('admin.questions.create');

      // Settings
      Route::get('/settings', Settings::class)->name('admin.settings');
});

// Route::middleware(['auth', 'role:regular'])->group(function () {
//     Route::get('user/dashboard', UserDashboard::class)->name('regular');

// });


// Route::middleware(['auth'])->group(function () {

//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });

require __DIR__.'/auth.php';
