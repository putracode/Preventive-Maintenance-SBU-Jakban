<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pop;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // dd(jadwal::all());
        $totalData = Jadwal::all()->count(); 
        $totalReal = Jadwal::where('status','Realisasi')->count(); 
        $totalOsp = Jadwal::where('jenis_pm','OSP')->count(); 
        $totalIsp = Jadwal::where('jenis_pm','ISP')->count(); 
        $totalCPEPLN = Jadwal::where('jenis_pm','CPE PLN')->count(); 

        $plan1 = Jadwal::where('status','Plan')->where('area','Bekasi Kabupaten')->count();
        $realisasi1 = Jadwal::where('status','Realisasi')->where('area','Bekasi Kabupaten')->count();

        $plan2 = Jadwal::where('status','Plan')->where('area','Bekasi Kota')->count();
        $realisasi2 = Jadwal::where('status','Realisasi')->where('area','Bekasi Kota')->count();

        $plan3 = Jadwal::where('status','Plan')->where('area','Bogor Kabupaten')->count();
        $realisasi3 = Jadwal::where('status','Realisasi')->where('area','Bogor Kabupaten')->count();

        $plan4 = Jadwal::where('status','Plan')->where('area','Bogor Kota')->count();
        $realisasi4 = Jadwal::where('status','Realisasi')->where('area','Bogor Kota')->count();

        $plan5 = Jadwal::where('status','Plan')->where('area','Depok Kota')->count();
        $realisasi5 = Jadwal::where('status','Realisasi')->where('area','Depok Kota')->count();

        $plan6 = Jadwal::where('status','Plan')->where('area','Jakarta Barat')->count();
        $realisasi6 = Jadwal::where('status','Realisasi')->where('area','Jakarta Barat')->count();

        $plan7 = Jadwal::where('status','Plan')->where('area','Jakarta Pusat')->count();
        $realisasi7 = Jadwal::where('status','Realisasi')->where('area','Jakarta Pusat')->count();

        $plan8 = Jadwal::where('status','Plan')->where('area','Jakarta Selatan')->count();
        $realisasi8 = Jadwal::where('status','Realisasi')->where('area','Jakarta Selatan')->count();

        $plan9 = Jadwal::where('status','Plan')->where('area','Jakarta Timur')->count();
        $realisasi9 = Jadwal::where('status','Realisasi')->where('area','Jakarta Timur')->count();

        $plan10 = Jadwal::where('status','Plan')->where('area','Jakarta Utara')->count();
        $realisasi10 = Jadwal::where('status','Realisasi')->where('area','Jakarta Utara')->count();

        $plan11 = Jadwal::where('status','Plan')->where('area','Tangerang Kabupaten')->count();
        $realisasi11 = Jadwal::where('status','Realisasi')->where('area','Tangerang Kabupaten')->count();

        $plan12 = Jadwal::where('status','Plan')->where('area','Tangerang Kota')->count();
        $realisasi12 = Jadwal::where('status','Realisasi')->where('area','Tangerang Kota')->count();

        $plan13 = Jadwal::where('status','Plan')->where('area','Tangerang Selatan')->count();
        $realisasi13 = Jadwal::where('status','Realisasi')->where('area','Tangerang Selatan')->count();

        $plan14 = Jadwal::where('status','Plan')->where('area','Pandeglang Kabupaten')->count();
        $realisasi14 = Jadwal::where('status','Realisasi')->where('area','Pandeglang Kabupaten')->count();

        $plan15 = Jadwal::where('status','Plan')->where('area','Serang Kabupaten')->count();
        $realisasi15 = Jadwal::where('status','Realisasi')->where('area','Serang Kabupaten')->count();

        $plan16 = Jadwal::where('status','Plan')->where('area','Serang Kota')->count();
        $realisasi16 = Jadwal::where('status','Realisasi')->where('area','Serang Kota')->count();

        $plan17 = Jadwal::where('status','Plan')->where('area','Cilegon Kota')->count();
        $realisasi17 = Jadwal::where('status','Realisasi')->where('area','Cilegon Kota')->count();

        $plan18 = Jadwal::where('status','Plan')->where('area','Lebak Kabupaten')->count();
        $realisasi18 = Jadwal::where('status','Realisasi')->where('area','Lebak Kabupaten')->count();




        return view('dashboard',['jadwal' => Jadwal::where('status','Plan')->get(), 'plan1' => $plan1, 'plan2' => $plan2, 'plan3' => $plan3, 'plan4' => $plan4, 'plan5' => $plan5, 'plan6' => $plan6, 'plan7' => $plan7, 'plan8' => $plan8, 'plan9' => $plan9, 'plan10' => $plan10, 'plan11' => $plan11, 'plan12' => $plan12, 'plan13' => $plan13, 'plan14' => $plan14, 'plan15' => $plan15, 'plan16' => $plan16, 'plan17' => $plan17, 'plan18' => $plan18, 'realisasi1' => $realisasi1, 'realisasi2' => $realisasi2, 'realisasi3' => $realisasi3, 'realisasi4' => $realisasi4, 'realisasi5' => $realisasi5, 'realisasi6' => $realisasi6, 'realisasi7' => $realisasi7, 'realisasi8' => $realisasi8, 'realisasi9' => $realisasi9, 'realisasi10' => $realisasi10, 'realisasi11' => $realisasi11, 'realisasi12' => $realisasi12, 'realisasi13' => $realisasi13, 'realisasi14' => $realisasi14, 'realisasi15' => $realisasi15, 'realisasi16' => $realisasi16, 'realisasi17' => $realisasi17, 'realisasi18' => $realisasi18, 'totalReal' => $totalReal, 'totalData' => $totalData, 'totalOsp' => $totalOsp, 'totalIsp' => $totalIsp, 'totalCPEPLN' => $totalCPEPLN]);
    }

    public function filter(Request $request){
        if (request()->from || request()->to) {
            $to = explode('-', request('to'));
            $to = $to[0]. '-' . $to[1] . '-' . intval($to[2]);
            // dd($to);
            $jadwal = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->latest()->get();
            $totalData = Jadwal::whereBetween('plan',[request('from'), $to])->count(); 
            $totalReal = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->count(); 
            $totalOsp = Jadwal::whereBetween('plan',[request('from'), $to])->where('jenis_pm','OSP')->count(); 
            $totalIsp = Jadwal::whereBetween('plan',[request('from'), $to])->where('jenis_pm','ISP')->count(); 
            $totalCPEPLN = Jadwal::whereBetween('plan',[request('from'), $to])->where('jenis_pm','CPE PLN')->count(); 

            $plan1 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Bekasi Kabupaten')->count();
            $realisasi1 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Bekasi Kabupaten')->count();

            $plan2 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Bekasi Kota')->count();
            $realisasi2 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Bekasi Kota')->count();

            $plan3 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Bogor Kabupaten')->count();
            $realisasi3 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Bogor Kabupaten')->count();

            $plan4 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Bogor Kota')->count();
            $realisasi4 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Bogor Kota')->count();

            $plan5 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Depok Kota')->count();
            $realisasi5 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Depok Kota')->count();

            $plan6 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Jakarta Barat')->count();
            $realisasi6 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Jakarta Barat')->count();

            $plan7 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Jakarta Pusat')->count();
            $realisasi7 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Jakarta Pusat')->count();

            $plan8 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Jakarta Selatan')->count();
            $realisasi8 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Jakarta Selatan')->count();

            $plan9 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Jakarta Timur')->count();
            $realisasi9 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Jakarta Timur')->count();

            $plan10 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Jakarta Utara')->count();
            $realisasi10 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Jakarta Utara')->count();

            $plan11 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Tangerang Kabupaten')->count();
            $realisasi11 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Tangerang Kabupaten')->count();

            $plan12 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Tangerang Kota')->count();
            $realisasi12 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Tangerang Kota')->count();

            $plan13 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Tangerang Selatan')->count();
            $realisasi13 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Tangerang Selatan')->count();

            $plan14 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Pandeglang Kabupaten')->count();
            $realisasi14 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Pandeglang Kabupaten')->count();

            $plan15 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Serang Kabupaten')->count();
            $realisasi15 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Serang Kabupaten')->count();

            $plan16 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Serang Kota')->count();
            $realisasi16 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Serang Kota')->count();

            $plan17 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Cilegon Kota')->count();
            $realisasi17 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Cilegon Kota')->count();

            $plan18 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Plan')->where('area','Lebak Kabupaten')->count();
            $realisasi18 = Jadwal::whereBetween('plan',[request('from'), $to])->where('status','Realisasi')->where('area','Lebak Kabupaten')->count();
        } else {
            $totalData = Jadwal::all()->count(); 
            $totalReal = Jadwal::where('status','Realisasi')->count(); 

            $plan1 = Jadwal::where('status','Plan')->where('area','Bekasi Kabupaten')->count();
            $realisasi1 = Jadwal::where('status','Realisasi')->where('area','Bekasi Kabupaten')->count();

            $plan2 = Jadwal::where('status','Plan')->where('area','Bekasi Kota')->count();
            $realisasi2 = Jadwal::where('status','Realisasi')->where('area','Bekasi Kota')->count();

            $plan3 = Jadwal::where('status','Plan')->where('area','Bogor Kabupaten')->count();
            $realisasi3 = Jadwal::where('status','Realisasi')->where('area','Bogor Kabupaten')->count();

            $plan4 = Jadwal::where('status','Plan')->where('area','Bogor Kota')->count();
            $realisasi4 = Jadwal::where('status','Realisasi')->where('area','Bogor Kota')->count();

            $plan5 = Jadwal::where('status','Plan')->where('area','Depok Kota')->count();
            $realisasi5 = Jadwal::where('status','Realisasi')->where('area','Depok Kota')->count();

            $plan6 = Jadwal::where('status','Plan')->where('area','Jakarta Barat')->count();
            $realisasi6 = Jadwal::where('status','Realisasi')->where('area','Jakarta Barat')->count();

            $plan7 = Jadwal::where('status','Plan')->where('area','Jakarta Pusat')->count();
            $realisasi7 = Jadwal::where('status','Realisasi')->where('area','Jakarta Pusat')->count();

            $plan8 = Jadwal::where('status','Plan')->where('area','Jakarta Selatan')->count();
            $realisasi8 = Jadwal::where('status','Realisasi')->where('area','Jakarta Selatan')->count();

            $plan9 = Jadwal::where('status','Plan')->where('area','Jakarta Timur')->count();
            $realisasi9 = Jadwal::where('status','Realisasi')->where('area','Jakarta Timur')->count();

            $plan10 = Jadwal::where('status','Plan')->where('area','Jakarta Utara')->count();
            $realisasi10 = Jadwal::where('status','Realisasi')->where('area','Jakarta Utara')->count();

            $plan11 = Jadwal::where('status','Plan')->where('area','Tangerang Kabupaten')->count();
            $realisasi11 = Jadwal::where('status','Realisasi')->where('area','Tangerang Kabupaten')->count();

            $plan12 = Jadwal::where('status','Plan')->where('area','Tangerang Kota')->count();
            $realisasi12 = Jadwal::where('status','Realisasi')->where('area','Tangerang Kota')->count();

            $plan13 = Jadwal::where('status','Plan')->where('area','Tangerang Selatan')->count();
            $realisasi13 = Jadwal::where('status','Realisasi')->where('area','Tangerang Selatan')->count();

            $plan14 = Jadwal::where('status','Plan')->where('area','Pandeglang Kabupaten')->count();
            $realisasi14 = Jadwal::where('status','Realisasi')->where('area','Pandeglang Kabupaten')->count();

            $plan15 = Jadwal::where('status','Plan')->where('area','Serang Kabupaten')->count();
            $realisasi15 = Jadwal::where('status','Realisasi')->where('area','Serang Kabupaten')->count();

            $plan16 = Jadwal::where('status','Plan')->where('area','Serang Kota')->count();
            $realisasi16 = Jadwal::where('status','Realisasi')->where('area','Serang Kota')->count();

            $plan17 = Jadwal::where('status','Plan')->where('area','Cilegon Kota')->count();
            $realisasi17 = Jadwal::where('status','Realisasi')->where('area','Cilegon Kota')->count();

            $plan18 = Jadwal::where('status','Plan')->where('area','Lebak Kabupaten')->count();
            $realisasi18 = Jadwal::where('status','Realisasi')->where('area','Lebak Kabupaten')->count();

            $jadwal = Jadwal::where('status','Plan')->latest()->get();
        }

        return view('dashboard',['jadwal' => $jadwal, 'plan1' => $plan1, 'plan2' => $plan2, 'plan3' => $plan3, 'plan4' => $plan4, 'plan5' => $plan5, 'plan6' => $plan6, 'plan7' => $plan7, 'plan8' => $plan8, 'plan9' => $plan9, 'plan10' => $plan10, 'plan11' => $plan11, 'plan12' => $plan12, 'plan13' => $plan13, 'plan14' => $plan14, 'plan15' => $plan15, 'plan16' => $plan16, 'plan17' => $plan17, 'plan18' => $plan18, 'realisasi1' => $realisasi1, 'realisasi2' => $realisasi2, 'realisasi3' => $realisasi3, 'realisasi4' => $realisasi4, 'realisasi5' => $realisasi5, 'realisasi6' => $realisasi6, 'realisasi7' => $realisasi7, 'realisasi8' => $realisasi8, 'realisasi9' => $realisasi9, 'realisasi10' => $realisasi10, 'realisasi11' => $realisasi11, 'realisasi12' => $realisasi12, 'realisasi13' => $realisasi13, 'realisasi14' => $realisasi14, 'realisasi15' => $realisasi15, 'realisasi16' => $realisasi16, 'realisasi17' => $realisasi17, 'realisasi18' => $realisasi18, 'totalReal' => $totalReal, 'totalData' => $totalData , 'totalOsp' => $totalOsp, 'totalIsp' => $totalIsp, 'totalCPEPLN' => $totalCPEPLN]);
    }
}
