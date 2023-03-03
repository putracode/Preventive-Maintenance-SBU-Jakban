@extends('layout.adminlte')

@section('style')
    <style>
        .bg-warning{
            color: white !important;
        }
    </style>
@endsection

@section('content')
<div class="card p-4">
    <div class=" d-flex justify-content-between align-items-center pb-3">
        <h5 class="p-0 m-0">Improvement</h5>
        <a href="/improvement/create" class="btn-sm btn-primary float-end px-4 ">Create</a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover  py-2" id="example1">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th class="notexport">Action</th>
                    <th>Status</th>
                    <th>Plan Improvement</th>
                    <th>Realisasi</th>
                    <th>Wilayah</th>
                    <th>Area</th>
                    <th>Dasar Improvement</th>
                    <th>ID Jadwal</th>
                    <th>Jenis Improvement</th>
                    <th>Kategori Improvement</th>
                    <th>Lokasi / POP</th>
                    <th>Nam Cpe PLN</th>
                    <th>Nama Jalan / Cluster</th>
                    <th class="hidden">Link Sharepoint</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($improvement as $row)
                @php
                $color = '';

                if($row->status == 'Plan Improve' && $row->plan > now()->format('Y-m-d')) {
                $color = 'bg-primary text-white';
                }elseif($row->status == 'Plan Improve' && $row->plan == now()->format('Y-m-d')) {
                $color = 'bg-warning text-white';
                }elseif($row->status == 'Plan Improve' && $row->plan < now()->format('Y-m-d')) {
                $color = 'bg-danger text-white';
                }elseif($row->status == 'Realisasi'){
                $color = 'bg-success text-white';
                }
                @endphp

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle"
                                    data-toggle="dropdown">
                                    Action
                                </button>
                                <ul class="dropdown-menu ">
                                    @can('admin')                                        
                                        @if ($row->status == 'Plan Improve')    
                                        <li class="">
                                            <a href="/improvement/{{ $row->id }}/edit" class="dropdown-item">
                                                <span style="display: flex; align-items: center;">
                                                    <ion-icon name="create-outline" class="mr-2"></ion-icon>
                                                    </i>Edit
                                                </span>
                                            </a>
                                        </li>
                                        @endif
                                    @endcan
                                    <li class="mt-1">

                                        @if ($row->status == 'Plan Improve')
                                        <button type="button" data-toggle="modal"
                                            data-target="#modal-default-{{ $row->id }}" class="dropdown-item"
                                            style="display: flex; align-items: center;">
                                            <ion-icon name="checkmark-done-outline" class="mr-2"></ion-icon>Realisasi
                                        </button>
                                        @endif
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
                        </td>
                        <td style="color: white"><span class="badge {{ $color }} px-3" style="color: white">{{ $row->status }}</span></td>
                        <td>{{ $row->plan }}</td>
                        <td>{{ $row->realisasi }}</td>
                        <td>{{ $row->wilayah }}</td>
                        <td>{{ $row->area }}</td>
                        <td>{{ $row->dasar_improvement }}</td>
                        <td>{{ $row->jadwal_id }}</td>
                        <td>{{ $row->jenis_improvement }}</td>
                        <td>{{ $row->kategori_improvement }}</td>
                        @if ($row->pop_id == null)
                            <td>-</td>
                        @else
                            <td>{{ $row->pop->nama_pop }}</td>
                        @endif
                        <td>{{ $row->nam_cpe_pln }}</td>
                        <td>{{ $row->cluster }}</td>
                        <td>{{ $row->link_sharepoint }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach ($improvement as $row)
@php
$color = '';

if($row->status == 'Plan Improve' && $row->plan > now()->format('Y-m-d')) {
$color = 'bg-primary text-white';
}elseif($row->status == 'Plan Improve' && $row->plan == now()->format('Y-m-d')) {
$color = 'bg-warning text-white';
}elseif($row->status == 'Plan Improve' && $row->plan < now()->format('Y-m-d')) {
    $color = 'bg-danger text-white';
    }elseif($row->status == 'Realisasi'){
    $color = 'bg-success text-white';
    }
    @endphp
    <div class="modal fade" id="modal-lg-{{ $row->id }}">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info shadow-sm border-info">
                    <h5 class="modal-title" style="font-size: 20px">Detail Improvement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="font-size: 16px">
                        <div class="col-6 my-3"><span class="detail-title">Plan :</span><span class="detail-value">{{ $row->plan }}</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Realisasi :</span><span class="detail-value">{{ $row->realisasi }}</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Status :</span><span class="badge {{ $color }} px-3" style="margin-left: 5px">{{ $row->status }}</span>
                        </div>
                        <div class="col-6 my-3"><span class="detail-title">Wilayah :</span><span class="detail-value">{{ $row->wilayah }}</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Area :</span><span class="detail-value">{{ $row->area }}</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Dasar Improvement :</span><span class="detail-value">{{ $row->dasar_improvement }}</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Jenis Improvement :</span><span class="detail-value">{{ $row->jenis_improvement }}</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Kategori Improvement :</span><span class="detail-value">{{ $row->kategori_improvement }}</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Nama POP / CPE PLN :</span><br><span class="detail-value" style="margin-left: 0px">@if ($row->pop_id == null) - @else {{ $row->pop->nama_pop }} @endif</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Nama Jalan / Cluster :</span><span class="detail-value">{{ $row->cluster }}</span></div>
                        <div class="col-6 my-3"><span class="detail-title">Link Sharepoint Laporan :</span><span class="detail-value">{{ $row->link_sharepoint }}</span></div>
                        {{-- <div class="col-6 my-3">Plan : {{ $row->plan }}</div>
                        <div class="col-6 my-3">Realisasi : {{ $row->realisasi }}</div>
                        <div class="col-6 my-3">Status : <span class="badge {{ $color }} px-3">{{ $row->status }}</span>
                        </div>
                        <div class="col-6 my-3">Wilayah : {{ $row->wilayah }}</div>
                        <div class="col-6 my-3">Area : {{ $row->area }}</div>
                        <div class="col-6 my-3">Dasar Improvement : {{ $row->dasar_improvement }}</div>
                        <div class="col-6 my-3">Jenis Improvement : {{ $row->jenis_improvement }}</div>
                        <div class="col-6 my-3">Kategori Improvement : {{ $row->kategori_improvement }}</div>
                        <div class="col-6 my-3">Lokasi / POP : @if ($row->pop_id == null)
                            <td>-</td>
                        @else
                            <td>{{ $row->pop->nama_pop }}</td>
                        @endif</div>
                        <div class="col-6 my-3">Nama Jalan / Cluster : {{ $row->cluster }}</div>
                        <div class="col-6 my-3">Link Sharepoint Laporan : <a href="{{ $row->link_sharepoint }}"
                                target="_blank">{{ $row->link_sharepoint }}</a></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default-{{ $row->id }}">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-size: 20px">Realisasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/improvement/{{ $row->id }}/realisasi" method="POST">
                        @csrf
                        @if (auth()->user()->role == 'admin')
                        <div class="form-group mt-1 mb-5">
                            <label for="realisasi">Tanggal Realisasi</label>
                            <input type="date" class="form-control" id="realisasi" name="realisasi" required
                                value="{{ old('realisasi') }}" autocomplete="off">
                            @error('realisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @else
                        <div class="form-group mt-1 mb-5">
                            <label for="realisasi">Tanggal Realisasi</label>
                            <input type="date" class="form-control" id="realisasi" name="realisasi" required
                                value="{{ old('realisasi') }}" autocomplete="off"
                                min="{{ \Carbon\Carbon::now()->subDays(2)->format('Y-m-d') }}">
                            @error('realisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label for="link_sharepoint">Link Sharepoint Laporan</label>
                            <textarea class="form-control @error('link_sharepoint') is-invalid @enderror" rows="5"
                                id="link_sharepoint" name="link_sharepoint" required
                                value="{{ old('link_sharepoint') }}" autocomplete="off"></textarea>
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
    @endsection

    @section('script')

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @endsection
    @section('title')
    <h1 style="font-weight: 600; letter-spacing: 1px" class="text-info text-center">Improvement Plan & Realisasi</h1>

    @endsection
