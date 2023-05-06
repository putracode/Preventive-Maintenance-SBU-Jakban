@extends('layout.adminlte')
@section('style')

<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
@endsection
@section('content')
<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Create Jadwal</h3>
    </div>
    <form action="/jadwal" method="POST">
        @csrf
        <div class="card-body">
            {{-- <input type="hidden" value="Plan" name="status">
            <input type="hidden" value="-" name="realisasi">
            <input type="hidden" value="-" name="link_sharepoint">
            <input type="hidden" value="-" name="improvement">
            <input type="hidden" value="-" name="temuan"> --}}
            @if (auth()->user()->role == 'admin')
                <div class="form-group mb-5">
                    <label for="plan">Plan PM</label>
                    <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan') }}" autocomplete="off">
                    @error('plan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            @else
                <div class="form-group mb-5">
                    <label for="plan">Plan PM</label>
                    <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan') }}" autocomplete="off" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    @error('plan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            @endif
            <div class="form-group mb-5">
                <label for="wo_fsm">WO FSM+ / IFast</label>
                <input type="text" class="form-control @error('wo_fsm') is-invalid @enderror" id="wo_fsm" name="wo_fsm" required value="{{ old('wo_fsm') }}" autocomplete="off">
                @error('wo_fsm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
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
                <label for="jenis_pm">Jenis PM</label>
                <select class="form-control @error('jenis_pm') is-invalid @enderror" style="width: 100%;" required
                    value="{{ old('jenis_pm') }}" id="jenis_pm" name="jenis_pm">
                    <option selected hidden disabled></option>
                    <option value="ISP">ISP</option>
                    <option value="CPE PLN">CPE PLN</option>
                    <option value="OSP">OSP</option>
                </select>
                @error('jenis_pm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="jenis_isp" style="display: none" id="jenis_isp">
                <div class="form-group mb-5">
                    <label for="kategori_pm">Kategori PM</label>
                    <select class="form-control select2 @error('kategori_pm') is-invalid @enderror kategori_isp" style="width: 100%;"
                        value="{{ old('kategori_pm') }}" name="kategori_pm">
                        <option selected hidden disabled></option>
                        <option value="Uji Batre">Uji Batre</option>
                        <option value="OLT" id="olt">OLT</option>
                        <option value="AC (Air Conditioner)">AC (Air Conditioner)</option>
                        <option value="AC - Environment">AC - Environment</option>
                        <option value="Environment">Environment</option>
                        <option value="AC - Environment - Uji Batre">AC - Environment - Uji Batre</option>
                    </select>
                    @error('kategori_pm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-5">
                    <label for="pop_id">Nama POP / Nama CPE PLN</label>
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
            <div class="form-group mb-5" id="hostname" style="display: none">
                <label for="hostname">Hostname</label>
                <input type="text" class="form-control @error('hostname') is-invalid @enderror" id="hostname"
                    name="hostname"  autocomplete="off">
                @error('hostname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="jenis_osp" style="display: none" id="jenis_osp">
                <div class="form-group mb-5">
                    <label for="kategori_pm">Kategori PM</label>
                    <select class="form-control select2 @error('kategori_pm') is-invalid @enderror kategori_osp" style="width: 100%;"
                        value="{{ old('kategori_pm') }}" name="kategori_pm">
                        <option selected="selected" hidden disabled></option>
                        <option value="IKR - Kabel DW">IKR - Kabel DW</option>
                        <option value="IKR - Kabel DW dan FAT">IKR - Kabel DW dan FAT</option>
                        <option value="IKR - FAT" id="ikr_fat">IKR - FAT</option>
                        <option value="Jalur Feeder">Jalur Feeder</option>
                        <option value="Jalur Kabel TR/TM">Jalur Kabel TR/TM</option>
                        <option value="Cluster Perumahan">Cluster Perumahan</option>
                        <option value="ADSS LS">ADSS LS</option>
                    </select>
                    @error('kategori_pm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-5 form_osp_2" id="form_osp_2">
                    <label for="cluster">Nama Jalan / Cluster Perumahan / No Tower</label>
                    <input type="text" class="form-control @error('cluster') is-invalid @enderror" id="cluster"
                        name="cluster"  autocomplete="off" value="-">
                    @error('cluster')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-5" id="id_fat" style="display: none">
                <label for="id_fat">ID FAT</label>
                <input type="text" class="form-control @error('id_fat') is-invalid @enderror" id="id_fat"
                    name="id_fat"  autocomplete="off">
                @error('id_fat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right ml-3" id="submitButton">Submit</button>
                <a href="/jadwal" class="btn btn-danger btn-sm px-4 float-right">Cancel</a>
            </div>
    </form>
</div>
@endsection
@section('script')

<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(document).ready(function(){
        // Select 2
        $('.select2').select2()

        $('#jenis_pm').on('change',function(){
            let selected = $(this).val();
            if(selected == "ISP" || selected == "CPE PLN"){
                $('#jenis_isp').css('display','block');
                $('#jenis_osp').css('display','none');
            }else if(selected == "OSP"){
                $('#jenis_isp').css('display','none');
                $('#jenis_osp').css('display','block');
            }
        })
        $('.kategori_isp').on('change',function(){
            let selected = $(this).val();
            console.log(selected);
            if(selected == "OLT"){
                $('#hostname').css('display','block');
            }else{
                $('#hostname').css('display','none');
            }
        })
        $('.kategori_osp').on('change',function(){
            let selected = $(this).val();
            console.log(selected);
            if(selected == "IKR - FAT"){
                $('#id_fat').css('display','block');
            }else{
                $('#id_fat').css('display','none');
            }
        })
    })



</script>
@endsection
