<?php

namespace App\Livewire\Admin\Game;

use App\Models\Game;
use App\Models\GameCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ListGames extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $category = '';
    public $isPremium = '';

    public function updatingCategory() { $this->resetPage(); }
    public function updatingIsPremium() { $this->resetPage(); }

    public function render()
    {
        $games = Game::with(['creator', 'category'])
            ->when($this->category, fn($q) => $q->where('game_category_id', $this->category))
            ->when($this->isPremium !== '', fn($q) => $q->where('is_premium', $this->isPremium))
            ->latest()
            ->paginate($this->perPage);

        $categories = GameCategory::all();


        return view('livewire.admin.game.list-games', compact('games', 'categories'));
    }
}
