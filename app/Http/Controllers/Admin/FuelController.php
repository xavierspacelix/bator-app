<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fuel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.fuels.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Fuel::create([
            'name' => $request->name,
        ]);
        flash()->addSuccess('Data Jenis Bahan Bakar Berhasil Disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Fuel $fuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fuel $fuel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fuel $fuel)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $fuel->update([
            'name' => $request->name,
        ]);
        flash()->addSuccess('Data Jenis Bahan Bakar Berhasil Disimpan');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fuel $fuel)
    {
        $fuel->delete();
        flash()->addSuccess('Data Jenis Bahas Bakar Berhasil Dihapus');
        return back();
    }
}
