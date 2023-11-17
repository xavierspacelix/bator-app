<?php

namespace App\Livewire;

use App\Models\Motor;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;

class IklanUserTable extends Component
{
    #[Url(history: true)]
    public $search = '';

    public function render()
    {
        $user = Auth::user();
        return view('livewire.iklan-user-table', [
            'motors' => Motor::search($this->search)->where('seller_id', $user->seller->id)->get()
        ]);
    }
}
