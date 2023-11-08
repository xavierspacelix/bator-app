<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $tahun = date('Y');
        // $bulan = date('m');
        // for ($i = 1; $i <= $bulan; $i++) {
        //     $totalUser = User::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->count();
        //     $dataBulan[] = Carbon::create()->month($i)->format('F');
        //     $dataTotalUser[] = $totalUser;
        // }
        // $lastMonthTotal = User::whereYear('created_at', $tahun)->whereMonth('created_at', $bulan - 1)->count();
        // $percentageChange = (($dataTotalUser[$bulan - 1] - $lastMonthTotal) / $lastMonthTotal) * 100;
        // $data['dataBulan'] = $dataBulan;
        // $data['dataTotalUser'] = $dataTotalUser;
        // $data['persentase'] = $percentageChange;
        // $data['allUser'] = User::all()->count();
        return view('admin.dashboard');
    }
}
