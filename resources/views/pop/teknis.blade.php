@extends('layout.adminlte')

@section('content')
    <a href="/pop" class="btn btn-danger btn-sm mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="/pop/teknis/listrik/{{ $id }}" class="btn btn-info d-flex justify-content-center align-items-center" style="width: 100%; height: 75px;">Kelistrikan</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="/pop/teknis/recti-battere/{{ $id }}" class="btn btn-info d-flex justify-content-center align-items-center" style="width: 100%; height: 75px;">Recti & Battere</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="/pop/teknis/genset/{{ $id }}" class="btn btn-info d-flex justify-content-center align-items-center" style="width: 100%; height: 75px;">Genset</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="/pop/teknis/suhu/{{ $id }}" class="btn btn-info d-flex justify-content-center align-items-center" style="width: 100%; height: 75px;">Suhu</a>
        </div>
    </div>
@endsection

@section('title')
{{ $pop->nama_pop }}
@endsection