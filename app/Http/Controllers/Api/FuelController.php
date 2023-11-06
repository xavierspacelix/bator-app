<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fuel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    public function index()
    {
        $fuels = Fuel::all();

        if ($fuels->isEmpty()) {
            return response()->json(['message' => 'No fuels found'], 200);
        }

        return response()->json([
            'message' => 'Berhasil Mendapatkan Data fuels',
            'data' => $fuels
        ], 200);
    }
}
