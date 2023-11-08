<?php

namespace App\Livewire;

use App\Models\Motor;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Http\Resources\MotorResource;

class MotorTable extends Component
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
        $motors = Motor::search($this->search)->latest()->paginate(10);
        return view('admin.motors.livewire.motor-table', [
            'motors' => MotorResource::collection($motors)
        ]);
    }
}
