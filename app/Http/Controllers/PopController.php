<?php

namespace App\Http\Controllers;

use App\Models\Pop;
use Illuminate\Http\Request;

class PopController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pop.index',['pop' => Pop::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pop.create');
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
            'id_pop' => ['required'],
            'nama_pop' => ['required'],
            'koordinat' => ['required'],
            'alamat' => ['required'],
            'kelurahan' => ['required'],
            'kecamatan' => ['required'],
            'kota' => ['required'],
            'building' => ['required'],
            'tipe_pop' => ['required'],
        ]);

        Pop::create($validasi);
        return redirect('/pop')->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function show(Pop $pop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function edit(Pop $pop)
    {
        return view('pop.edit',['pop' => $pop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pop $pop)
    {
        $validasi = $this->validate($request,[
            'id_pop' => ['required'],
            'nama_pop' => ['required'],
            'koordinat' => ['required'],
            'alamat' => ['required'],
            'kelurahan' => ['required'],
            'kecamatan' => ['required'],
            'kota' => ['required'],
            'building' => ['required'],
            'tipe_pop' => ['required'],
        ]);

        Pop::where('id',$pop->id)->update($validasi);
        return redirect('/pop')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pop $pop)
    {
        pop::destroy($pop->id);
        return redirect('/pop')->with('success','Data successfully deleted!');
    }
}
