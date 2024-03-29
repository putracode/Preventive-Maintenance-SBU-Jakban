@extends('layout.adminlte')
@section('style')

<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
@endsection
@section('content')
<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Edit Improvement</h3>
    </div>
    <form action="/improvement/{{ $improvement->id }}" method="POST">
        @csrf
        @method('put')
        <div class="card-body">
            {{-- <input type="hidden" value="Plan Improve" name="status">
            <input type="hidden" value="-" name="realisasi">
            <input type="hidden" value="-" name="link_sharepoint"> --}}
            <div class="form-group mb-5">
                <label for="plan">Plan Improvement</label>
                <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan',$improvement->plan) }}" autocomplete="off" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                @error('plan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="wilayah">Wilayah</label>
                <select class="form-control select2 @error('wilayah') is-invalid @enderror" required
                    value="{{ old('wilayah') }}" id="wilayah" name="wilayah">
                    <option value="HAR BDB" {{ $improvement->wilayah == 'HAR BDB' ? 'selected' : '' }}>HAR BDB</option>
                    <option value="HAR JAKARTA" {{ $improvement->wilayah == 'HAR JAKARTA' ? 'selected' : '' }}>HAR JAKARTA</option>
                </select>
                @error('wilayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="area">Area</label>
                <select class="form-control select2 @error('area') is-invalid @enderror" required value="{{ old('area') }}"
                    id="area" name="area">
                    <option value="Bekasi Kabupaten" {{ $improvement->area == 'Bekasi Kabupaten' ? 'selected' : '' }}>Bekasi Kabupaten</option>
                    <option value="Bekasi Kota" {{ $improvement->area == 'Bekasi Kota' ? 'selected' : '' }}>Bekasi Kota</option>
                    <option value="Bogor Kabupaten" {{ $improvement->area == 'Bogor Kabupaten' ? 'selected' : '' }}>Bogor Kabupaten</option>
                    <option value="Bogor Kota" {{ $improvement->area == 'Bogor Kota' ? 'selected' : '' }}>Bogor Kota</option>
                    <option value="Depok Kota" {{ $improvement->area == 'Depok Kota' ? 'selected' : '' }}>Depok Kota</option>
                    <option value="Jakarta Barat" {{ $improvement->area == 'Jakarta Barat' ? 'selected' : '' }}>Jakarta Barat</option>
                    <option value="Jakarta Pusat" {{ $improvement->area == 'Jakarta Pusat' ? 'selected' : '' }}>Jakarta Pusat</option>
                    <option value="Jakarta Selatan" {{ $improvement->area == 'Jakarta Selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                    <option value="Jakarta Timur" {{ $improvement->area == 'Jakarta Timur' ? 'selected' : '' }}>Jakarta Timur</option>
                    <option value="Jakarta Utara" {{ $improvement->area == 'Jakarta Utara' ? 'selected' : '' }}>Jakarta Utara</option>
                    <option value="Tangerang Kabupaten" {{ $improvement->area == 'Tangerang Kabupaten' ? 'selected' : '' }}>Tangerang Kabupaten</option>
                    <option value="Tangerang Kota" {{ $improvement->area == 'Tangerang Kota' ? 'selected' : '' }}>Tangerang Kota</option>
                    <option value="Tangerang Selatan" {{ $improvement->area == 'Tangerang Selatan' ? 'selected' : '' }}>Tangerang Selatan</option>
                    <option value="Pandeglang Kabupaten" {{ $improvement->area == 'Pandeglang Kabupaten' ? 'selected' : '' }}>Pandeglang Kabupaten</option>
                    <option value="Serang Kabupaten" {{ $improvement->area == 'Serang Kabupaten' ? 'selected' : '' }}>Serang Kabupaten</option>
                    <option value="Serang Kota" {{ $improvement->area == 'Serang Kota' ? 'selected' : '' }}>Serang Kota</option>
                    <option value="Cilegon Kota" {{ $improvement->area == 'Cilegon Kota' ? 'selected' : '' }}>Cilegon Kota</option>
                    <option value="Lebak Kabupaten" {{ $improvement->area == 'Lebak Kabupaten' ? 'selected' : '' }}>Lebak Kabupaten</option>
                </select>
                @error('area')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="dasar_improvement">Dasar Improvement</label>
                <select class="form-control select2 @error('dasar_improvement') is-invalid @enderror" required
                    value="{{ old('dasar_improvement') }}" id="dasar_improvement" name="dasar_improvement">
                    <option selected hidden disabled></option>
                    <option value="MOM" {{ $improvement->dasar_improvement == 'MOM' ? 'selected' : '' }}>MOM</option>
                    <option value="Permintaan" {{ $improvement->dasar_improvement == 'Permintaan' ? 'selected' : '' }}>Permintaan</option>
                    <option value="Hasil PM" {{ $improvement->dasar_improvement == 'Hasil PM' ? 'selected' : '' }}>Hasil PM</option>
                </select>
                @error('dasar_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="jenis_improvement">Jenis Improvement</label>
                <select class="form-control select2 @error('jenis_improvement') is-invalid @enderror" required
                    value="{{ old('jenis_improvement') }}" id="jenis_improvement" name="jenis_improvement">
                    <option value="ISP" {{ $improvement->jenis_improvement == 'ISP' ? 'selected' : '' }}>ISP</option>
                    <option value="CPE PLN" {{ $improvement->jenis_improvement == 'CPE PLN' ? 'selected' : '' }}>CPE PLN</option>
                    <option value="OSP" {{ $improvement->jenis_improvement == 'OSP' ? 'selected' : '' }}>OSP</option>
                </select>
                @error('jenis_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="kategori_improvement">Kategori Improvement</label>
                <select class="form-control select2 @error('kategori_improvement') is-invalid @enderror" required
                    value="{{ old('kategori_improvement') }}" id="kategori_improvement" name="kategori_improvement">
                    @if ($improvement->jenis_improvement == 'ISP' || $improvement->jenis_improvement == 'CPE PLN')
                        <option value="Batre" {{ $improvement->kategori_improvement == 'Batre' ? 'selected' : '' }}>Batre</option>
                        <option value="AC" {{ $improvement->kategori_improvement == 'AC' ? 'selected' : '' }}>AC</option>
                        <option value="OLT" {{ $improvement->kategori_improvement == 'OLT' ? 'selected' : '' }}>OLT</option>
                                                <option value="Rectifier" {{ $improvement->kategori_improvement == 'Rectifier' ? 'selected' : '' }}>Rectifier</option>
                        <option value="Perangkat" {{ $improvement->kategori_improvement == 'Perangkat' ? 'selected' : '' }}>Perangkat</option>
                    @endif
                    @if ($improvement->jenis_improvement == 'OSP')
                        <option value="Jalur Kabel" {{ $improvement->kategori_improvement == 'Jalur Kabel' ? 'selected' : '' }}>Jalur Kabel</option>
                        <option value="Utilitas (FDT,FAT,JB,dll)" {{ $improvement->kategori_improvement == 'Utilitas (FDT,FAT,JB,dll)' ? 'selected' : '' }}>Utilitas (FDT,FAT,JB,dll)</option>
                    @endif
                </select>
                @error('kategori_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5" style="display: {{ $improvement->kategori_improvement == 'OLT' ? 'block' : 'none' }}" id="hostnamee">
                <label for="hostname">Hostname</label>
                <input type="text" class="form-control @error('hostname') is-invalid @enderror" id="hostname" name="hostname" required value="{{ old('hostname',$improvement->hostname) }}" autocomplete="off">
                @error('hostname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="pop_id">Nama POP / Nama CPE PLN</label>
                <select class="form-control select2 @error('pop_id') is-invalid @enderror" style="width: 100%"
                    value="{{ old('pop_id') }}" name="pop_id">
                    <option selected hidden disabled></option>
                    @foreach ($pop as $row)
                            @if(old('pop_id',$improvement->pop_id) == $row->id)
                                <option value="{{ $row->id }}" selected>{{ $row->nama_pop }}</option>
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
            <div class="form-group mb-5">
                <label for="cluster">Nama Jalan / Cluster Perumahan / Segmen ADSS LS</label>
                <input type="text" class="form-control @error('cluster') is-invalid @enderror" id="cluster" name="cluster" required value="{{ old('cluster',$improvement->cluster) }}" autocomplete="off">
                @error('cluster')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="catatan">Catatan</label>
                {{-- <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" required value="{{ old('catatan',$temuan->catatan) }}" autocomplete="off" readonly> --}}
                <textarea name="catatan" id="catatan" rows="4" class="form-control @error('catatan') is-invalid @enderror" autocomplete="off">{{ old('catatan',$improvement->catatan) }}</textarea>
                @error('catatan')
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
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()
    $('#kategori_improvement').on('change',function(){
        let selected = $(this).val();
        if(selected == "OLT"){
            $('#hostnamee').css('display','block');
        }else{
            $('#hostnamee').css('display','none');
        }
    })
    $('#jenis_improvement').on('change',function(){
        let selected = $(this).val();
        if(selected == "ISP" || selected == "CPE PLN"){
            $('#kategori_improvement').html('<option value="Batre" {{ $improvement->kategori_improvement == "Batre" ? "selected" : "" }}>Batre</option><option value="AC" {{ $improvement->kategori_improvement == "AC" ? "selected" : "" }}>AC</option><option value="OLT" {{ $improvement->kategori_improvement == "OLT" ? "selected" : "" }}>OLT</option><option value="Rectifier" {{ $improvement->kategori_improvement == "Rectifier" ? "selected" : "" }}>Rectifier</option><option value="Perangkat" {{ $improvement->kategori_improvement == "Perangkat" ? "selected" : "" }}>Perangkat</option>')
            // $('#hostnamee').css('display','block');
            // $('#kategori_isp').css('display','block');
            // $('#kategori_osp').css('display','none');
        }else if(selected == "OSP"){
            $('#kategori_improvement').html('<option value="Jalur Kabel" {{ $improvement->kategori_improvement == "Jalur Kabel" ? "selected" : "" }}>Jalur Kabel</option><option value="Utilitas (FDT,FAT,JB,dll)" {{ $improvement->kategori_improvement == "Utilitas (FDT,FAT,JB,dll)" ? "selected" : "" }}>Utilitas (FDT,FAT,JB,dll)</option>')
            $('#hostnamee').css('display','none');
            // $('#kategori_osp').css('display','block');
            // $('#kategori_isp').css('display','none');
        }
    })
</script>
@endsection
