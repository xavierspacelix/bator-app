<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('admin.category.livewire.category-table', [
            'categories' => Category::search($this->search)->latest()->paginate(10),
        ]);
    }
}
