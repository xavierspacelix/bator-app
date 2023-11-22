<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeModelMotor;
use Illuminate\Http\Request;

class TypeModelMotorController extends Controller
{
    public function index()
    {
        $typemodelmotor = TypeModelMotor::get();

        if ($typemodelmotor->isEmpty()) {
            return response()->json(['message' => 'No merks found'], 200);
        }

        return response()->json([
            'message' => 'Berhasil Mendapatkan Data Merk',
            'models' => $typemodelmotor
        ]);
    }
}
