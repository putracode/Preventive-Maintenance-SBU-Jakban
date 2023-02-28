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
            // 'nam_cpe_pln' => ['required'],
            'cluster' => ['required'],
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
}
