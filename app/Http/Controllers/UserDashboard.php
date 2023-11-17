<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Motor;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {



        // $motors = Motor::query()->with('seller', 'category', 'merk', 'fuel')->where('seller_id', Auth::user()->id);
        $userLoggedIn = auth()->user();
        if ($userLoggedIn->isSeller() && $userLoggedIn->seller) {
            $sellerProducts = $userLoggedIn->seller->motors;
            return view('dashboard', ['motors' => $sellerProducts]);
        } else {
            return view('dashboard');
        }
    }
}
