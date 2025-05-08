<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\GameCategory;

class ListCategories extends Component
{
    public $categories, $categoryId, $name, $description;

    protected $listeners = ['refresh' => '$refresh'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
    ];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = GameCategory::with('user')->get();
    }

    public function openEditModal($categoryId)
    {
        $category = GameCategory::findOrFail($categoryId);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function updateCategory()
    {
        $this->validate();

        $category = GameCategory::findOrFail($this->categoryId);
        $category->name = $this->name;
        $category->description = $this->description;
        $category->save();

        session()->flash('message', 'Category updated successfully!');
        return redirect()->route('admin.categories.index');
    }

    public function confirmDelete($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function deleteCategory()
    {
        $category = GameCategory::findOrFail($this->categoryId);
        $category->delete();


        session()->flash('message', 'Category deleted successfully!');
        return redirect()->route('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.category.list-categories');
    }
}
