@extends('layout.adminlte')

@section('style')
<style>

</style>
@endsection

@section('content')
<div class="card p-4">
    <div class=" d-flex justify-content-between align-items-center pb-3">
        <h5 class="p-0 m-0">Jadwal</h5>
        <a href="/jadwal/create" class="btn-sm btn-info float-end px-4 ">Create</a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover  py-2" id="example1">
            <thead>
                <tr class="text-nowrap">
                    <th>ID</th>
                    <th class="notexport">Action</th>
                    <th>Status</th>
                    <th>Plan</th>
                    <th>Realisasi</th>
                    <th>Jenis PM</th>
                    <th class="hidden">Kategori PM</th>
                    <th class="hidden">Segmen</th>
                    <th>Wilayah</th>
                    <th>Area</th>
                    <th>Lokasi / POP</th>
                    <th class="hidden">Tipe POP</th>
                    <th>Nama Jalan / Cluster</th>
                    <th class="hidden">WO FSM+</th>
                    <th class="hidden">Link Sharepoint</th>
                    <th class="hidden">Temuan</th>
                    <th class="hidden">Temuan Improvement</th>
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

                        <td>{{ $row ->jadwal_id }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle"
                                    data-toggle="dropdown">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="my-1">
                                        @if ($row->status == 'Plan')
                                        <a href="/jadwal/{{ $row->id }}/edit" class="dropdown-item">
                                            <span style="display: flex; align-items: center;">
                                                <ion-icon name="create-outline" class="mr-2"></ion-icon>
                                                </i>Edit
                                            </span>
                                        </a>
                                        @endif
                                    </li>
                                    <li class="my-2">

                                        @if ($row->status == 'Plan')
                                        <button type="button" data-toggle="modal"
                                            data-target="#modal-default-{{ $row->id }}" class="dropdown-item"
                                            style="display: flex; align-items: center;">
                                            <ion-icon name="checkmark-done-outline" class="mr-2"></ion-icon>Realisasi
                                        </button>
                                        @endif
                                    </li>
                                    <li class="{{ $row->status == 'Realisasi' ? 'my-0 p-0 m-0 mt-0' : 'my-1' }}">
                                        <button type="button" data-toggle="modal" data-target="#modal-lg-{{ $row->id }}"
                                            class="dropdown-item" style="display: flex; align-items: center;">
                                            <ion-icon name="eye-outline" class="mr-2"></ion-icon>
                                            Detail
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </td>
                        <td style="color: white"><span class="badge {{ $color }} px-3"
                                style="color: white">{{ $row->status }}</span></td>
                        <td>{{ $row->plan }}</td>
                        <td>{{ $row->realisasi }}</td>
                        <td>{{ $row->jenis_pm }}</td>
                        <td>{{ $row->kategori_pm }}</td>
                        <td>{{ $row->segmen }}</td>
                        <td>{{ $row->wilayah }}</td>
                        <td>{{ $row->area }}</td>
                        {{-- @php
                         ddd($row->pop)   
                        @endphp --}}
                        @if ($row->pop_id == null)
                        <td>-</td>
                        @else
                        <td>{{ $row->pop->nama_pop }}</td>
                        @endif
                        @if ($row->pop_id == null)
                        <td>-</td>
                        @else
                        <td>{{ $row->pop->tipe_pop }}</td>
                        @endif
                        <td>{{ $row->cluster }}</td>
                        <td>{{ $row->wo_fsm }}</td>
                        <td>{{ $row->link_sharepoint }}</td>
                        <td>{{ $row->temuan }}</td>
                        <td>{{ $row->improvement }}</td>

                        {{-- <td>
                        <a href="/jadwal/{{ $row->id }}/edit">
                        <button type="button" class="btn btn-icon  btn-warning ">
                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em"
                                viewBox="0 0 24 24">
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
    <div class="modal fade" id="modal-lg-{{ $row->id }}">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info shadow-sm border-info">
                    <h5 class="modal-title" style="font-size: 20px">Detail Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="font-size: 16px">
                        <div class="col-6 my-3">ID : {{ $row->jadwal_id }}</div>
                        <div class="col-6 my-3">Plan : {{ $row->plan }}</div>
                        <div class="col-6 my-3">Realisasi : {{ $row->realisasi }}</div>
                        <div class="col-6 my-3">Status : <span class="badge {{ $color }} px-3">{{ $row->status }}</span>
                        </div>
                        <div class="col-6 my-3">WO FSM+ / IFast : {{ $row->wo_fsm }}</div>
                        <div class="col-6 my-3">Wilayah : {{ $row->wilayah }}</div>
                        <div class="col-6 my-3">Area : {{ $row->area }}</div>
                        <div class="col-6 my-3">Jenis PM : {{ $row->jenis_pm }}</div>
                        <div class="col-6 my-3">Kategori PM : {{ $row->kategori_pm }}</div>
                        <div class="col-6 my-3">Segmen PM : {{ $row->segmen }}</div>
                        <div class="col-6 my-3">Lokasi / POP : @if ($row->pop_id == null) - @else
                            {{ $row->pop->nama_pop }} @endif</div>
                        <div class="col-6 my-3">Tipe POP : @if ($row->pop_id == null) - @else {{ $row->pop->tipe_pop }}
                            @endif</div>
                        <div class="col-6 my-3">Nama Jalan / Cluster Perumahan : {{ $row->cluster }}</div>
                        <div class="col-6 my-3">Link Sharepoint Laporan : <a href="{{ $row->link_sharepoint }}"
                                target="_blank">{{ $row->link_sharepoint }}</a></div>
                        <div class="col-6 my-3">Temuan : {{ $row->temuan }}</div>
                        <div class="col-6 my-3">Temuan Improvement : {{ $row->improvement }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endforeach
    @foreach ($jadwal as $row)
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
                        <div class="form-group mt-1 mb-4">
                            <label for="realisasi">Tanggal Realisasi</label>
                            <input type="date" class="form-control" id="realisasi" name="realisasi" required
                                value="{{ old('realisasi') }}" autocomplete="off"
                                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            @error('realisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="link_sharepoint">Link Sharepoint Laporan</label>
                            <textarea class="form-control @error('link_sharepoint') is-invalid @enderror" rows="3"
                                id="link_sharepoint" name="link_sharepoint" required
                                value="{{ old('link_sharepoint') }}" autocomplete="off"></textarea>
                            @error('link_sharepoint')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="link_sharepoint">Temuan untuk di improve</label>
                            <div class="bungkus d-flex align-items-center">
                                <div class="form-check mr-3">
                                    <input class="form-check-input @error("temuan") is-invalid @enderror ada" type="radio" name="temuan" id="ada-{{ $row->id }}" value="Ada">
                                    <label class="form-check-label" for="ada-{{ $row->id }}">Ada</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error("temuan") is-invalid @enderror tidakada" type="radio" name="temuan" id="tidakada-{{ $row->id }}" value="Tidak ada">
                                    <label class="form-check-label" for="tidakada-{{ $row->id }}">Tidak ada</label>
                                </div>
                            </div>
                            @error('temuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2 mb-2 formImprovement" id="formImprovement" style="display: none">
                            <label for="improvement">Isikan temuan</label>
                            <input type="text" class="form-control" id="improvement" name="improvement"
                                value="-" autocomplete="off">
                            @error('improvement')
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

    <script>

        let rada = document.querySelectorAll('.ada');
        let rtidak = document.querySelectorAll('.tidakada');
        let improvement = document.querySelectorAll('.formImprovement')

        for( let i = 0; i < rada.length; i++){
            rada[i].addEventListener('click',function(){
                improvement[i].style.display = 'block'
            })
        }

        for( let j = 0; j < rtidak.length; j++){
            rtidak[j].addEventListener('click',function(){
                improvement[j].style.display = 'none'
            })
        }

        // rada.addEventListener("click",function(){
        //     improvement.style.display = "block";
        // });

        // rtidak.addEventListener("click",function(){
        //     improvement.style.display = "none";
        // })
    </script>

    @endsection
    @section('title')
    <h1 style="font-weight: 600; letter-spacing: 1px" class="text-info text-center">Plan & Realisasi PM</h1>

    @endsection
