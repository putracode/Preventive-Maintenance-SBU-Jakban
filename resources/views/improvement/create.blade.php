@extends('layout.adminlte')
@section('style')

<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
@endsection
@section('content')
<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Create Improvement</h3>
    </div>
    <form action="/improvement" method="POST">
        @csrf
        <div class="card-body">
            @if (auth()->user()->role == 'admin')
                <div class="form-group mb-5">
                    <label for="plan">Plan Improvement</label>
                    <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan') }}" autocomplete="off">
                    @error('plan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            @else
                <div class="form-group mb-5">
                    <label for="plan">Plan Improvement</label>
                    <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan') }}" autocomplete="off" min="{{ \Carbon\Carbon::now()->subDays(2)->format('Y-m-d') }}">
                    @error('plan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            @endif
            <div class="form-group mb-5">
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
            <div class="form-group mb-5">
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
            <div class="form-group mb-5">
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
            <div class="form-group mb-5">
                <label for="jenis_improvement">Jenis Improvement</label>
                <select class="form-control select2 @error('jenis_improvement') is-invalid @enderror" required
                    id="jenis_improvement" name="jenis_improvement">
                    <option selected hidden disabled></option>
                    <option value="ISP">ISP</option>
                    <option value="CPE PLN">CPE PLN</option>
                    <option value="OSP">OSP</option>
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
                    <option selected hidden disabled></option>
                    <div class="ISP" id="kategori_isp" style="display: none">
                        <option value="Batre">Batre</option>
                        <option value="AC">AC</option>
                        <option value="OLT">OLT</option>
                                                <option value="Rectifier">Rectifier</option>
                        <option value="Perangkat">Perangkat</option>
                    </div>
                    <div class="OSP" id="kategori_osp" style="display: none">
                        <option value="Jalur Kabel">Jalur Kabel</option>
                        <option value="Utilitas (FDT,FAT,JB,dll)">Utilitas (FDT,FAT,JB,dll)</option>
                    </div>
                </select>
                @error('kategori_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5" style="display: none;" id="hostnamee">
                <label for="hostname">Hostname</label>
                <input type="text" class="form-control @error('hostname') is-invalid @enderror" id="hostname" name="hostname" value="{{ old('hostname') }}" autocomplete="off">
                @error('hostname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="pop_id">Nama POP / Nama CPE PLN </label>
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
            <div class="form-group mb-5">
                <label for="cluster">Nama Jalan / Cluster / Segmen ADSS LS</label>
                <input type="text" class="form-control @error('cluster') is-invalid @enderror" id="cluster" name="cluster" required value="{{ old('cluster') }}" autocomplete="off">
                @error('cluster')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="catatan">Catatan</label>
                {{-- <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" required value="{{ old('catatan',$temuan->catatan) }}" autocomplete="off" readonly> --}}
                <textarea name="catatan" id="catatan" rows="4" class="form-control @error('catatan') is-invalid @enderror" autocomplete="off">{{ old('catatan') }}</textarea>
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
            $('#kategori_improvement').html('<option value="Batre">Batre</option><option value="AC">AC</option><option value="OLT">OLT</option><option value="Rectifier">Rectifier</option><option value="Perangkat">Perangkat</option>')
            // $('#hostnamee').css('display','block');
            // $('#kategori_isp').css('display','block');
            // $('#kategori_osp').css('display','none');
        }else if(selected == "OSP"){
            $('#kategori_improvement').html('<option value="Jalur Kabel">Jalur Kabel</option><option value="Utilitas (FDT,FAT,JB,dll)">Utilitas (FDT,FAT,JB,dll)</option>')
            $('#hostnamee').css('display','none');
            // $('#kategori_osp').css('display','block');
            // $('#kategori_isp').css('display','none');
        }
    })

</script>
@endsection
