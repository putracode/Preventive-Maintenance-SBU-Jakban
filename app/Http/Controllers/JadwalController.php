<?php

namespace App\Http\Controllers;

use App\Models\Pop;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('jadwal.index',['jadwal' => Jadwal::latest()->orderBy('plan','asc')->get()]);

        return view('jadwal.index',['jadwal' => jadwal::orderBy('plan','desc')->get()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwal.create',['jadwal' => Jadwal::all(), 'pop' => Pop::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $this->validate($request,[
            'plan' => ['required'],
            'wo_fsm' => ['required'],
            'realisasi' => ['required'],
            'wilayah' => ['required'],
            'area' => ['required'],
            'jenis_pm' => ['required'],
            'kategori_pm' => ['required'],
            'cluster' => ['required'],
            'status' => ['required'],
            'link_sharepoint' => ['required'],
            'pop_id' => ['required'],
            'temuan' => ['required'],
            'improvement' => ['required'],
            'jadwal_id' => ['max:255'],
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

        if( $request->pop_id == '-'){
            $validasi['pop_id'] = null;
        }else{
            $validasi['pop_id'] = $request->pop_id;
        }

        $validasi['jadwal_id'] = $this->createId($validasi['jenis_pm']);
        
        // dd($validasi);

        Jadwal::create($validasi);
        return redirect('/jadwal')->with('success','Data added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('jadwal.edit',['jadwal' => $jadwal,'pop' => Pop::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $validasi = $this->validate($request,[
            'plan' => ['required'],
            'wo_fsm' => ['required'],
            'realisasi' => ['required'],
            'wilayah' => ['required'],
            'area' => ['required'],
            'jenis_pm' => ['required'],
            'kategori_pm' => ['required'],
            'cluster' => ['required'],
            'status' => ['required'],
            'link_sharepoint' => ['required'],
            'pop_id' => ['required'],
            'temuan' => ['required'],
            'improvement' => ['required'],
            'jadwal_id' => ['max:255'],
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
            $validasi['pop_id'] = null;
        }else{
            $validasi['pop_id'] = $request->pop_id;
        }

        if( $request->jenis_pm == 'ISP'){
            $validasi['cluster'] = '-';
        }else{
            $validasi['cluster'] = $request->cluster;
        }

        if($request->jenis_pm){
            $validasi['jadwal_id'] = $this->createId($validasi['jenis_pm']);
        }
        
        jadwal::where('id',$jadwal->id)->update($validasi);
        return redirect('/jadwal')->with('success','Data update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        jadwal::destroy($jadwal->id);
        return redirect('/jadwal')->with('success','Data succesfully deleted!');
    }

    public function realisasi(Request $request, $id){
        $validasi = $this->validate($request,[
            'realisasi' => ['required'],
            'link_sharepoint' => ['required'],
            'improvement' => ['required'],
            'temuan' => ['required'],
        ]);
        
        $validasi['status'] = 'Realisasi';

        Jadwal::where('id',$id)->update($validasi);
        return redirect('/jadwal')->with('success','Data update successfully!');
    }

    public function createId($jenisPM){
        $last = Jadwal::where('jenis_pm',$jenisPM)->orderBy('jadwal_id','desc')->first();
        
        // dd($jenisPM);
        if($jenisPM == 'OSP'){

            if(!$last or date('Y', strtotime($last->created_at)) != date('Y')) {
                return 'OSP/' . date('Y') . '/0001';
            }
    
            if ($last) {
                $part = explode('/', $last->jadwal_id);
                $result = (int)$part[2] + 1;
                $result = sprintf("%04d", $result);
                return $part[0] . '/' . $part[1] . '/' . $result;
            }

        }else if($jenisPM == 'ISP'){
            
            if(!$last or date('Y', strtotime($last->created_at)) != date('Y')) {
                return 'ISP/' . date('Y') . '/0001';
            }
    
            if ($last) {
                $part = explode('/', $last->jadwal_id);
                $result = (int)$part[2] + 1;
                $result = sprintf("%04d", $result);
                return $part[0] . '/' . $part[1] . '/' . $result;
            } 
        }

       
    }
}
