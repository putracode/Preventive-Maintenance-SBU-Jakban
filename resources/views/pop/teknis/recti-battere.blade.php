@extends('layout.adminlte')

@section('content')
@if (empty($recti) && empty($battere))
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Recti & Battere</h3>
                </div>
                <form action="/pop/teknis/recti-battere" method="POST">
                    @csrf
                    <input type="hidden" name="pop_id" value="{{ $id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="recti_ke">Recti Ke</label>
                                    <input type="number" class="form-control @error('recti_ke') is-invalid @enderror" id="recti_ke" name="recti_ke" autocomplete="off" required>
                                    @error('recti_ke')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="merk_recti">Merk</label>
                                    <input type="text" class="form-control @error('merk_recti') is-invalid @enderror" id="merk_recti" name="merk_recti" autocomplete="off" required>
                                    @error('merk_recti')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="kapasitas_recti">Kapasitas (A)</label>
                                    <input type="number" class="form-control @error('kapasitas_recti') is-invalid @enderror" id="kapasitas_recti" name="kapasitas_recti" autocomplete="off" required>
                                    @error('kapasitas_recti')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="beban">Beban</label>
                                    <input type="number" class="form-control @error('beban') is-invalid @enderror" id="beban" name="beban" autocomplete="off" required>
                                    @error('beban')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            <div class="form-group mb-4">
                                <label for="bank_ke">Bank Ke</label>
                                <input type="number" class="form-control @error('bank_ke') is-invalid @enderror" id="bank_ke" name="bank_ke" autocomplete="off" required>
                                @error('bank_ke')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group mb-4">
                                    <label for="merk_battere">Merk</label>
                                    <input type="text" class="form-control @error('merk_battere') is-invalid @enderror" id="merk_battere" name="merk_battere" autocomplete="off" required>
                                    @error('merk_battere')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-4">
                                    <label for="type">Type</label>
                                    <select class="custom-select rounded-0 type" id="type" @error('type') is-invalid @enderror name="type" required autocomplete="off">
                                        <option hidden disabled selected></option>
                                        <option>Lithium</option>
                                        <option>VRLA</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-4">
                                    <label for="kapasitas_battere">Kapasitas (AH)</label>
                                    <select class="custom-select rounded-0 kapasitas_battere" id="kapasitas_battere" @error('kapasitas_battere') is-invalid @enderror name="kapasitas_battere" required autocomplete="off">
                                        <option hidden disabled selected></option>
                                        <option>200</option>
                                        <option>100</option>
                                        <option>50</option>
                                    </select>
                                    @error('kapasitas_battere')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-4">
                                    <label for="hasil_uji">Hasil Uji (AH)</label>
                                    <input type="text" class="form-control @error('hasil_uji') is-invalid @enderror" id="hasil_uji" name="hasil_uji" autocomplete="off" required>
                                    @error('hasil_uji')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
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
                    <h3 class="card-title">Tambah Recti & Battere</h3>
                </div>
                <form action="/pop/teknis/recti-battere" method="POST">
                    @csrf
                    <input type="hidden" name="pop_id" value="{{ $id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="recti_ke">Recti Ke</label>
                                    <input type="number" class="form-control @error('recti_ke') is-invalid @enderror" id="recti_ke" name="recti_ke" autocomplete="off" required>
                                    @error('recti_ke')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="merk_recti">Merk</label>
                                    <input type="text" class="form-control @error('merk_recti') is-invalid @enderror" id="merk_recti" name="merk_recti" autocomplete="off" required>
                                    @error('merk_recti')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="kapasitas_recti">Kapasitas (A)</label>
                                    <input type="number" class="form-control @error('kapasitas_recti') is-invalid @enderror" id="kapasitas_recti" name="kapasitas_recti" autocomplete="off" required>
                                    @error('kapasitas_recti')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-4">
                                    <label for="beban">Beban</label>
                                    <input type="number" class="form-control @error('beban') is-invalid @enderror" id="beban" name="beban" autocomplete="off" required>
                                    @error('beban')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            <div class="form-group mb-4">
                                <label for="bank_ke">Bank Ke</label>
                                <input type="number" class="form-control @error('bank_ke') is-invalid @enderror" id="bank_ke" name="bank_ke" autocomplete="off" required>
                                @error('bank_ke')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group mb-4">
                                    <label for="merk_battere">Merk</label>
                                    <input type="text" class="form-control @error('merk_battere') is-invalid @enderror" id="merk_battere" name="merk_battere" autocomplete="off" required>
                                    @error('merk_battere')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-4">
                                    <label for="type">Type</label>
                                    <select class="custom-select rounded-0 type" id="type" @error('type') is-invalid @enderror name="type" required autocomplete="off">
                                        <option hidden disabled selected></option>
                                        <option>Lithium</option>
                                        <option>VRLA</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-4">
                                    <label for="kapasitas_battere">Kapasitas (AH)</label>
                                    <select class="custom-select rounded-0 kapasitas_battere" id="kapasitas_battere" @error('kapasitas_battere') is-invalid @enderror name="kapasitas_battere" required autocomplete="off">
                                        <option hidden disabled selected></option>
                                        <option>200</option>
                                        <option>100</option>
                                        <option>50</option>
                                    </select>
                                    @error('kapasitas_battere')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-4">
                                    <label for="hasil_uji">Hasil Uji (AH)</label>
                                    <input type="text" class="form-control @error('hasil_uji') is-invalid @enderror" id="hasil_uji" name="hasil_uji" autocomplete="off" required>
                                    @error('hasil_uji')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($allBattere as $key => $battere)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Recti & Battere</h3>
                    </div>
                    <form action="/pop/teknis/recti-battere/{{ $id }}" method="POST">
                        @csrf
                        <input type="hidden" name="pop_id" value="{{ $id }}">
                        <input type="hidden" name="id" value="{{ $battere->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-4">
                                        <label for="recti_ke">Recti Ke</label>
                                        <input type="number" class="form-control @error('recti_ke') is-invalid @enderror" id="recti_ke" name="recti_ke" autocomplete="off" required value="{{ $allRecti[$key]->recti_ke }}">
                                        @error('recti_ke')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-4">
                                        <label for="merk_recti">Merk</label>
                                        <input type="text" class="form-control @error('merk_recti') is-invalid @enderror" id="merk_recti" name="merk_recti" autocomplete="off" required value="{{ $allRecti[$key]->merk }}">
                                        @error('merk_recti')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-4">
                                        <label for="kapasitas_recti">Kapasitas (A)</label>
                                        <input type="number" class="form-control @error('kapasitas_recti') is-invalid @enderror" id="kapasitas_recti" name="kapasitas_recti" autocomplete="off" value="{{ $allRecti[$key]->kapasitas }}" required>
                                        @error('kapasitas_recti')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-4">
                                        <label for="beban">Beban</label>
                                        <input type="number" class="form-control @error('beban') is-invalid @enderror" id="beban" name="beban" autocomplete="off" required value="{{ $allRecti[$key]->beban }}">
                                        @error('beban')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="form-group mb-4">
                                    <label for="bank_ke">Bank Ke</label>
                                    <input type="number" class="form-control @error('bank_ke') is-invalid @enderror" id="bank_ke" name="bank_ke" autocomplete="off" required value="{{ $battere->bank_ke }}">
                                    @error('bank_ke')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-4">
                                        <label for="merk_battere">Merk</label>
                                        <input type="text" class="form-control @error('merk_battere') is-invalid @enderror" id="merk_battere" name="merk_battere" autocomplete="off" required value="{{ $battere->merk }}">
                                        @error('merk_battere')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mb-4">
                                        <label for="type">Type</label>
                                        <select class="custom-select rounded-0 type" id="type" @error('type') is-invalid @enderror name="type" required autocomplete="off">
                                            <option {{ $battere->type == 'Lithium' ? 'selected' : '' }}>Lithium</option>
                                            <option {{ $battere->type == 'VRLA' ? 'selected' : '' }}>VRLA</option>
                                        </select>
                                        @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mb-4">
                                        <label for="kapasitas_battere">Kapasitas (AH)</label>
                                        <select class="custom-select rounded-0 kapasitas_battere" id="kapasitas_battere" @error('kapasitas_battere') is-invalid @enderror name="kapasitas_battere" required autocomplete="off">
                                            <option {{ $battere->kapasitas == '200' ? 'selected' : '' }}>200</option>
                                            <option {{ $battere->kapasitas == '100' ? 'selected' : '' }}>100</option>
                                            <option {{ $battere->kapasitas == '50' ? 'selected' : '' }}>50</option>
                                        </select>
                                        @error('kapasitas_battere')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mb-4">
                                        <label for="hasil_uji">Hasil Uji (AH)</label>
                                        <input type="text" class="form-control @error('hasil_uji') is-invalid @enderror" id="hasil_uji" name="hasil_uji" autocomplete="off" required value="{{ $battere->hasil_uji }}">
                                        @error('hasil_uji')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection

@section('title')
{{ $pop->nama_pop }}
@endsection