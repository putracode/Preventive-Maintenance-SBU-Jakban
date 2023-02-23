@extends('layout.adminlte')

@section('content')
<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Edit POP</h3>
    </div>
    <form action="/pop/{{ $pop->id }}" method="POST">
        @csrf
        @method('put')
        <div class="card-body">
            
            <div class="form-group mb-4">
                <label for="id_pop">ID POP</label>
                <input type="text" class="form-control @error('id_pop') is-invalid @enderror" id="id_pop" name="id_pop" required value="{{ old('id_pop',$pop->id_pop) }}" autocomplete="off">
                @error('id_pop')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="nama_pop">Nama POP</label>
                <input type="text" class="form-control @error('nama_pop') is-invalid @enderror" id="nama_pop" name="nama_pop" required value="{{ old('nama_pop',$pop->nama_pop) }}" autocomplete="off">
                @error('nama_pop')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="koordinat">Koordinat</label>
                <input type="text" class="form-control @error('koordinat') is-invalid @enderror" id="koordinat" name="koordinat" required value="{{ old('koordinat',$pop->koordinat) }}" autocomplete="off">
                @error('koordinat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat',$pop->alamat) }}" autocomplete="off">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" required value="{{ old('kelurahan',$pop->kelurahan) }}" autocomplete="off">
                @error('kelurahan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" required value="{{ old('kecamatan',$pop->kecamatan) }}" autocomplete="off">
                @error('kecamatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="kota">Kota</label>
                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" required value="{{ old('kota',$pop->kota) }}" autocomplete="off">
                @error('kota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="building">Building</label>
                <input type="text" class="form-control @error('building') is-invalid @enderror" id="building" name="building" required value="{{ old('building',$pop->building) }}" autocomplete="off">
                @error('building')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="tipe_pop">Tipe POP</label>
                <input type="text" class="form-control @error('tipe_pop') is-invalid @enderror" id="tipe_pop" name="tipe_pop" required value="{{ old('tipe_pop',$pop->tipe_pop) }}" autocomplete="off">
                @error('tipe_pop')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right ml-3">Submit</button>
                <a href="/pop" class="btn btn-danger btn-sm px-4 float-right">Cancel</a>
            </div>
    </form>
</div>
@endsection