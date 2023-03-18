<?php

namespace App\Http\Controllers;

use App\Models\Pop;
use App\Models\Jadwal;
use App\Models\Temuan;
use Illuminate\Http\Request;
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
            'realisasi' => ['max:255'],
            'wilayah' => ['required'],
            'area' => ['required'],
            'jenis_pm' => ['required'],
            'kategori_pm' => ['required'],
            'cluster' => ['required'],
            'status' => ['max:255'],
            'link_sharepoint' => ['max:255'],
            'pop_id' => ['required'],
            'temuan' => ['max:255'],
            'improvement' => ['max:255'],
            'jadwal_id' => ['max:255'],
            'hostname' => ['max:255'],
            'id_fat' => ['max:255'],
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

        if($validasi['hostname'] == null){
            $validasi['hostname'] = '-';
        }else{
            $validasi['hostname'] = $request->hostname;
        }

        if($validasi['id_fat'] == null){
            $validasi['id_fat'] = '-';
        }else{
            $validasi['id_fat'] = $request->id_fat;
        }
        
        $validasi['realisasi'] = '-';
        $validasi['improvement'] = '-';
        $validasi['kategori_improvement'] = '-';
        $validasi['temuan'] = '-';
        $validasi['link_sharepoint'] = '-';
        $validasi['status'] = 'Plan';

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

        // $validasi['realisasi'] = '-';
        // $validasi['improvement'] = '-';
        // $validasi['temuan'] = '-';
        // $validasi['link_sharepoint'] = '-';
        // $validasi['kategori_improvement'] = '-';
        // $validasi['status'] = 'Plan';

        // dd($validasi);
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
            'kategori_improvement' => ['required'],
            'temuan' => ['required'],
        ]);

        if($validasi['kategori_improvement'] == '-'){
            $validasi['kategori_improvement'] = '-';
        }else{
            $validasi['kategori_improvement'] = $request->kategori_improvement;
        }

        $validasi['status'] = 'Realisasi';
        Jadwal::where('id',$id)->update($validasi);
        if($request->temuan == "Ada"){

    
            $jadwal = Jadwal::Where('id',$id)->first();
            $temuan = [
                'jadwal_id' => $jadwal->jadwal_id,
                'pop_id' => $jadwal->pop_id,
                'plan' => $jadwal->plan,
                'wo_fsm' => $jadwal->wo_fsm,
                'realisasi' => $jadwal->realisasi,
                'wilayah' => $jadwal->wilayah,
                'area' => $jadwal->area,
                'jenis_pm' => $jadwal->jenis_pm,
                'kategori_pm' => $jadwal->kategori_pm,
                'hostname' => $jadwal->hostname,
                'id_fat' => $jadwal->id_fat,
                'cluster' => $jadwal->cluster,
                'status' => 'Check',
                'segmen' => $jadwal->segmen,
                'temuan' => $jadwal->temuan,
                'improvement' => $jadwal->improvement,
                'kategori_improvement' =>$jadwal->kategori_improvement,
                'link_sharepoint' => $jadwal->link_sharepoint,
            ];
    
            Temuan::create($temuan);
        }

        return redirect('/jadwal')->with('success','Data update successfully!');
    }

    public function createId($jenisPM){
        // if($jenisPM == 'ISP' || 'ISP CPE'){
        //     $jenisPM = 'ISP';
        // }elseif($jenisPM == 'OSP'){
        //     $jenisPM = 'OSP';
        // }
        // $jenis = explode(' ',$jenisPM);
        // $pm = $jenis[0];

        // $last = Jadwal::where('jenis_pm','LIKE','%'.$pm.'%')->orderBy('jadwal_id','desc')->first();
        
        // dd($last);
                if($jenisPM == 'OSP'){
            $last = Jadwal::where('jenis_pm','OSP')->orderBy('jadwal_id','desc')->first();
            if(!$last or date('Y', strtotime($last->created_at)) != date('Y')) {
                return 'OSP/' . date('Y') . '/0001';
            }
    
            if ($last) {
                $part = explode('/', $last->jadwal_id);
                $result = (int)$part[2] + 1;
                $result = sprintf("%04d", $result);
                return $part[0] . '/' . $part[1] . '/' . $result;
            }

        }else if($jenisPM == 'ISP' || $jenisPM == 'CPE PLN'){
            $last = Jadwal::where('jenis_pm','ISP')->orWhere('jenis_pm','CPE PLN')->orderBy('jadwal_id','desc')->first();
            
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
