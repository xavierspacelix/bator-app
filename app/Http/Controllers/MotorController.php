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
        return view('motors.single-page', [
            'motor' => $motor
        ]);
    }
}
