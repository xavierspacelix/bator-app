<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModelMotor;
use App\Models\Models;

class ModelController extends Controller
{
    public function index()
    {
        return view('admin.models.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'merk_id' => ['required'],
        ]);

        $modelMotor = ModelMotor::create([
            'name' => $name = $request->name,
            'merk_id' => $request->merk_id
        ]);

        $modelMotor->slug = Str::slug($name . '_' . $modelMotor->uuid);
        $modelMotor->save();

        flash()->addSuccess('Model Baru Telah Ditambahkan');
        return back();
    }

    public function destroy(ModelMotor $modelMotor)
    {
        // $model = ModelMotor::where('slug', $modelMotor->slug)->firstOrFail();
        dd($modelMotor);
    }
}
