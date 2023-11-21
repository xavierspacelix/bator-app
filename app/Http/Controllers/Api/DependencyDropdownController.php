<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DependencyDropdownController extends Controller
{
    public function provinces()
    {
        return response()->json([
            'province' => Province::pluck('name', 'code')
        ]);
    }
    public function cities(Request $request, Province $province)
    {
        $provinsi = Province::where('code', $request->code)->firstOrFail();
        // dd($provinsi);
        $citiesFiltered = $provinsi->cities->pluck('name', 'code');
        return response()->json($citiesFiltered);
    }

    public function districts(Request $request, City $city)
    {
        $city = City::where('code', $request->code)->firstOrFail();
        $districtsFiltered = $city->districts->pluck('name', 'code');
        return response()->json($districtsFiltered);
    }
    public function villages(Request $request, District $district)
    {
        $district = District::where('code', $request->code)->firstOrFail();
        $villagesFiltered = $district->villages->pluck('name', 'code');
        return response()->json($villagesFiltered);
    }
}
