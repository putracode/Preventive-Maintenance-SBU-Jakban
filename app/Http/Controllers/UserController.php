<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index',['user' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $validasi['password'] = bcrypt($validasi['password']);

        User::create($validasi);
        return redirect('/user')->with('success','Data added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validasi = $this->validate($request,[
            'name' => ['required'],
            'username' => ['required'],
            'role' => ['required'],
            // 'password' => ['required'],
        ]);

        User::where('id',$user->id)->update($validasi);
        return redirect('/user')->with('success','Data updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('success','Data succesfully deleted!');
    }

    public function password(Request $request, $id){
        $validasi = $this->validate($request,[
            'password' => ['required']
        ]);

        $validasi['password'] = bcrypt($validasi['password']);
        User::where('id',$id)->update($validasi);
        return redirect('/user')->with('success','Password update successfully!');
    }
}
