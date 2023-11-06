<?php

namespace App\Livewire;

use App\Models\Fuel;
use Livewire\Component;
use Livewire\Attributes\Url;

class FuelTable extends Component
{

    #[Url(history: true)]
    public $search = '';

    public function render()
    {
        return view('admin.fuels.livewire.fuel-table', [
            'fuels' =>  Fuel::search($this->search)->latest()->paginate(10)
        ]);
    }
}
