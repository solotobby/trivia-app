<?php

namespace App\Livewire\Admin\Category;

use App\Models\GameCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateCategory extends Component
{

    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
    ];

    public function createCategory()
    {
        $this->validate();

        GameCategory::create([
            'name' => $this->name,
            'description' => $this->description,
            'created_by' => Auth::id(),
        ]);

        session()->flash('message', 'Category created successfully!');

        return redirect()->route('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.category.create-category');
    }
}
