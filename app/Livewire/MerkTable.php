<?php

namespace App\Livewire;

use App\Models\Merk;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class MerkTable extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $search = '';
    public function render()
    {
        return view('admin.merks.livewire.merk-table', [
            'merks' => Merk::search($this->search)->latest()->paginate(10),
        ]);
    }
}
