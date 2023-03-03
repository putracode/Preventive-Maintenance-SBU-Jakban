<?php

namespace App\Http\Controllers;

use App\Models\Pop;
use App\Models\Jadwal;
use App\Models\Improvement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Temuan;

class TemuanController extends Controller
{
    public function index(){
        return view('temuan.index',['temuan' => Temuan::all()]);
    }

    public function improve($id){
        return view('temuan.improve',['temuan' => temuan::find($id), 'pop' => Pop::all()]);
    }

    public function edit($id){
        return view('temuan.edit',['temuan' => temuan::find($id), 'pop' => Pop::all()]);
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request,[
            'jadwal_id' => ['required'],
            'plan' => ['required'],
            'wilayah' => ['required'],
            'area' => ['required'],
            'dasar_improvement' => ['required'],
            'jenis_improvement' => ['required'],
            'kategori_improvement' => ['required'],
            'pop_id' => ['required'],
        ]);

        if($validasi['pop_id'] == '-'){
            $validasi['pop_id'] = null;
        }else{
            $validasi['pop_id'] = $request->pop_id;
        }

        $validasi['status'] = "Plan Improve";
        $validasi['realisasi'] = "-";
        $validasi['link_sharepoint'] = "-";

        $status = ['status' => $validasi['status']];
        Temuan::where('id',$request->id)->update($status);
        Improvement::create($validasi);
        return redirect('/temuan')->with('success','Data added successfully!');
    }

    public function update(Request $request,$id)
    {
        $validasi = $this->validate($request,[
            'plan' => ['required'],
            'wo_fsm' => ['required'],
            'wilayah' => ['required'],
            'area' => ['required'],
            'jenis_pm' => ['required'],
            'kategori_pm' => ['required'],
            'cluster' => ['required'],
            'pop_id' => ['required'],
            'hostname' => ['required'],
            'id_fat' => ['required'],
        ]);

        if($request->kategori_pm == 'Uji Batre'){
            $validasi['segmen'] = 'Non Retail'; 
        }elseif($request->kategori_pm == 'OLT'){
            $validasi['segmen'] = 'Retail'; 
        }elseif($request->kategori_pm == 'AC (Air Conditioner)'){
            $validasi['segmen'] = 'Non Retail'; 
        }elseif($request->kategori_pm == 'AC - Environment'){
            $validasi['segmen'] = 'Non Retail'; 
        }elseif($request->kategori_pm == 'Environment'){
            $validasi['segmen'] = 'Non Retail'; 
        }elseif($request->kategori_pm == 'AC - Environment - Uji Batre'){
            $validasi['segmen'] = 'Non Retail'; 
        }elseif($request->kategori_pm == 'IKR - Kabel DW'){
            $validasi['segmen'] = 'Retail'; 
        }elseif($request->kategori_pm == 'IKR - Kabel DW dan FAT'){
            $validasi['segmen'] = 'Retail'; 
        }elseif($request->kategori_pm == 'IKR - FAT'){
            $validasi['segmen'] = 'Retail'; 
        }elseif($request->kategori_pm == 'Jalur Feeder'){
            $validasi['segmen'] = 'Retail'; 
        }elseif($request->kategori_pm == 'Jalur Kabel TR/TM'){
            $validasi['segmen'] = 'Non Retail'; 
        }
        
        if( $request->jenis_pm == 'OSP'){
            if($validasi['kategori_pm'] != 'IKR - FAT'){
                $validasi['id_fat'] = '-';
            }
            $validasi['pop_id'] = null;
        }else{
            $validasi['pop_id'] = $request->pop_id;
        }

        if( $request->jenis_pm == 'ISP'){
            if($validasi['kategori_pm'] != 'OLT'){
                $validasi['hostname'] = '-';
            }
            $validasi['cluster'] = '-';
        }else{
            $validasi['cluster'] = $request->cluster;
        }

        if($validasi['hostname'] == '-'){
            $validasi['hostname'] = '-';
        }else{
            $validasi['hostname'] = $request->hostname;
        }

        if($validasi['id_fat'] == '-'){
            $validasi['id_fat'] = '-';
        }else{
            $validasi['id_fat'] = $request->id_fat;
        }

        $validasi['realisasi'] = '-';
        $validasi['improvement'] = '-';
        $validasi['temuan'] = '-';
        $validasi['link_sharepoint'] = '-';
        $validasi['kategori_improvement'] = '-';
        // $validasi['status'] = 'Check';

        // dd($validasi);
        Temuan::where('id',$id)->update($validasi);
        return redirect('/temuan')->with('success','Data update successfully!');
    }
}
