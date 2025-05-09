<?php
namespace App\Livewire\User\Game;

use App\Models\Game;
use App\Models\GameCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Create extends Component
{
    public $name, $number_of_players, $number_of_questions, $is_premium = 1, $amount;
    public $game_category_id;
    public $categories = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'game_category_id' => 'required|exists:game_categories,id',
        'number_of_players' => 'required|integer|min:1',
        'number_of_questions' => 'required|integer|min:1',
        'is_premium' => 'boolean',
        'amount' => 'nullable|numeric|min:0',
    ];

    public function mount()
    {
        $this->categories = GameCategory::all();
    }

    public function updatedIsPremium($value)
    {
        if (!$value) {
            $this->amount = null;
        }
    }

    public function create()
    {
        $this->validate();

        Game::create([
            'name' => $this->name,
            'game_category_id' => $this->game_category_id,
            'number_of_players' => $this->number_of_players,
            'number_of_questions' => $this->number_of_questions,
            'is_premium' => $this->is_premium,
            'amount' => $this->is_premium ? $this->amount : null,
            'created_by' => Auth::id(),
            'status' => 'active',
        ]);

        session()->flash('message', 'Game created successfully!');
        return redirect()->route('user.games.index');
    }

    public function render()
    {
        return view('livewire.user.game.create');
    }
}
