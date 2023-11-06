<?php

namespace App\Http\Controllers\Api;

use App\Models\Merk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerkController extends Controller
{
    public function index()
    {
        $merks = Merk::get();

        if ($merks->isEmpty()) {
            return response()->json(['message' => 'No merks found'], 200);
        }

        return response()->json([
            'message' => 'Berhasil Mendapatkan Data Merk',
            'merks' => $merks
        ]);
    }
}
