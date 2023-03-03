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
            
            <div class="form-group mb-5">
                <label for="id_pop">ID POP</label>
                <input type="text" class="form-control @error('id_pop') is-invalid @enderror" id="id_pop" name="id_pop" required value="{{ old('id_pop',$pop->id_pop) }}" autocomplete="off">
                @error('id_pop')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="nama_pop">Nama POP / CPE PLN</label>
                <input type="text" class="form-control @error('nama_pop') is-invalid @enderror" id="nama_pop" name="nama_pop" required value="{{ old('nama_pop',$pop->nama_pop) }}" autocomplete="off">
                @error('nama_pop')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="koordinat">Koordinat</label>
                <input type="text" class="form-control @error('koordinat') is-invalid @enderror" id="koordinat" name="koordinat" required value="{{ old('koordinat',$pop->koordinat) }}" autocomplete="off">
                @error('koordinat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat',$pop->alamat) }}" autocomplete="off">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" required value="{{ old('kelurahan',$pop->kelurahan) }}" autocomplete="off">
                @error('kelurahan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" required value="{{ old('kecamatan',$pop->kecamatan) }}" autocomplete="off">
                @error('kecamatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="kota">Kota</label>
                <select class="form-control select2 @error('kota') is-invalid @enderror" required value="{{ old('kota') }}"
                    id="kota" name="kota">
                    <option value="Bekasi Kabupaten" {{ $pop->kota == 'Bekasi Kabupaten' ? 'selected' : '' }}>Bekasi Kabupaten</option>
                    <option value="Bekasi Kota" {{ $pop->kota == 'Bekasi Kota' ? 'selected' : '' }}>Bekasi Kota</option>
                    <option value="Bogor Kabupaten" {{ $pop->kota == 'Bogor Kabupaten' ? 'selected' : '' }}>Bogor Kabupaten</option>
                    <option value="Bogor Kota" {{ $pop->kota == 'Bogor Kota' ? 'selected' : '' }}>Bogor Kota</option>
                    <option value="Depok Kota" {{ $pop->kota == 'Depok Kota' ? 'selected' : '' }}>Depok Kota</option>
                    <option value="Jakarta Barat" {{ $pop->kota == 'Jakarta Barat' ? 'selected' : '' }}>Jakarta Barat</option>
                    <option value="Jakarta Pusat" {{ $pop->kota == 'Jakarta Pusat' ? 'selected' : '' }}>Jakarta Pusat</option>
                    <option value="Jakarta Selatan" {{ $pop->kota == 'Jakarta Selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                    <option value="Jakarta Timur" {{ $pop->kota == 'Jakarta Timur' ? 'selected' : '' }}>Jakarta Timur</option>
                    <option value="Jakarta Utara" {{ $pop->kota == 'Jakarta Utara' ? 'selected' : '' }}>Jakarta Utara</option>
                    <option value="Tangerang Kabupaten" {{ $pop->kota == 'Tangerang Kabupaten' ? 'selected' : '' }}>Tangerang Kabupaten</option>
                    <option value="Tangerang Kota" {{ $pop->kota == 'Tangerang Kota' ? 'selected' : '' }}>Tangerang Kota</option>
                    <option value="Tangerang Selatan" {{ $pop->kota == 'Tangerang Selatan' ? 'selected' : '' }}>Tangerang Selatan</option>
                    <option value="Pandeglang Kabupaten" {{ $pop->kota == 'Pandeglang Kabupaten' ? 'selected' : '' }}>Pandeglang Kabupaten</option>
                    <option value="Serang Kabupaten" {{ $pop->kota == 'Serang Kabupaten' ? 'selected' : '' }}>Serang Kabupaten</option>
                    <option value="Serang Kota" {{ $pop->kota == 'Serang Kota' ? 'selected' : '' }}>Serang Kota</option>
                    <option value="Cilegon Kota" {{ $pop->kota == 'Cilegon Kota' ? 'selected' : '' }}>Cilegon Kota</option>
                    <option value="Lebak Kabupaten" {{ $pop->kota == 'Lebak Kabupaten' ? 'selected' : '' }}>Lebak Kabupaten</option>
                </select>
                @error('kota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="building">Building</label>
                <select class="form-control select2 @error('building') is-invalid @enderror" required value="{{ old('building') }}"
                    id="building" name="building">
                    <option value="Data Center" {{ $pop->building == 'Data Center' ? 'selected' : '' }}>Data Center</option>
                    <option value="Mikro POP" {{ $pop->building == 'Mikro POP' ? 'selected' : '' }}>Mikro POP</option>
                    <option value="Mini POP" {{ $pop->building == 'Mini POP' ? 'selected' : '' }}>Mini POP</option>
                    <option value="ODC" {{ $pop->building == 'ODC' ? 'selected' : '' }}>ODC</option>
                    <option value="OLT Gantung" {{ $pop->building == 'OLT Gantung' ? 'selected' : '' }}>OLT Gantung</option>
                    <option value="PLC" {{ $pop->building == 'PLC' ? 'selected' : '' }}>PLC</option>
                    <option value="Ruang Kantor" {{ $pop->building == 'Ruang Kantor' ? 'selected' : '' }}>Ruang Kantor</option>
                    <option value="Shelter CKD" {{ $pop->building == 'Shelter CKD' ? 'selected' : '' }}>Shelter CKD</option>
                    <option value="Shelter Permanen" {{ $pop->building == 'Shelter Permanen' ? 'selected' : '' }}>Shelter Permanen</option>
                </select>
                @error('building')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="tipe_pop">Tipe POP</label>
                <select class="form-control select2 @error('tipe_pop') is-invalid @enderror" required value="{{ old('tipe_pop') }}"
                    id="tipe_pop" name="tipe_pop">
                    <option value="POP-A" {{ $pop->tipe_pop == 'POP-A' ? 'selected' : '' }}>POP-A</option>
                    <option value="POP-B" {{ $pop->tipe_pop == 'POP-B' ? 'selected' : '' }}>POP-B</option>
                    <option value="POP-D" {{ $pop->tipe_pop == 'POP-D' ? 'selected' : '' }}>POP-D</option>
                    <option value="POP-SB" {{ $pop->tipe_pop == 'POP-SB' ? 'selected' : '' }}>POP-SB</option>
                    <option value="CPE PLN" {{ $pop->tipe_pop == 'CPE PLN' ? 'selected' : '' }}>CPE PLN</option>
                </select>
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