@extends('layout.adminlte')

@section('style')
{{-- <style>
    *{
    border:1px solid;
}
</style> --}}
@endsection

@section('content')

<div class="row mb-3">
    <div class="col-lg-3 col-xl-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 14px">Total Plan PM</span>
                    <span class="info-box-number">
                      {{ $totalData }}
                      <small>PM</small>
                    </span>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-xl-10">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-check"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 14px">Total Realisasi</span>
                    <span class="info-box-number">
                        {{ $totalReal }} / {{ $totalData }}
                      <small>PM</small>
                      <span style="float: right;">
                        {{ number_format($totalReal / $totalData * 100) }}%
                      </span>
                    </span>
                  </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-database"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 14px">Total OSP</span>
                    <span class="info-box-number">
                        {{ $totalOsp }} / {{ $totalReal }}
                      <small>PM</small>
                      <span style="float: right;">
                        {{ number_format($totalOsp / $totalReal * 100) }}%
                      </span>
                    </span>
                  </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-database"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 14px">Total ISP</span>
                    <span class="info-box-number">
                        {{ $totalIsp }} / {{ $totalReal }}
                      <small>PM</small>
                      <span style="float: right;">
                        {{ number_format($totalIsp / $totalReal * 100) }}%
                      </span>
                    </span>
                  </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-database"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 14px">Total CPE PLN </span>
                    <span class="info-box-number">
                        {{ $totalCPEPLN }} / {{ $totalReal }}
                      <small>PM</small>
                      <span style="float: right">
                        {{ number_format($totalCPEPLN / $totalReal * 100) }}%
                      </span>
                    </span>
                  </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row mb-3">
    <div class="col-6">
        <div class="col-12 rounded bg-info d-flex justify-content-center align-items-center" style="height: 35px">
            <p class="text-center mb-0">Jumlah POP : {{ count($popsb) + count($popb) + count($popd) + count($popa) }}</p>
        </div>
    </div>
    <div class="col-6">
        <div class="col-12 rounded bg-info d-flex justify-content-center align-items-center" style="height: 35px">
            <p class="text-center mb-0">Jumlah CPE PLN : {{ count($popc) }}</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="bg-info d-flex justify-content-center align-items-center py-1 mb-4">POP S-BACKBONE</p> 
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($popsb) }}</div>
                            <p style="font-size: 10px; text-align: center">TOTAL</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info m-auto rounded-circle">{{ count($popsb) * 4 }}</div>
                            <p style="font-size: 10px; text-align: center" class="mt-3">TARGET PERTAHUN</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($poprsb) }}</div>
                            <p style="font-size: 10px; text-align: center">REALISASI</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <b>
                    Persentase : {{ round(count($poprsb) * 100 / (count($popsb) * 4)) }} %
                </b>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="bg-info d-flex justify-content-center align-items-center py-1 mb-4">POP BACKBONE</p> 
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($popb) }}</div>
                            <p style="font-size: 10px; text-align: center">TOTAL</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info m-auto rounded-circle">{{ count($popb) * 2 }}</div>
                            <p style="font-size: 10px; text-align: center" class="mt-3">TARGET PERTAHUN</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($poprb) }}</div>
                            <p style="font-size: 10px; text-align: center">REALISASI</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <b>
                    Persentase : {{ round(count($poprb) * 100 / (count($popb) * 2)) }} %
                </b>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="bg-info d-flex justify-content-center align-items-center py-1 mb-4">POP DISTRIBUSI</p> 
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($popd) }}</div>
                            <p style="font-size: 10px; text-align: center">TOTAL</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info m-auto rounded-circle">{{ count($popd) * 1 }}</div>
                            <p style="font-size: 10px; text-align: center" class="mt-3">TARGET PERTAHUN</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($poprd) }}</div>
                            <p style="font-size: 10px; text-align: center">REALISASI</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <b>
                    Persentase : {{ round(count($poprd) * 100 / (count($popd) * 1)) }} %
                </b>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="bg-info d-flex justify-content-center align-items-center py-1 mb-4">POP AKSES</p> 
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($popa) }}</div>
                            <p style="font-size: 10px; text-align: center">TOTAL</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info m-auto rounded-circle">{{ count($popa) * 1 }}</div>
                            <p style="font-size: 10px; text-align: center" class="mt-3">TARGET PERTAHUN</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($popra) }}</div>
                            <p style="font-size: 10px; text-align: center">REALISASI</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <b>
                    Persentase : {{ round(count($popra) * 100 / (count($popa) * 1)) }} %
                </b>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="bg-info d-flex justify-content-center align-items-center py-1 mb-4">CPE PLN</p> 
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($popc) }}</div>
                            <p style="font-size: 10px; text-align: center">TOTAL</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info m-auto rounded-circle">{{ count($popc) * 1 }}</div>
                            <p style="font-size: 10px; text-align: center" class="mt-3">TARGET PERTAHUN</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle mb-3">{{ count($poprc) }}</div>
                            <p style="font-size: 10px; text-align: center">REALISASI</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <b>
                    Persentase : {{ round(count($poprc) * 100 / (count($popc) * 1)) }} %
                </b>
            </div>
        </div>
    </div>
