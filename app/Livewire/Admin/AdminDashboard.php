<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\GameCategory;

class AdminDashboard extends Component
{

    public $totalUsers;
    public $totalCategories;

    public function mount()
    {
        $this->totalUsers = User::count();
        $this->totalCategories = GameCategory::count();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
