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

        $this->dispatchBrowserEvent('show-edit-category-modal');
    }

    public function updateCategory()
    {
        $this->validate();

        $category = GameCategory::findOrFail($this->categoryId);
        $category->name = $this->name;
        $category->description = $this->description;
        $category->save();

        $this->dispatchBrowserEvent('close-edit-category-modal');
        $this->reset(['name', 'description', 'categoryId']);
        $this->loadCategories();

        session()->flash('message', 'Category updated successfully!');
    }

    public function confirmDelete($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function deleteCategory()
    {
        $category = GameCategory::findOrFail($this->categoryId);
        $category->delete();

        $this->dispatchBrowserEvent('close-delete-confirmation-modal');
        $this->loadCategories();

        session()->flash('message', 'Category deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.category.list-categories');
    }
}