</div>
<div class="float-end">
    <div class="row d-flex align-items-start justify-content-end mb-4">

        <a href="/dashboard" class="btn btn-info btn-sm"><span class="d-flex justify-center align-items-center">Refresh
        <ion-icon name="refresh-outline" class="ml-1"></ion-icon></span></a>

        <button type="button" class="btn btn-info btn-sm px-2 ml-2" data-toggle="modal"
        data-target="#filter">
            <span class="d-flex align-items-center justify-center">Date Filter<ion-icon name="calendar-outline"
            class="ml-1"></ion-icon></span>
        </button>

        {{-- <button type="button" class="btn btn-info btn-sm px-2 ml-2" data-toggle="modal"
        data-target="#filterMonth">
            <span class="d-flex align-items-center justify-center">Month Filter<ion-icon name="calendar-outline"
            class="ml-1"></ion-icon></span>
        </button>    --}}
    </div>
</div>

<figure class="highcharts-figure">
    <div id="chart" style="height: 600px"></div>
</figure>

<div class="card p-4 mb-5">
    <div class=" d-flex justify-content-between align-items-center pb-3">
        <h5 class="p-0 m-0">Plan PM</h5>
        <div class="bungkus">

            
        </div>
        {{-- <a href="/jadwal/create" class="btn-sm btn-primary float-end px-4 ">Create</a> --}}
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover  py-2" id="example1">
            <thead>
                <tr class="text-nowrap">
                    <th>ID</th>
                    <th>Status</th>
                    <th>Plan</th>
                    {{-- <th>Realisasi</th> --}}
                    <th>Jenis PM</th>
                    <th>Wilayah</th>
                    <th>Area</th>
                    <th>Lokasi / POP</th>
                    <th>Nama Jalan / Cluster</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($jadwal as $row)
                @php
                $color = '';

                if($row->status == 'Plan' && $row->plan > now()->format('Y-m-d')) {
                $color = 'bg-primary text-white';
                }elseif($row->status == 'Plan' && $row->plan == now()->format('Y-m-d')) {
                $color = 'bg-warning text-white';
                }elseif($row->status == 'Plan' && $row->plan < now()->format('Y-m-d')) {
                    $color = 'bg-danger text-white';
                    }elseif($row->status == 'Realisasi'){
                    $color = 'bg-success text-white';
                    }
                    @endphp
                    <tr>

                        <td>{{ $row->jadwal_id }}</td>
                        <td><span class="badge {{ $color }} px-3">{{ $row->status }}</span></td>
                        <td>{{ $row->plan }}</td>
                        {{-- <td>{{ $row->realisasi }}</td> --}}
                        <td>{{ $row->jenis_pm }}</td>
                        <td>{{ $row->wilayah }}</td>
                        <td>{{ $row->area }}</td>
                        @if ($row->pop_id == null)
                        <td>-</td>
                        @else
                        <td>{{ $row->pop->nama_pop ?? '-' }}</td>
                        @endif
                        <td>{{ $row->cluster }}</td>

                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach ($jadwal as $row)
