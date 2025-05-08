<?php

namespace App\Livewire\User;

use App\Models\Game;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboard extends Component
{

    public $totalGamesPlayed;
    public $wallet;
    public $activeGames;
    public $pendingTransactions;
    public $totalTransactions;
    public $totalWinnings;

    public function mount()
    {
        // Fetch the necessary data
        $this->totalGamesPlayed = Game::where('created_by', Auth::id())->count();
       // $this->wallet = Wallet::where('user_id', Auth::id())->get();
        $this->wallet = 0;
        $this->activeGames = Game::where('created_by', Auth::id())->where('status', 'active')->count();
        // $this->pendingTransactions = Transaction::where('user_id', auth()->id())->where('status', 'pending')->count();
        $this->pendingTransactions = 0;
        $this->totalTransactions = 0;
        $this->totalWinnings = 0;
       // $this->totalWinnings = Game::where('created_by', Auth::id())->where('status', 'completed')->sum('winnings');
    }
    public function render()
    {
        return view('livewire.user.user-dashboard');
    }
}
