@extends('layout.adminlte')
@section('style')

<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
@endsection
@section('content')
<div class="card card-secondary" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Create Jadwal</h3>
    </div>
    <form action="/jadwal" method="POST">
        @csrf
        <div class="card-body">
            <input type="hidden" value="Plan" name="status">
            <input type="hidden" value="-" name="realisasi">
            <input type="hidden" value="-" name="link_sharepoint">
            <div class="form-group mb-4">
                <label for="plan">Plan PM</label>
                <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan') }}" autocomplete="off" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                @error('plan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="wo_fsm">WO FSM+ / IFast</label>
                <input type="text" class="form-control @error('wo_fsm') is-invalid @enderror" id="wo_fsm" name="wo_fsm" required value="{{ old('wo_fsm') }}" autocomplete="off">
                @error('wo_fsm')
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
                <label for="jenis_pm">Jenis PM</label>
                <select class="form-control @error('jenis_pm') is-invalid @enderror" style="width: 100%;" required
                    value="{{ old('jenis_pm') }}" id="jenis_pm" name="jenis_pm">
                    <option selected hidden disabled></option>
                    <option value="ISP">ISP</option>
                    <option value="OSP">OSP</option>
                </select>
                @error('jenis_pm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="jenis_isp" style="display: none" id="jenis_isp">
                <div class="form-group mb-4">
                    {{-- <input type="hidden" name="cluster" value="-"> --}}
                    <label for="kategori_pm">Kategori PM</label>
                    <select class="form-control select2 @error('kategori_pm') is-invalid @enderror" style="width: 100%;"
                        value="{{ old('kategori_pm') }}" name="kategori_pm">
                        <option selected="selected" hidden disabled></option>
                        <option value="Batre">Batre</option>
                        <option value="AC (Air Conditioner)">AC (Air Conditioner)</option>
                        <option value="AC Dan Environment">AC Dan Environment</option>
                        <option value="All">All</option>
                    </select>
                    @error('kategori_pm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    {{-- <input type="hidden" name="cluster" value="-"> --}}
                    <label for="pop_id">Nama Pop</label>
                    <select class="form-control select2 @error('pop_id') is-invalid @enderror" style="width: 100%"
                        value="{{ old('pop_id') }}" name="pop_id">
                        <option selected hidden value="-"></option>
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
            </div>
            <div class="jenis_osp" style="display: none" id="jenis_osp">
                <div class="form-group mb-4">
                    {{-- <input type="hidden" name="nama_pop" value="-"> --}}
                    <label for="kategori_pm">Kategori PM</label>
                    <select class="form-control select2 @error('kategori_pm') is-invalid @enderror" style="width: 100%;"
                        value="{{ old('kategori_pm') }}" name="kategori_pm">
                        <option selected="selected" hidden disabled></option>
                        <option value="Jalur Kabel">Jalur Kabel</option>
                        <option value="Utilitas (FDT,FAT,JB,dll)">Utilitas (FDT,FAT,JB,dll)</option>
                        <option value="All">All</option>
                    </select>
                    @error('kategori_pm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4 form_osp_2" id="form_osp_2">
                    <label for="cluster">Nama Jalan / Cluster Perumahan</label>
                    <input type="text" class="form-control @error('cluster') is-invalid @enderror" id="cluster"
                        name="cluster"  autocomplete="off" value="-">
                    @error('cluster')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right ml-3">Submit</button>
                <a href="/jadwal" class="btn btn-danger btn-sm px-4 float-right">Cancel</a>
            </div>
    </form>
</div>
@endsection
@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()

</script>
<script>
    document.querySelector('#jenis_pm').addEventListener('change', changeInput);

    function changeInput() {
        let jenis_isp = document.querySelector('#jenis_isp');
        let jenis_osp = document.querySelector('#jenis_osp');

        if (this.value == 'ISP') {
          jenis_isp.style.display = 'block'
        } else {
          jenis_isp.style.display = 'none'  
        }
        if (this.value == 'OSP') {
            jenis_osp.style.display = 'block'
        } else {
            jenis_osp.style.display = 'none'
        }
    }

</script>
@endsection
