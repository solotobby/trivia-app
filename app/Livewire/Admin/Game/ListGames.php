<?php

namespace App\Livewire\Admin\Game;

use App\Models\Game;
use Livewire\Component;

class ListGames extends Component
{
    public $games;

    public function mount()
    {
        $this->loadGames();
    }

    public function loadGames()
    {
        $this->games = Game::with('user')->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.game.list-games');
    }
}
