<?php

namespace App\Livewire\User\Game;

use App\Models\Game;
use Livewire\Component;

class CreateQuestions extends Component
{
    public $game;
    public string $text = '';
    public array $options = ['', '', '', ''];
    public int $correctOption = 0;

    protected $rules = [
        'text' => 'required|string|max:255',
        'options' => 'required|array|min:4',
        'options.*' => 'required|string|max:255',
        'correctOption' => 'required|integer|between:0,3',
    ];

    public function mount($game)
    {
        $this->game = Game::all();
    }

    public function create()
    {
        $this->validate();

        $question = $this->game->questions()->create([
            'text' => $this->text,
        ]);

        foreach ($this->options as $index => $optionText) {
            $question->options()->create([
                'text' => $optionText,
                'is_correct' => $index === $this->correctOption,
            ]);
        }

        session()->flash('message', 'Question added successfully.');
        return redirect()->route('user.games.details', $this->game->id);
    }

    public function render()
    {
        return view('livewire.user.game.create-questions');
    }
}
