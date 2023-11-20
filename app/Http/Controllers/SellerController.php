<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->seller) {
            return redirect()->route('becomeSeller');
        }

        return 'Jual Motor Anda';
    }
}
