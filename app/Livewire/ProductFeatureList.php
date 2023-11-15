<?php

namespace App\Livewire;

use App\Models\Motor;
use Livewire\Component;
use App\Http\Resources\MotorResource;

class ProductFeatureList extends Component
{
    public function render()
    {
        $allMotors = Motor::query()
            ->with('seller', 'category', 'merk', 'fuel')
            ->get();
        return view('livewire.product-feature-list', [
            'motors' => MotorResource::collection($allMotors)
        ]);
    }
}