@php
$color = '';

if($row->status == 'Plan') {
$color = 'bg-label-warning';
}elseif($row->status == 'On Progress') {
$color = 'bg-label-secondary';
}elseif($row->status == 'Realisasi'){
$color = 'bg-label-success';
}
@endphp
<div class="modal fade" id="modal-lg-{{ $row->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary shadow-sm border-secondary">
                <h5 class="modal-title" style="font-size: 20px">Detail Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="font-size: 16px">
                    <div class="col-6 my-3">Plan : {{ $row->plan }}</div>
                    <div class="col-6 my-3">Realisasi : {{ $row->realisasi }}</div>
                    <div class="col-6 my-3">Status : <span class="badge {{ $color }} px-3">{{ $row->status }}</span>
                    </div>
                    <div class="col-6 my-3">WO FSM+ / IFast : {{ $row->wo_fsm }}</div>
                    <div class="col-6 my-3">Wilayah : {{ $row->wilayah }}</div>
                    <div class="col-6 my-3">Area : {{ $row->area }}</div>
                    <div class="col-6 my-3">Jenis PM : {{ $row->jenis_pm }}</div>
                    <div class="col-6 my-3">Kategori PM : {{ $row->kategori_pm }}</div>
                    <div class="col-6 my-3">Lokasi / POP : {{ $row->nama_pop }}</div>
                    <div class="col-6 my-3">Nama Jalan / Cluster : {{ $row->cluster }}</div>
                    <div class="col-6 my-3">Link Sharepoint Laporan : <a href="{{ $row->link_sharepoint }}"
                            target="_blank">{{ $row->link_sharepoint }}</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-default-{{ $row->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-size: 20px">Realisasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/jadwal/{{ $row->id }}/realisasi" method="POST">
                    @csrf
                    <div class="form-group mt-2 mb-4">
                        <label for="link_sharepoint">Tanggal Realisasi</label>
                        <input type="date" class="form-control" id="realisasi" name="realisasi" required
                            value="{{ old('realisasi') }}" autocomplete="off">
                        @error('realisasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="link_sharepoint">Link Sharepoint Laporan</label>
                        <textarea class="form-control @error('link_sharepoint') is-invalid @enderror" rows="5"
                            id="link_sharepoint" name="link_sharepoint" required value="{{ old('link_sharepoint') }}"
                            autocomplete="off"></textarea>
                        @error('link_sharepoint')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger btn-sm px-4 float-right"
                    data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-sm px-4 float-right">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<div class="modal fade" id="filter">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" style="font-size: 20px">Date Filter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/filter" method="GET">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">From</label>
                            <input type="date" class="form-control date-picker" id="exampleInputEmail1"
                                placeholder="Dari Tanggal" name="from" value="{{ request('from') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">To</label>
                            <input type="date" class="form-control datepicker" id="exampleInputPassword1"
                                placeholder="Sampai Tanggal" name="to" value="{{ request('to') }}" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger px-5 btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary px-5 btn-sm">Filter</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="filterMonth">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" style="font-size: 20px">Month Filter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/filter" method="GET">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">From</label>
                            <input type="month" class="form-control date-picker" id="exampleInputEmail1"
                                placeholder="Dari Tanggal" name="from" value="{{ request('from') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">To</label>
                            <input type="month" class="form-control datepicker" id="exampleInputPassword1"
                                placeholder="Sampai Tanggal" name="to" value="{{ request('to') }}" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger px-5 btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary px-5 btn-sm">Filter</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('script')

<script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    var plan1 = <?php echo json_encode($plan1) ?>;
    var plan2 = <?php echo json_encode($plan2) ?>;
    var plan3 = <?php echo json_encode($plan3) ?>;
    var plan4 = <?php echo json_encode($plan4) ?>;
    var plan5 = <?php echo json_encode($plan5) ?>;
    var plan6 = <?php echo json_encode($plan6) ?>;
    var plan7 = <?php echo json_encode($plan7) ?>;
    var plan8 = <?php echo json_encode($plan8) ?>;
    var plan9 = <?php echo json_encode($plan9) ?>;
    var plan10 = <?php echo json_encode($plan10) ?>;
    var plan11 = <?php echo json_encode($plan11) ?>;
    var plan12 = <?php echo json_encode($plan12) ?>;
    var plan13 = <?php echo json_encode($plan13) ?>;
    var plan14 = <?php echo json_encode($plan14) ?>;
    var plan15 = <?php echo json_encode($plan15) ?>;
    var plan16 = <?php echo json_encode($plan16) ?>;
    var plan17 = <?php echo json_encode($plan17) ?>;
    var plan18 = <?php echo json_encode($plan18) ?>;
    var realisasi1 = <?php echo json_encode($realisasi1) ?>;
    var realisasi2 = <?php echo json_encode($realisasi2) ?>;
    var realisasi3 = <?php echo json_encode($realisasi3) ?>;
    var realisasi4 = <?php echo json_encode($realisasi4) ?>;
    var realisasi5 = <?php echo json_encode($realisasi5) ?>;
    var realisasi6 = <?php echo json_encode($realisasi6) ?>;
    var realisasi7 = <?php echo json_encode($realisasi7) ?>;
    var realisasi8 = <?php echo json_encode($realisasi8) ?>;
    var realisasi9 = <?php echo json_encode($realisasi9) ?>;
    var realisasi10 = <?php echo json_encode($realisasi10) ?>;
    var realisasi11 = <?php echo json_encode($realisasi11) ?>;
    var realisasi12 = <?php echo json_encode($realisasi12) ?>;
    var realisasi13 = <?php echo json_encode($realisasi13) ?>;
    var realisasi14 = <?php echo json_encode($realisasi14) ?>;
    var realisasi15 = <?php echo json_encode($realisasi15) ?>;
    var realisasi16 = <?php echo json_encode($realisasi16) ?>;
    var realisasi17 = <?php echo json_encode($realisasi17) ?>;
    var realisasi18 = <?php echo json_encode($realisasi18) ?>;
    

   Highcharts.chart('chart', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Pencapaian Preventive Maintenance Per Area'
    },
    xAxis: {
        categories: ['Bekasi Kabupaten','Bekasi Kota','Bogor Kabupaten','Bogor Kota','Depok Kota','Jakarta Barat','Jakarta Pusat','Jakarta Selatan','Jakarta Timur','Jakarta Utara','Tangerang Kabupaten','Tangerang Kota','Tangerang Selatan','Pandeglang Kabupaten','Serang Kabupaten','Serang Kota','Cilegon Kota','Lebak Kabupaten']
    },
    yAxis: {
        min: 0,
        // title: {
        //     text: 'Banyak PM'
        // }
        title : false
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'Plan',
        data: [plan1,plan2,plan3,plan4,plan5,plan6,plan7,plan8,plan9,plan10,plan11,plan12,plan13,plan14,plan15,plan16,plan17,plan18],
        color: '#007bff',
    }, {
        name: 'Realisasi',
        data: [realisasi1,realisasi2,realisasi3,realisasi4,realisasi5,realisasi6,realisasi7,realisasi8,realisasi9,realisasi10,realisasi11,realisasi12,realisasi13,realisasi14,realisasi15,realisasi16,realisasi17,realisasi18],
        color: '#28a745',
    }]
});

</script>

@endsection

@section('title')
@if(!request('from'))

<h1 style="font-weight: 600; letter-spacing: 2px" class="text-info text-center mb-2">DASHBOARD PM SBU JAKBAN</h1>
@endif
@if (request('from'))
<h1 style="font-weight: 600; letter-spacing: 2px" class="text-info text-center">DASHBOARD PM SBU JAKBAN</h1>
<h1 style="font-weight: 600; letter-spacing: 1px" class="text-info text-center mb-2">{{ request('from') }} / {{ request('to') }}</h1>
@endif
@endsection
