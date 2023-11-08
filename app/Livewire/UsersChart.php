<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class UsersChart extends Component
{
    public $chartData;
    protected $listeners = ['ubahData' => 'changeData'];
    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $data['data'][] = User::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->count();
            $data['labels'][] = Carbon::create()->month($i)->format('F');
        }
        $this->chartData = json_encode($data);
    }
    public function render()
    {

        return view('admin.livewire.users-chart');
    }

    #[On('berhasilUpdate')]
    public function changeData()
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $data['data'][] = User::whereYear('created_at', $tahun)->whereMonth('created_at', $i)->count();
            $data['labels'][] = Carbon::create()->month($i)->format('F');
        }
        $this->chartData = json_encode($data);
        $this->dispatch('berhasilUpdate', $this->chartData);
    }
}
