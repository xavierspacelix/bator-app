<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{

    use WithPagination;


    #[Url(history: true)]

    public $search = '';

    #[Url(history: true)]
    public $admin = '';


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('admin.users.livewire.users-table', [
            'users' => User::search($this->search)
                ->when($this->admin === 'admin', function ($query) {
                    $query->whereHas('adminUser');
                })
                ->when($this->admin === 'user', function ($query) {
                    $query->whereDoesntHave('adminUser');
                })
                ->latest()
                ->paginate(10)
        ]);
    }
}
