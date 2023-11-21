<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\Category;
use App\Models\ImageMotor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function view()
    {
        $user = Auth::user();

        if (!$user->seller) {
            return redirect()->route('becomeSeller');
        }

        $categories = Category::get();

        return view('seller.view', [
            'categories' => $categories
        ]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();

        if (!$user->seller) {
            return redirect()->route('becomeSeller');
        }

        $categories = Category::where('slug', $request->category)->firstOrFail();

        if ($request->kondisi === 'baru' || $request->kondisi === 'bekas' || $request->category === $categories) {
            $selectedCategory = Category::where('slug', $request->category)->firstOrFail();
            // dd($selectedCategory->id);
            return view('seller.index', [
                'merks' => Merk::with('typemodelmotors')->get(),
                'fuels' => Fuel::get(),
                'selectedCategory' => $selectedCategory->id
            ]);
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $seller = $user->seller;

        if (!$seller) {
            return redirect()->route('becomeSeller');
        }

        $seller_id = $seller->id;
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

        flash()->addSuccess('Iklan Berhasil Diposting');
        return redirect()->route('detailMotor', $motor->slug);
    }
}
