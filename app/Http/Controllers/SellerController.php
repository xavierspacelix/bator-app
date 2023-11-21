<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class SellerController extends Controller
{
    public function view()
    {
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

            return view('seller.index');
        } else {
            abort(404);
        }
    }
}
