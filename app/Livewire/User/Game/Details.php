<?php

namespace App\Livewire\User\Game;

use App\Models\Game;
use Livewire\Component;

class Details extends Component
{
    public $game;

    /**
     * Mount the component.
     *
     * @param Game|int $game The game model or ID
     * @return void
     */
    public function mount($game)
    {
        // Check if $game is an ID (integer or string) or a Game model
        if (is_object($game) && $game instanceof Game) {
            $this->game = $game;
        } else {
            $this->loadGame($game);
        }
    }

    /**
     * Load the game from database.
     *
     * @param int $gameId The game ID
     * @return void
     */
    public function loadGame($gameId)
    {
        $this->game = Game::with([
            'category',
            'creator',
            'players',
            'questions'
        ])->findOrFail($gameId);
    }

    public function render()
    {
        return view('livewire.user.game.details');
    }
}
