<?php

namespace App\Livewire;

use App\Models\Merk;
use App\Models\TypeModelMotor;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ModelsTable extends Component
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
        return view('admin.models.livewire.models-table', [
            'motorModel' => TypeModelMotor::search($this->search)->latest()->paginate(10),
            'merks' => Merk::get()
        ]);
    }
}
