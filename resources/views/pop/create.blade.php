@extends('layout.adminlte')

@section('content')
<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Create POP</h3>
    </div>
    <form action="/pop" method="POST">
        @csrf
        <div class="card-body">
            
            <div class="form-group mb-4">
                <label for="id_pop">ID POP</label>
                <input type="text" class="form-control @error('id_pop') is-invalid @enderror" id="id_pop" name="id_pop" required value="{{ old('id_pop') }}" autocomplete="off">
                @error('id_pop')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="nama_pop">Nama POP / CPE PLN</label>
                <input type="text" class="form-control @error('nama_pop') is-invalid @enderror" id="nama_pop" name="nama_pop" required value="{{ old('nama_pop') }}" autocomplete="off">
                @error('nama_pop')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="koordinat">Koordinat</label>
                <input type="text" class="form-control @error('koordinat') is-invalid @enderror" id="koordinat" name="koordinat" required value="{{ old('koordinat') }}" autocomplete="off">
                @error('koordinat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat') }}" autocomplete="off">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" required value="{{ old('kelurahan') }}" autocomplete="off">
                @error('kelurahan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" required value="{{ old('kecamatan') }}" autocomplete="off">
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
                    <option selected hidden disabled></option>
                    <option value="Bekasi Kabupaten">Bekasi Kabupaten</option>
                    <option value="Bekasi Kota">Bekasi Kota</option>
                    <option value="Bogor Kabupaten">Bogor Kabupaten</option>
                    <option value="Bogor Kota">Bogor Kota</option>
                    <option value="Depok Kota">Depok Kota</option>
                    <option value="Jakarta Barat">Jakarta Barat</option>
                    <option value="Jakarta Pusat">Jakarta Pusat</option>
                    <option value="Jakarta Selatan">Jakarta Selatan</option>
                    <option value="Jakarta Timur">Jakarta Timur</option>
                    <option value="Jakarta Utara">Jakarta Utara</option>
                    <option value="Tangerang Kabupaten">Tangerang Kabupaten</option>
                    <option value="Tangerang Kota">Tangerang Kota</option>
                    <option value="Tangerang Selatan">Tangerang Selatan</option>
                    <option value="Pandeglang Kabupaten">Pandeglang Kabupaten</option>
                    <option value="Serang Kabupaten">Serang Kabupaten</option>
                    <option value="Serang Kota">Serang Kota</option>
                    <option value="Cilegon Kota">Cilegon Kota</option>
                    <option value="Lebak Kabupaten">Lebak Kabupaten</option>
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
                    <option selected hidden disabled></option>
                    <option value="Data Center">Data Center</option>
                    <option value="Mikro POP">Mikro POP</option>
                    <option value="Mini POP">Mini POP</option>
                    <option value="ODC">ODC</option>
                    <option value="OLT Gantung">OLT Gantung</option>
                    <option value="PLC">PLC</option>
                    <option value="Ruang Kantor">Ruang Kantor</option>
                    <option value="Shelter CKD">Shelter CKD</option>
                    <option value="Shelter Permanen">Shelter Permanen</option>
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
                    <option selected hidden disabled></option>
                    <option value="POP-A">POP-A</option>
                    <option value="POP-B">POP-B</option>
                    <option value="POP-D">POP-D</option>
                    <option value="POP-SB">POP-SB</option>
                    <option value="CPE-PLN">CPE-PLN</option>
                </select>
                @error('tipe_pop')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right ml-3" id="submitButton">Submit</button>
                <a href="/pop" class="btn btn-danger btn-sm px-4 float-right">Cancel</a>
            </div>
    </form>
</div>
@endsection
@section('script')
{{-- <script src="/asset/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()
</script> --}}
@endsection
