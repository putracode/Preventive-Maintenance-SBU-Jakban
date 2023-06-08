@extends('layout.adminlte')

@section('content')
@if (empty($genset))
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Genset</h3>
                </div>
                <form action="/pop/teknis/genset" method="POST">
                    @csrf
                    <input type="hidden" name="pop_id" value="{{ $id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="daya_listrik">Daya Listrik PLN (Watt)</label>
                                    <input type="number" class="form-control @error('daya_listrik') is-invalid @enderror" id="daya_listrik" name="daya_listrik" value="{{ $listrik->daya_listrik ?? '' }}" readonly autocomplete="off" required>
                                    @error('daya_listrik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="jumlah_phasa">Jumlah Phasa</label>
                                    <input type="number" class="form-control @error('jumlah_phasa') is-invalid @enderror" id="jumlah_phasa" name="jumlah_phasa" value="{{ $listrik->jumlah_phasa ?? '' }}" readonly autocomplete="off" required>
                                    @error('jumlah_phasa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="merk_type">Merk dan Type</label>
                            <input type="text" class="form-control @error('merk_type') is-invalid @enderror" id="merk_type" name="merk_type" autocomplete="off" required>
                            @error('merk_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="sn">SN</label>
                            <input type="text" class="form-control @error('sn') is-invalid @enderror" id="sn" name="sn" autocomplete="off" required>
                            @error('sn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="kapasitas">Kapasitas (Watt)</label>
                            <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" autocomplete="off" required>
                            @error('kapasitas')
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
                    <h3 class="card-title">Genset</h3>
                </div>
                <form action="/pop/teknis/genset/{{ $id }}" method="POST">
                    @csrf
                    <input type="hidden" name="pop_id" value="{{ $id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="daya_listrik">Daya Listrik PLN (Watt)</label>
                                    <input type="number" class="form-control @error('daya_listrik') is-invalid @enderror" id="daya_listrik" name="daya_listrik" value="{{ $listrik->daya_listrik ?? '' }}" readonly autocomplete="off" required>
                                    @error('daya_listrik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-5">
                                    <label for="jumlah_phasa">Jumlah Phasa</label>
                                    <input type="number" class="form-control @error('jumlah_phasa') is-invalid @enderror" id="jumlah_phasa" name="jumlah_phasa" value="{{ $listrik->jumlah_phasa ?? '' }}" readonly autocomplete="off" required>
                                    @error('jumlah_phasa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="merk_type">Merk dan Type</label>
                            <input type="text" class="form-control @error('merk_type') is-invalid @enderror" id="merk_type" name="merk_type" autocomplete="off" required value="{{ $genset->merk_type }}">
                            @error('merk_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="sn">SN</label>
                            <input type="text" class="form-control @error('sn') is-invalid @enderror" id="sn" name="sn" autocomplete="off" required value="{{ $genset->sn }}">
                            @error('sn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="kapasitas">Kapasitas (Watt)</label>
                            <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" autocomplete="off" required value="{{ $genset->kapasitas }}">
                            @error('kapasitas')
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