@extends('layout.adminlte')

@section('content')
@if (empty($suhu))
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Suhu Ruangan</h3>
                </div>
                <form action="/pop/teknis/suhu" method="POST">
                    @csrf
                    <input type="hidden" name="pop_id" value="{{ $id }}">
                    <div class="card-body">
                        <div class="form-group mb-5">
                            <label for="suhu">Suhu (*C)</label>
                            <input type="number" class="form-control suhu @error('beban_r') is-invalid @enderror" id="suhu" name="suhu_ruangan" required autocomplete="off">
                            @error('suhu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                        <a href="/pop/teknis/{{ $id }}" class="btn btn-danger float-right px-5 mr-3">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Suhu Ruangan</h3>
                </div>
                <form action="/pop/teknis/suhu/{{ $id }}" method="POST">
                    @csrf
                    <input type="hidden" name="pop_id" value="{{ $id }}">
                    <div class="card-body">
                        <div class="form-group mb-5">
                            <label for="suhu">Suhu (*C)</label>
                            <input type="number" class="form-control suhu @error('beban_r') is-invalid @enderror" id="suhu" name="suhu_ruangan" required autocomplete="off" value="{{ $suhu->suhu_ruangan }}">
                            @error('suhu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                        <a href="/pop/teknis/{{ $id }}" class="btn btn-danger float-right px-5 mr-3">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@endsection

@section('title')
{{ $pop->nama_pop }}
@endsection