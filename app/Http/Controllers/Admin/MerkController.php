<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.merks.index');
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

        Merk::create([
            'name' => $request->name,
        ]);
        flash()->addSuccess('Data Merk Berhasil Disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Merk $merk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merk $merk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merk $merk)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $merk->update([
            'name' => $request->name,
        ]);
        flash()->addSuccess('Data Merk Berhasil Diubah');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merk $merk)
    {
        $merk->delete();
        flash()->addSuccess('Data Merk Berhasil Dihapus');
        return back();
    }
}
