<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TypeModelMotor;
use App\Http\Controllers\Controller;

class TypeModelMotorController extends Controller
{
    public function index()
    {
        return view('admin.models.index');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string'],
            'merk_id' => ['required']
        ]);

        $typeModelMotor = TypeModelMotor::create([
            'name' => $name = $request->name,
            'merk_id' => $request->merk_id
        ]);

        $typeModelMotor->slug = Str::slug($name . '_' . $typeModelMotor->uuid);
        $typeModelMotor->save();

        flash()->addSuccess('Data Model Motor Berhasil Disimpan');
        return back();
    }
    public function update(Request $request, TypeModelMotor $typemodelmotor)
    {
        // dd($typemodelmotor);
        $request->validate([
            'name' => ['required', 'string'],
            'merk_id' => ['required'],
        ]);

        $typemodelmotor->update([
            'name' => $request->name,
            'merk_id' => $request->merk_id
        ]);
        flash()->addSuccess('Data Model Motor Berhasil Diubah');
        return back();
    }
    public function destroy(TypeModelMotor $typemodelmotor)
    {
        $typemodelmotor->delete();
        flash()->addSuccess('Data Model Motor Berhasil Dihapus');
        return back();
    }
}
