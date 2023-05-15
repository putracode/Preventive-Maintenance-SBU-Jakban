<?php

namespace App\Http\Controllers;

use App\Models\Kelistrikan;
use App\Models\Pop;
use App\Models\Suhu;
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

    public function teknis($id){
        // $pop = pop::where('id_pop',$id)->first();
        // $popid = $pop->id;

        return view('pop.teknis',['pop' => pop::where('id',$id)->first(), 'listrik' => Kelistrikan::where('pop_id',$id)->first(), 'pop_id' => $id, 'suhu' => Suhu::where('pop_id',$id)->first()]);
    }

    public function createKelistrikan(Request $request){
        $validasi = $this->validate($request,[
            'pop_id' => ['required'],
            'daya_listrik' => ['required'],
            'jumlah_phasa' => ['required'],
            'mcbr' => ['required'],
            'mcbs' => ['required'],
            'mcbt' => ['required'],
            'beban_r' => ['required'],
            'beban_s' => ['required'],
            'beban_t' => ['required'],
        ]);
        // dd($validasi['pop_id']);
        $utilr = $request->beban_r / $request->mcbr * 100;
        $partr = explode('.',$utilr);
        $validasi['utilitas_r'] = $partr[0] . '%';

        $utils = $request->beban_s / $request->mcbs * 100;
        $parts = explode('.',$utils);
        $validasi['utilitas_s'] = $parts[0] . '%';

        $utilt = $request->beban_t / $request->mcbt * 100;
        $partt = explode('.',$utilt);
        $validasi['utilitas_t'] = $partt[0] . '%';

        $average = [(int)$validasi['utilitas_r'],(int)$validasi['utilitas_s'],(int)$validasi['utilitas_t']];
        $avg = collect($average)->avg();
        $ratarata = explode('.',$avg);

        $health = '';
        if($avg >= 91 && $avg <= 100){
            $health = 'Lose Privillage';
        }elseif($avg >= 81 && $avg <= 90){
            $health = 'Critical';
        }elseif($avg >= 71 && $avg <= 80){
            $health = 'Health';
        }elseif($avg >= 1 && $avg <= 70){
            $health = 'Excellent';
        }else{
            $health = '0';
        };
        
        $validasi['rata_rata'] = $ratarata[0] . '%';
        $validasi['index_healthy'] = $health;
        // dd($validasi['index_healthy']);
        // if($validasi['rata_rata'] >= );
        Kelistrikan::create($validasi);
        return redirect('/pop/teknis/' . $request->pop_id)->with('success','Data added successfully');
    }

    public function updateKelistrikan(Request $request, $id){
        $validasi = $this->validate($request,[
            'pop_id' => ['required'],
            'daya_listrik' => ['required'],
            'jumlah_phasa' => ['required'],
            'mcbr' => ['required'],
            'mcbs' => ['required'],
            'mcbt' => ['required'],
            'beban_r' => ['required'],
            'beban_s' => ['required'],
            'beban_t' => ['required'],
        ]);
        // dd($validasi['pop_id']);
        $utilr = $request->beban_r / $request->mcbr * 100;
        $partr = explode('.',$utilr);
        $validasi['utilitas_r'] = $partr[0] . '%';

        $utils = $request->beban_s / $request->mcbs * 100;
        $parts = explode('.',$utils);
        $validasi['utilitas_s'] = $parts[0] . '%';

        $utilt = $request->beban_t / $request->mcbt * 100;
        $partt = explode('.',$utilt);
        $validasi['utilitas_t'] = $partt[0] . '%';

        $average = [(int)$validasi['utilitas_r'],(int)$validasi['utilitas_s'],(int)$validasi['utilitas_t']];
        $avg = collect($average)->avg();
        $ratarata = explode('.',$avg);

        $health = '';
        if($avg >= 91 && $avg <= 100){
            $health = 'Lose Privillage';
        }elseif($avg >= 81 && $avg <= 90){
            $health = 'Critical';
        }elseif($avg >= 71 && $avg <= 80){
            $health = 'Health';
        }elseif($avg >= 1 && $avg <= 70){
            $health = 'Excellent';
        }else{
            $health = '0';
        };
        
        $validasi['rata_rata'] = $ratarata[0] . '%';
        $validasi['index_healthy'] = $health;
        // dd($validasi['index_healthy']);
        // if($validasi['rata_rata'] >= );
        // Kelistrikan::where('id_pop',$id)->update($validasi);
        return redirect('/pop/teknis/' . $request->pop_id)->with('success','Data update successfully');
    }

    public function createSuhu(Request $request){
        $validasi = $this->validate($request,[
            'pop_id' => ['required'],
            'suhu_ruangan' => ['required'],
        ]);
        
        $health = '';
        if($request->suhu_ruangan >= 25 && $request->suhu_ruangan <= 100){
            $health = 'Lose Privillage';
        }elseif($request->suhu_ruangan >= 21 && $request->suhu_ruangan <= 24){
            $health = 'Critical';
        }elseif($request->suhu_ruangan >= 18 && $request->suhu_ruangan <= 20){
            $health = 'Health';
        }elseif($request->suhu_ruangan >= 1 && $request->suhu_ruangan <= 17){
            $health = 'Excellent';
        }

        $validasi['index_healthy'] = $health;

        Suhu::create($validasi);
        return redirect('/pop/teknis/' . $request->pop_id)->with('success','Data added successfully');
    }

    public function updateSuhu(Request $request, $id){
        $validasi = $this->validate($request,[
            'pop_id' => ['required'],
            'suhu_ruangan' => ['required'],
        ]);
        
        $health = '';
        if($request->suhu_ruangan >= 25 && $request->suhu_ruangan <= 100){
            $health = 'Lose Privillage';
        }elseif($request->suhu_ruangan >= 21 && $request->suhu_ruangan <= 24){
            $health = 'Critical';
        }elseif($request->suhu_ruangan >= 18 && $request->suhu_ruangan <= 20){
            $health = 'Health';
        }elseif($request->suhu_ruangan >= 1 && $request->suhu_ruangan <= 17){
            $health = 'Excellent';
        }

        $validasi['index_healthy'] = $health;

        Suhu::where('pop_id',$id)->update($validasi);
        return redirect('/pop/teknis/' . $request->pop_id)->with('success','Data added successfully');
    }
}
