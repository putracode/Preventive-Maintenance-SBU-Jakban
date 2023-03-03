@extends('layout.adminlte')
@section('style')

<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
@endsection
@section('content')

<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Edit Jadwal</h3>
    </div>
    <form action="/jadwal/{{ $jadwal->id }}/edit" method="POST">
        @csrf
        @method('put')
        <div class="card-body">
            {{-- <input type="hidden" value="Plan" name="status">
            <input type="hidden" value="-" name="realisasi">
            <input type="hidden" value="-" name="link_sharepoint">
            <input type="hidden" value="-" name="improvement">
            <input type="hidden" value="-" name="temuan"> --}}
            @if (auth()->user()->role == 'admin')
            <div class="form-group mb-5">
                <label for="plan">Plan PM</label>
                <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan',$jadwal->plan) }}" autocomplete="off">
                @error('plan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @else
                <div class="form-group mb-5">
                    <label for="plan">Plan PM</label>
                    <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan',$jadwal->plan) }}" autocomplete="off" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    @error('plan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            @endif
            <div class="form-group mb-5">
                <label for="wo_fsm">WO FSM+ / IFast</label>
                <input type="text" class="form-control @error('wo_fsm') is-invalid @enderror" id="wo_fsm" name="wo_fsm" required value="{{ old('wo_fsm',$jadwal->wo_fsm) }}" autocomplete="off">
                @error('wo_fsm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="wilayah">Wilayah</label>
                <select class="form-control select2 @error('wilayah') is-invalid @enderror" required
                    value="{{ old('wilayah') }}" id="wilayah" name="wilayah" disabled>
                    <option value="HAR BDB" {{ $jadwal->wilayah == 'HAR BDB' ? 'selected' : '' }}>HAR BDB</option>
                    <option value="HAR JAKARTA" {{ $jadwal->wilayah == 'HAR JAKARTA' ? 'selected' : '' }}>HAR JAKARTA</option>
                </select>
                {{-- {{ dd($jadwal->wilayah) }} --}}
                <input type="hidden" name="wilayah" value="{{ $jadwal->wilayah }}">
                @error('wilayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="area">Area</label>
                <select class="form-control select2 @error('area') is-invalid @enderror" required value="{{ old('area') }}"
                    id="area" name="area" disabled>
                    <option value="Bekasi Kabupaten" {{ $jadwal->area == 'Bekasi Kabupaten' ? 'selected' : '' }}>Bekasi Kabupaten</option>
                    <option value="Bekasi Kota" {{ $jadwal->area == 'Bekasi Kota' ? 'selected' : '' }}>Bekasi Kota</option>
                    <option value="Bogor Kabupaten" {{ $jadwal->area == 'Bogor Kabupaten' ? 'selected' : '' }}>Bogor Kabupaten</option>
                    <option value="Bogor Kota" {{ $jadwal->area == 'Bogor Kota' ? 'selected' : '' }}>Bogor Kota</option>
                    <option value="Depok Kota" {{ $jadwal->area == 'Depok Kota' ? 'selected' : '' }}>Depok Kota</option>
                    <option value="Jakarta Barat" {{ $jadwal->area == 'Jakarta Barat' ? 'selected' : '' }}>Jakarta Barat</option>
                    <option value="Jakarta Pusat" {{ $jadwal->area == 'Jakarta Pusat' ? 'selected' : '' }}>Jakarta Pusat</option>
                    <option value="Jakarta Selatan" {{ $jadwal->area == 'Jakarta Selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                    <option value="Jakarta Timur" {{ $jadwal->area == 'Jakarta Timur' ? 'selected' : '' }}>Jakarta Timur</option>
                    <option value="Jakarta Utara" {{ $jadwal->area == 'Jakarta Utara' ? 'selected' : '' }}>Jakarta Utara</option>
                    <option value="Tangerang Kabupaten" {{ $jadwal->area == 'Tangerang Kabupaten' ? 'selected' : '' }}>Tangerang Kabupaten</option>
                    <option value="Tangerang Kota" {{ $jadwal->area == 'Tangerang Kota' ? 'selected' : '' }}>Tangerang Kota</option>
                    <option value="Tangerang Selatan" {{ $jadwal->area == 'Tangerang Selatan' ? 'selected' : '' }}>Tangerang Selatan</option>
                    <option value="Pandeglang Kabupaten" {{ $jadwal->area == 'Pandeglang Kabupaten' ? 'selected' : '' }}>Pandeglang Kabupaten</option>
                    <option value="Serang Kabupaten" {{ $jadwal->area == 'Serang Kabupaten' ? 'selected' : '' }}>Serang Kabupaten</option>
                    <option value="Serang Kota" {{ $jadwal->area == 'Serang Kota' ? 'selected' : '' }}>Serang Kota</option>
                    <option value="Cilegon Kota" {{ $jadwal->area == 'Cilegon Kota' ? 'selected' : '' }}>Cilegon Kota</option>
                    <option value="Lebak Kabupaten" {{ $jadwal->area == 'Lebak Kabupaten' ? 'selected' : '' }}>Lebak Kabupaten</option>
                </select>
                <input type="hidden" name="area" value="{{ $jadwal->area }}">
                @error('area')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="jenis_pm">Jenis PM</label>
                <select class="form-control @error('jenis_pm') is-invalid @enderror" style="width: 100%;" required
                    value="{{ old('jenis_pm') }}" id="jenis_pm" name="jenis_pm" disabled>
                    <option value="ISP" {{ $jadwal->jenis_pm == 'ISP' ? 'selected' : '' }}>ISP</option>
                    <option value="ISP CPE" {{ $jadwal->jenis_pm == 'ISP CPE' ? 'selected' : '' }}>ISP CPE</option>
                    <option value="OSP" {{ $jadwal->jenis_pm == 'OSP' ? 'selected' : '' }}>OSP</option>
                </select>
                <input type="hidden" name="jenis_pm" value="{{ $jadwal->jenis_pm }}">
                @error('jenis_pm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @php
                if ($jadwal->jenis_pm == 'ISP' || $jadwal->jenis_pm == "ISP CPE") {
                    $isp = 'block';
                }else{
                    $isp = 'none';
                }
            @endphp
            <div class="jenis_isp" style="display: {{ $isp }}" id="jenis_isp">
                @if($jadwal->jenis_pm == "ISP" || $jadwal->jenis_pm == "ISP CPE")
                    <div class="form-group mb-5">
                        <label for="kategori_pm">Kategori PM</label>
                        <select class="form-control select2 @error('kategori_pm') is-invalid @enderror kategori_isp" style="width: 100%;" value="{{ old('kategori_pm') }}" name="kategori_pm">
                            <option value="Uji Batre" {{ $jadwal->kategori_pm == 'Uji Batre' ? 'selected' : '' }}>Uji Batre</option>
                            <option value="OLT" {{ $jadwal->kategori_pm == 'OLT' ? 'selected' : '' }}>OLT</option>
                            <option value="AC (Air Conditioner)" {{ $jadwal->kategori_pm == 'AC (Air Conditioner)' ? 'selected' : '' }}>AC (Air Conditioner)</option>
                            <option value="AC - Environment" {{ $jadwal->kategori_pm == 'AC - Environment' ? 'selected' : '' }}>AC - Environment</option>
                            <option value="Environment" {{ $jadwal->kategori_pm == 'Environment' ? 'selected' : '' }}>Environment</option>
                            <option value="AC - Environment - Uji Batre" {{ $jadwal->kategori_pm == 'AC - Environment - Uji Batre' ? 'selected' : '' }}>AC - Environment - Uji Batre</option>
                        </select>
                        @error('kategori_pm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                @endif
                <div class="form-group mb-5">
                    <label for="pop_id">Nama POP / Nam CPE PLN</label>
                    <select class="form-control select2 @error('pop_id') is-invalid @enderror" style="width: 100%"
                        value="{{ old('pop_id') }}" name="pop_id">
                        <option selected hidden value="-"></option>
                        @foreach ($pop as $row)
                            @if(old('pop_id',$jadwal->pop_id) == $row->id)
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
            </div>
            <div class="form-group mb-5" id="hostname" style="display: {{ $jadwal->kategori_pm == 'OLT' ? 'block' : 'none' }}">
                <label for="hostname">Hostname</label>
                <input type="text" class="form-control @error('hostname') is-invalid @enderror" id="hostname"
                    name="hostname" autocomplete="off" value="{{ old('hostname',$jadwal->hostname) }}">
                @error('hostname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="jenis_osp" style="display: {{ $jadwal->jenis_pm == 'OSP' ? 'block' : 'none' }}" id="jenis_osp">
                @if($jadwal->jenis_pm == "OSP")
                    <div class="form-group mb-5">
                        <label for="kategori_pm">Kategori PM</label>
                        <select class="form-control select2 @error('kategori_pm') is-invalid @enderror kategori_osp" style="width: 100%;" value="{{ old('kategori_pm') }}" name="kategori_pm">
                            <option value="IKR - Kabel DW" {{ $jadwal->kategori_pm == 'IKR - Kabel DW' ? 'selected' : '' }}>IKR - Kabel DW</option>
                            <option value="IKR - Kabel DW dan FAT" {{ $jadwal->kategori_pm == 'IKR - Kabel DW dan FAT' ? 'selected' : '' }}>IKR - Kabel DW dan FAT</option>
                            <option value="IKR - FAT" {{ $jadwal->kategori_pm == 'IKR - FAT' ? 'selected' : '' }}>IKR - FAT</option>
                            <option value="Jalur Feeder" {{ $jadwal->kategori_pm == 'Jalur Feeder' ? 'selected' : '' }}>Jalur Feeder</option>
                            <option value="Jalur Kabel TR/TM" {{ $jadwal->kategori_pm == 'Jalur Kabel TR/TM' ? 'selected' : '' }}>Jalur Kabel TR/TM</option>
                        </select>
                        @error('kategori_pm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                @endif
                <div class="form-group mb-5">
                    <label for="cluster">Nama Jalan / Cluster Perumahan</label>
                    <input type="text" class="form-control @error('cluster') is-invalid @enderror" id="cluster"
                        name="cluster"  autocomplete="off" value="{{ old('cluster',$jadwal->cluster) }}">
                    @error('cluster')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-5" id="id_fat" style="display: {{ $jadwal->kategori_pm == 'IKR - FAT' ? 'block' : 'none' }}">
                <label for="id_fat">ID FAT</label>
                <input type="text" class="form-control @error('id_fat') is-invalid @enderror" id="id_fat"
                    name="id_fat"  autocomplete="off" value="{{ old('id_fat',$jadwal->id_fat) }}">
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
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()

</script>
<script>
    document.querySelector('#jenis_pm').addEventListener('change', changeInput);

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
