@extends('layout.adminlte')

@section('style')
    
@endsection

@section('content')
{{-- @php
    var_dump($jadwal);
@endphp --}}
<div class="card p-4 mb-5">
    <div class=" d-flex justify-content-between align-items-center pb-3">
        <h5 class="p-0 m-0">Plan PM</h5>
        <div class="bungkus">
            
            <a href="/" class="btn btn-info btn-sm"><span class="d-flex justify-center align-items-center">Refresh<ion-icon name="refresh-outline" class="ml-1"></ion-icon></span></a>
            <button type="button" class="btn btn-info btn-sm px-2 float-right ml-1" data-toggle="modal" data-target="#filter">
                <span class="d-flex align-items-center justify-center">Date Filter<ion-icon name="calendar-outline" class="ml-1"></ion-icon></span>
            </button>
        </div>
        {{-- <a href="/jadwal/create" class="btn-sm btn-primary float-end px-4 ">Create</a> --}}
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover  py-2" id="example1">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
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

                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle"
                                data-toggle="dropdown">
                                Action
                            </button>
                            <ul class="dropdown-menu">
                                <li class="my-1">
                                    <a href="/jadwal/{{ $row->id }}/edit" class="dropdown-item">
                                        <span style="display: flex; align-items: center;">
                                            <ion-icon name="create-outline" class="mr-2"></ion-icon>
                                            </i>Edit
                                        </span>
                                    </a></li>
                                <li class="my-2">
                                    <button type="button" data-toggle="modal"
                                        data-target="#modal-default-{{ $row->id }}" class="dropdown-item"
                                        style="display: flex; align-items: center;">
                                        <ion-icon name="checkmark-done-outline" class="mr-2"></ion-icon>Realisasi
                                    </button>
                                </li>
                                <li class="my-1">
                                    <button type="button" data-toggle="modal" data-target="#modal-lg-{{ $row->id }}"
                                        class="dropdown-item" style="display: flex; align-items: center;">
                                        <ion-icon name="eye-outline" class="mr-2"></ion-icon>
                                        Detail
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </td> --}}
                    <td><span class="badge {{ $color }} px-3">{{ $row->status }}</span></td>
                    <td>{{ $row->plan }}</td>
                    {{-- <td>{{ $row->realisasi }}</td> --}}
                    <td>{{ $row->jenis_pm }}</td>
                    <td>{{ $row->wilayah }}</td>
                    <td>{{ $row->area }}</td>
                    @if ($row->pop_id == null)
                        <td>-</td>
                    @else
                        <td>{{ $row->pop->nama_pop }}</td>
                    @endif
                    <td>{{ $row->cluster }}</td>

                    {{-- <td>
                        <a href="/jadwal/{{ $row->id }}/edit">
                    <button type="button" class="btn btn-icon  btn-warning ">
                        <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em" viewBox="0 0 24 24">
                            <path
                                d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm-1-5L14 5l3 3L7 18H4v-3zM15 4l2-2l3 3l-2.001 2.001L15 4z"
                                fill="#ffffff" fill-rule="evenodd" />
                        </svg>
                    </button>
                    </a>
                    <form action="/jadwal/{{ $row->id }}" method="POST" style="display: inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-icon btn-danger confirmdelete" data-name="User"
                            id="confirmbutton">
                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M3 6h18" />
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                </g>
                            </svg>
                        </button>
                    </form>
                    </td> --}}
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
                    <div class="col-6 my-3">Status : <span class="badge {{ $color }} px-3">{{ $row->status }}</span></div>
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
                        <input type="date" class="form-control" id="realisasi" name="realisasi" required value="{{ old('realisasi') }}" autocomplete="off">
                        @error('realisasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="link_sharepoint">Link Sharepoint Laporan</label>
                        <textarea class="form-control @error('link_sharepoint') is-invalid @enderror" rows="5" id="link_sharepoint" name="link_sharepoint"
                        required value="{{ old('link_sharepoint') }}" autocomplete="off"></textarea>
                        @error('link_sharepoint')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-sm px-4 float-right" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm px-4 float-right">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<div class="modal fade" id="filter">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
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
                        <input type="date" class="form-control date-picker" id="exampleInputEmail1" placeholder="Dari Tanggal" name="dari" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">To</label>
                        <input type="date" class="form-control datepicker" id="exampleInputPassword1"
                        placeholder="Sampai Tanggal" name="sampai" value="{{ date('Y-m-d') }}" required>
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
  <!-- /.modal -->
@endsection

@section('script')

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endsection
@section('title')
<h1 style="font-weight: 600; letter-spacing: 2px" class="text-info text-center">DASHBOARD</h1>
@endsection