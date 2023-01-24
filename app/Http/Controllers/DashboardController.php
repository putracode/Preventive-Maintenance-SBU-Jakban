<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pop;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard',['jadwal' => Jadwal::where('status','Plan')->orWhere('status','On Progress')->get()]);
    }

    public function filter(Request $request){
        if (request()->dari || request()->sampai) {
            $sampai = explode('-', request('sampai'));
            $sampai = $sampai[0]. '-' . $sampai[1] . '-' . intval($sampai[2]);
            $jadwal = Jadwal::whereBetween('plan',[request('dari'), $sampai])->where('status','Plan')->latest()->get();
        } else {
            $jadwal = Jadwal::where('status','Plan')->latest()->get();
        }

        return view('dashboard',['jadwal' => $jadwal]);
    }
}
