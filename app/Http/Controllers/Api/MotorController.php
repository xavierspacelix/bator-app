<?php

namespace App\Http\Controllers\Api;

use App\Models\Merk;
use App\Models\Motor;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MotorResource;
use App\Models\ImageMotor;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Motor::query()
            ->with('seller', 'category', 'merk', 'fuel')
            ->get();

        if ($motors->isEmpty()) {
            return response()->json([
                'message' => 'Data Motor Masih Kosong'
            ], 404);
        }

        return response()->json([
            'message' => 'Berhasil Mendapatkan Data Motor',
            'motors' => MotorResource::collection($motors)
        ], 200);
    }

    public function show(Motor $motor)
    {
        if (!$motor) {
            return response()->json(['message' => 'Motor not found'], 404);
        }

        return response()->json([
            'message' => 'Success',
            'data' => new MotorResource($motor)
        ], 200);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = auth()->user();
        $seller = $user->seller;

        if (!$seller) {
            return response()->json([
                'status' => 'redirecting',
                'message' => 'User Bukan Seller'
            ]);
        }

        $seller_id = $seller->id;
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'merk_id' => 'required|exists:merks,id',
            'fuel_id' => 'required|exists:fuels,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'kondisi' => 'required|in:baru,bekas',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'jarak_tempuh' => 'required|integer',
            'kapasitas_tank' => 'required|string',
            'type_model_motor_id' => 'required|exists:type_model_motors,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk setiap image
        ]);

        $motor = Motor::create([
            'category_id' => $request->category_id,
            'merk_id' => $request->merk_id,
            'fuel_id' => $request->fuel_id,
            'name' => $name = $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'kondisi' => $request->kondisi,
            'tahun' => $request->tahun,
            'jarak_tempuh' => $request->jarak_tempuh,
            'kapasitas_tank' => $request->kapasitas_tank,
            'seller_id' => $seller_id,
            'type_model_motor_id' => $request->type_model_motor_id
        ]);



        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

                $imagePath = $image->storeAs('motor_images', $imageName);

                $motorImage = new ImageMotor(['image_path' => 'motor_images/' . $imageName]);
                $motor->image()->save($motorImage);
                $images[] = $motorImage;
            }
        }
        $motor->slug = Str::slug($name . '_' . $motor->uuid);
        $motor->save();
        return response()->json([
            'message' => 'Motor berhasil disimpan',
            'data' => new MotorResource($motor)
        ], 201);
    }

    public function update(Motor $motor, Request $request)
    {
        $user = auth()->user();
        $seller = $user->seller;

        if (!$seller || $motor->seller_id !== $seller->id) {
            return response()->json(['message' => 'Akses tidak diizinkan'], 403);
        }

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'merk_id' => 'required|exists:merks,id',
            'fuel_id' => 'required|exists:fuels,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'kondisi' => 'required|in:baru,bekas',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'jarak_tempuh' => 'required|integer',
            'kapasitas_tank' => 'required|string',
        ]);

        $motor->update([
            'category_id' => $request->category_id,
            'merk_id' => $request->merk_id,
            'fuel_id' => $request->fuel_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'kondisi' => $request->kondisi,
            'tahun' => $request->tahun,
            'jarak_tempuh' => $request->jarak_tempuh,
            'kapasitas_tank' => $request->kapasitas_tank,
        ]);

        return response()->json([
            'message' => 'Motor berhasil diperbarui',
            'data' => new MotorResource($motor)
        ], 200);
    }

    public function destroy(Motor $motor)
    {
        $user = auth()->user();
        $seller = $user->seller;

        if (!$seller || $motor->seller_id !== $seller->id) {
            return response()->json(['message' => 'Akses tidak diizinkan'], 403);
        }

        // Hapus gambar-gambar terkait dari storage
        $motor->image()->each(function ($image) {
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        });
        $motor->delete();

        return response()->json(['message' => 'Motor berhasil dihapus'], 200);
    }
}
