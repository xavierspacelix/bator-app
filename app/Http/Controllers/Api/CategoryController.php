<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No categories found'], 200);
        }

        return response()->json([
            'message' => 'Berhasil Mendapatkan Data Category',
            'data' => $categories
        ], 200);
    }

    // public function category(Category $category)
    // {

    // }
}
