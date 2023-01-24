@extends('layout.adminlte')
@section('style')

<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
@endsection
@section('content')
<div class="card card-secondary" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Create Improvement</h3>
    </div>
    <form action="/improvement" method="POST">
        @csrf
        <div class="card-body">
            <input type="hidden" value="Plan" name="status">
            <input type="hidden" value="-" name="realisasi">
            <input type="hidden" value="-" name="link_sharepoint">
            <div class="form-group mb-4">
                <label for="plan">Plan Improvement</label>
                <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan') }}" autocomplete="off" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                @error('plan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="wilayah">Wilayah</label>
                <select class="form-control select2 @error('wilayah') is-invalid @enderror" required
                    value="{{ old('wilayah') }}" id="wilayah" name="wilayah">
                    <option selected hidden disabled></option>
                    <option value="HAR BDB">HAR BDB</option>
                    <option value="HAR JAKARTA">HAR JAKARTA</option>
                </select>
                @error('wilayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="area">Area</label>
                <select class="form-control select2 @error('area') is-invalid @enderror" required value="{{ old('area') }}"
                    id="area" name="area">
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
                @error('area')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="dasar_improvement">Dasar Improvement</label>
                <select class="form-control select2 @error('dasar_improvement') is-invalid @enderror" required
                    value="{{ old('dasar_improvement') }}" id="dasar_improvement" name="dasar_improvement">
                    <option selected hidden disabled></option>
                    <option value="MOM">MOM</option>
                    <option value="Permintaan">Permintaan</option>
                    <option value="Hasil PM">Hasil PM</option>
                </select>
                @error('dasar_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="jenis_improvement">Jenis Improvement</label>
                <select class="form-control select2 @error('jenis_improvement') is-invalid @enderror" required
                    value="{{ old('jenis_improvement') }}" id="jenis_improvement" name="jenis_improvement">
                    <option selected hidden disabled></option>
                    <option value="ISP">ISP</option>
                    <option value="OSP">OSP</option>
                    <option value="ISP CPE">ISP CPE</option>
                </select>
                @error('jenis_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="kategori_improvement">Kategori Improvement</label>
                <select class="form-control select2 @error('kategori_improvement') is-invalid @enderror" required
                    value="{{ old('kategori_improvement') }}" id="kategori_improvement" name="kategori_improvement">
                    <option selected hidden disabled></option>
                    <option value="Jalur Kabel">Jalur Kabel</option>
                    <option value="Utilitas (FDT,FAT,JB,dll)">Utilitas (FDT,FAT,JB,dll)</option>
                    <option value="Batre">Batre</option>
                    <option value="Rectifier">Rectifier</option>
                    <option value="Perangkat">Perangkat</option>
                    <option value="AC">AC</option>
                </select>
                @error('kategori_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="pop_id">Nama Pop</label>
                <select class="form-control select2 @error('pop_id') is-invalid @enderror" style="width: 100%"
                    value="{{ old('pop_id') }}" name="pop_id">
                    <option selected hidden disabled></option>
                    @foreach ($pop as $row)
                        @if(old('pop_id') == $row->id)
                            <option value="{{ $row->id }}">{{ $row->nama_pop }}</option>
                        @else
                            <option value="{{ $row->id }}">{{ $row->nama_pop }}</option>
                        @endif
                    @endforeach
                </select>
                @error('pop_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="nam_cpe_pln">Nam CPE PLN</label>
                <input type="text" class="form-control @error('nam_cpe_pln') is-invalid @enderror" id="nam_cpe_pln" name="nam_cpe_pln" required value="{{ old('nam_cpe_pln') }}" autocomplete="off">
                @error('nam_cpe_pln')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="cluster">Cluster</label>
                <input type="text" class="form-control @error('cluster') is-invalid @enderror" id="cluster" name="cluster" required value="{{ old('cluster') }}" autocomplete="off">
                @error('cluster')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right ml-3">Submit</button>
                <a href="/improvement" class="btn btn-danger btn-sm px-4 float-right">Cancel</a>
            </div>
    </form>
</div>
@endsection
@section('script')
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()
</script>
@endsection
