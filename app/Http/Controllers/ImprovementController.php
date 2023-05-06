<?php

namespace App\Http\Controllers;

use App\Models\Improvement;
use App\Models\Jadwal;
use App\Models\Pop;
use App\Models\Temuan;
use Illuminate\Http\Request;

class ImprovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('improvement.index',['improvement' => Improvement::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('improvement.create',['improvement' => Improvement::all(), 'pop' => Pop::all(), 'jadwal' => Jadwal::where('temuan','Ada')->get()]);
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
            'wilayah' => ['required'],
            'area' => ['required'],
            'dasar_improvement' => ['required'],
            'jenis_improvement' => ['required'],
            'kategori_improvement' => ['required'],
            'pop_id' => ['required'],
            'cluster' => ['required'],
            // 'hostname' => ['required'],
            'catatan' => ['required'],
        ]);

        if($request->hostname == null){
            $validasi['hostname'] = "-";
        }else{
            $validasi['hostname'] = $request->hostname;
        }
        $validasi['status'] = "Plan Improve";
        $validasi['realisasi'] = "-";
        $validasi['link_sharepoint'] = "-";
        $validasi['jadwal_id'] = "-";


        Improvement::create($validasi);
        return redirect('/improvement')->with('success','Data added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Improvement  $improvement
     * @return \Illuminate\Http\Response
     */
    public function show(Improvement $improvement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Improvement  $improvement
     * @return \Illuminate\Http\Response
     */
    public function edit(Improvement $improvement)
    {
        return view('improvement.edit',['improvement' => $improvement, 'pop' => Pop::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Improvement  $improvement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Improvement $improvement)
    {
        $validasi = $this->validate($request,[
            'plan' => ['required'],
            'wilayah' => ['required'],
            'area' => ['required'],
            'dasar_improvement' => ['required'],
            'jenis_improvement' => ['required'],
            'kategori_improvement' => ['required'],
            'pop_id' => ['required'],
            // 'nam_cpe_pln' => ['required'],
            'cluster' => ['required'],
            // 'status' => ['required'],
            // 'realisasi' => ['required'],
            // 'link_sharepoint' => ['required'],
            'hostname' => ['required'],
            'catatan' => ['required'],
        ]);

        Improvement::where('id',$improvement->id)->update($validasi);
        return redirect('/improvement')->with('success','Data update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Improvement  $improvement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Improvement $improvement)
    {
        Improvement::destroy($improvement->id);
        return redirect('/improvement')->with('success','Data successfully deleted!');
    }

    public function realisasi(Request $request, $id){
        $validasi = $this->validate($request,[
            'realisasi' => ['required'],
            'link_sharepoint' => ['required'],
        ]);

        $validasi['status'] = 'Realisasi';
        $status = ['status' => $validasi['status']];
        Improvement::where('id',$id)->update($validasi);
        Temuan::where('id',$id)->update($status);
        return redirect('/improvement')->with('success','Data update successfully!');
    }
}
