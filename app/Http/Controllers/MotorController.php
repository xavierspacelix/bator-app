<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use App\Http\Resources\MotorResource;

class MotorController extends Controller
{
    public function index()
    {
        //
    }

    public function show(Motor $motor)
    {
        // $motor = Motor::with('seller', 'category', 'merk', 'fuel', 'image', 'type_model_motor');
        // dd($motor);
        return view('motors.single-page', [
            'motor' => $motor
        ]);
    }
}
