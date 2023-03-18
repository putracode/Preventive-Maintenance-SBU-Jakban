@extends('layout.adminlte')
@section('style')

<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
@endsection
@section('content')

<div class="card card-info" style="margin-top: -20px; margin-bottom: 50px;">
    <div class="card-header">
        <h3 class="card-title">Improvement PM</h3>
    </div>
    <form action="/temuan" method="POST">
        @csrf
        <div class="card-body">
            <input type="hidden" name="id" value="{{ $temuan->id }}">
            <div class="form-group mb-5">
                <label for="jadwal_id">ID Jadwal</label>
                <input type="text" class="form-control @error('jadwal_id') is-invalid @enderror" id="jadwal_id" name="jadwal_id"
                    required value="{{ old('jadwal_id',$temuan->jadwal_id) }}" autocomplete="off" readonly>
                @error('jadwal_id') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if (auth()->user()->role == 'admin')
            <div class="form-group mb-5">
                <label for="plan">Plan Improve</label>
                <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan',$temuan->plan) }}" autocomplete="off">
                @error('plan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @else
                <div class="form-group mb-5">
                    <label for="plan">Plan Improve</label>
                    <input type="date" class="form-control @error('plan') is-invalid @enderror" id="plan" name="plan" required value="{{ old('plan',$temuan->plan) }}" autocomplete="off" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    @error('plan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            @endif
            {{-- <div class="form-group mb-5">
                <label for="wo_fsm">WO FSM+ / IFast</label>
                <input type="text" class="form-control @error('wo_fsm') is-invalid @enderror" id="wo_fsm" name="wo_fsm" required value="{{ old('wo_fsm',$temuan->wo_fsm) }}" autocomplete="off">
                @error('wo_fsm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> --}}
            <div class="form-group mb-5">
                <label for="wilayah">Wilayah</label>
                <select class="form-control select2 @error('wilayah') is-invalid @enderror" required
                    value="{{ old('wilayah') }}" id="wilayah" name="wilayah" disabled>
                    <option value="HAR BDB" {{ $temuan->wilayah == 'HAR BDB' ? 'selected' : '' }}>HAR BDB</option>
                    <option value="HAR JAKARTA" {{ $temuan->wilayah == 'HAR JAKARTA' ? 'selected' : '' }}>HAR JAKARTA</option>
                </select>
                {{-- {{ dd($temuan->wilayah) }} --}}
                <input type="hidden" name="wilayah" value="{{ $temuan->wilayah }}">
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
                    <option value="Bekasi Kabupaten" {{ $temuan->area == 'Bekasi Kabupaten' ? 'selected' : '' }}>Bekasi Kabupaten</option>
                    <option value="Bekasi Kota" {{ $temuan->area == 'Bekasi Kota' ? 'selected' : '' }}>Bekasi Kota</option>
                    <option value="Bogor Kabupaten" {{ $temuan->area == 'Bogor Kabupaten' ? 'selected' : '' }}>Bogor Kabupaten</option>
                    <option value="Bogor Kota" {{ $temuan->area == 'Bogor Kota' ? 'selected' : '' }}>Bogor Kota</option>
                    <option value="Depok Kota" {{ $temuan->area == 'Depok Kota' ? 'selected' : '' }}>Depok Kota</option>
                    <option value="Jakarta Barat" {{ $temuan->area == 'Jakarta Barat' ? 'selected' : '' }}>Jakarta Barat</option>
                    <option value="Jakarta Pusat" {{ $temuan->area == 'Jakarta Pusat' ? 'selected' : '' }}>Jakarta Pusat</option>
                    <option value="Jakarta Selatan" {{ $temuan->area == 'Jakarta Selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                    <option value="Jakarta Timur" {{ $temuan->area == 'Jakarta Timur' ? 'selected' : '' }}>Jakarta Timur</option>
                    <option value="Jakarta Utara" {{ $temuan->area == 'Jakarta Utara' ? 'selected' : '' }}>Jakarta Utara</option>
                    <option value="Tangerang Kabupaten" {{ $temuan->area == 'Tangerang Kabupaten' ? 'selected' : '' }}>Tangerang Kabupaten</option>
                    <option value="Tangerang Kota" {{ $temuan->area == 'Tangerang Kota' ? 'selected' : '' }}>Tangerang Kota</option>
                    <option value="Tangerang Selatan" {{ $temuan->area == 'Tangerang Selatan' ? 'selected' : '' }}>Tangerang Selatan</option>
                    <option value="Pandeglang Kabupaten" {{ $temuan->area == 'Pandeglang Kabupaten' ? 'selected' : '' }}>Pandeglang Kabupaten</option>
                    <option value="Serang Kabupaten" {{ $temuan->area == 'Serang Kabupaten' ? 'selected' : '' }}>Serang Kabupaten</option>
                    <option value="Serang Kota" {{ $temuan->area == 'Serang Kota' ? 'selected' : '' }}>Serang Kota</option>
                    <option value="Cilegon Kota" {{ $temuan->area == 'Cilegon Kota' ? 'selected' : '' }}>Cilegon Kota</option>
                    <option value="Lebak Kabupaten" {{ $temuan->area == 'Lebak Kabupaten' ? 'selected' : '' }}>Lebak Kabupaten</option>
                </select>
                <input type="hidden" name="area" value="{{ $temuan->area }}">
                @error('area')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="dasar_improvement">Dasar Improvement</label>
                <select class="form-control select2 @error('dasar_improvement') is-invalid @enderror" required
                    value="{{ old('dasar_improvement') }}" id="dasar_improvement" name="dasar_improvement" disabled>
                    <option value="Hasil PM" selected>Hasil PM</option>
                </select>
                <input type="hidden" name="dasar_improvement" value="Hasil PM">
                @error('dasar_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label for="jenis_improvement">Jenis Improvement</label>
                <select class="form-control @error('jenis_improvement') is-invalid @enderror" style="width: 100%;" required value="{{ old('jenis_improvement') }}" id="jenis_improvement" name="jenis_improvement" disabled>
                    <option value="ISP" {{ $temuan->jenis_pm == 'ISP' ? 'selected' : '' }}>ISP</option>
                    <option value="CPE PLN" {{ $temuan->jenis_pm == 'CPE PLN' ? 'selected' : '' }}>CPE PLN</option> 
                    <option value="OSP" {{ $temuan->jenis_pm == 'OSP' ? 'selected' : '' }}>OSP</option>
                </select>
                <input type="hidden" name="jenis_improvement" value="{{ $temuan->jenis_pm }}">
                @error('jenis_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="kategori_improvement">Kategori Improvement</label>
                <select class="form-control select2 @error('kategori_improvement') is-invalid @enderror" required
                    value="{{ old('kategori_improvement') }}" id="kategori_improvement" name="kategori_improvement" disabled>
                    {{-- <option selected hidden disabled></option> --}}
                    <option value="Jalur Kabel" {{ $temuan->kategori_improvement == 'Jalur Kabel' ? 'selected' : '' }}>Jalur Kabel</option>
                    <option value="Utilitas (FDT,FAT,JB,dll)" {{ $temuan->kategori_improvement == 'Utilitas (FDT,FAT,JB,dll)' ? 'selected' : '' }}>Utilitas (FDT,FAT,JB,dll)</option>
                    <option value="Batre" {{ $temuan->kategori_improvement == 'Batre' ? 'selected' : '' }}>Batre</option>
                    <option value="Rectifier" {{ $temuan->kategori_improvement == 'Rectifier' ? 'selected' : '' }}>Rectifier</option>
                    <option value="Perangkat" {{ $temuan->kategori_improvement == 'Perangkat' ? 'selected' : '' }}>Perangkat</option>
                    <option value="AC" {{ $temuan->kategori_improvement == 'AC' ? 'selected' : '' }}>AC</option>
                    <option value="OLT" {{ $temuan->kategori_improvement == 'OLT' ? 'selected' : '' }}>OLT</option>
                    <input type="hidden" name="kategori_improvement" value="{{ $temuan->kategori_improvement }}">
                </select>
                @error('kategori_improvement')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5" style="display: none;" id="hostnamee">
                <label for="hostname">Hostname</label>
                <input type="text" class="form-control @error('hostname') is-invalid @enderror" id="hostname" name="hostname" required value="{{ old('hostname',$temuan->hostname) }}" autocomplete="off" readonly>
                @error('hostname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="pop_id">Nama Pop / Nama CPE PLN</label>
                <select class="form-control select2 @error('pop_id') is-invalid @enderror" style="width: 100%"
                    value="{{ old('pop_id') }}" name="pop_id" disabled>
                    <option selected hidden value="-">-</option>
                    @foreach ($pop as $row)
                            @if(old('pop_id',$temuan->pop_id) == $row->id)
                                <option value="{{ $row->id }}" selected>{{ $row->nama_pop }}</option>
                            @else
                                <option value="{{ $row->id }}">{{ $row->nama_pop }}</option>
                            @endif
                    @endforeach
                    @if ($temuan->pop_id == null)
                        <input type="hidden" name="pop_id" value="-">
                    @else
                        <input type="hidden" name="pop_id" value="{{ $temuan->pop_id }}">
                    @endif
                </select>
                @error('pop_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="cluster">Nama Jalan / Cluster Perumahan / No Tower</label>
                <input type="text" class="form-control @error('cluster') is-invalid @enderror" id="cluster" name="cluster" required value="{{ old('cluster',$temuan->cluster) }}" autocomplete="off" readonly>
                @error('cluster')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <label for="catatan">Catatan</label>
                {{-- <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" required value="{{ old('catatan',$temuan->catatan) }}" autocomplete="off" readonly> --}}
                <textarea name="catatan" id="catatan" rows="4" class="form-control @error('catatan') is-invalid @enderror" autocomplete="off">{{ old('catatan',$temuan->catatan) }}</textarea>
                @error('catatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right ml-3" id="submitButton">Submit</button>
                <a href="/temuan" class="btn btn-danger btn-sm px-4 float-right">Cancel</a>
            </div>
    </form>
</div>
@endsection
@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()
    let selected = $('#kategori_improvement').val()
    // console.log(selected);
    if(selected == 'OLT'){
        $('#hostnamee').css('display','block');
    }else{
        $('#hostnamee').css('display','none');
    }
</script>

@endsection
