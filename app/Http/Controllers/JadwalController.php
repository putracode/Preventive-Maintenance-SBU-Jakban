<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pop;
use Illuminate\Http\Request;

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
        ]);

        // if( $request->cluster == ''){
        //     $validasi['cluster'] = '-';
        // }else{
        //     $validasi['cluster'] = $request->cluster;
        // }

        if( $request->pop_id == '-'){
            $validasi['pop_id'] = null;
        }else{
            $validasi['pop_id'] = $request->pop_id;
        }

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
        ]);

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
        ]);

        $validasi['status'] = 'Realisasi';
        Jadwal::where('id',$id)->update($validasi);
        return redirect('/jadwal')->with('success','Data update successfully!');
    }
}
