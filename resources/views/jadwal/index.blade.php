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
                    <th class="hidden">Hostname</th>
                    <th class="hidden">ID FAT</th>
                    <th class="hidden">Segmen</th>
                    <th>Wilayah</th>
                    <th>Area</th>
                    <th>Nama POP / CPE PLN</th>
                    <th class="hidden">Tipe POP</th>
                    <th class="hidden">Nama Jalan / Cluster Perumahan / Segmen ADSS LS</th>
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

                                    @if ($row->status == 'Plan')
                                    <li class="my-1">

                                        <button type="button" data-toggle="modal"
                                            data-target="#modal-default-{{ $row->id }}" class="dropdown-item"
                                            style="display: flex; align-items: center;">
                                            <ion-icon name="checkmark-done-outline" class="mr-2"></ion-icon>Realisasi
                                        </button>
                                    </li>
                                    @endif
                                        <li class="{{ $row->status == 'Realisasi' ? 'my-1 p-0 m-0 mt-0' : 'my-1' }}">
                                        <button type="button" data-toggle="modal" data-target="#modal-lg-{{ $row->id }}"
                                            class="dropdown-item" style="display: flex; align-items: center;">
                                            <ion-icon name="eye-outline" class="mr-2"></ion-icon>
                                            Detail
                                        </button>
                                    </li>
                                    @can('admin')

                                    <li class="my-1">
                                        <a href="/jadwal/{{ $row->id }}/edit" class="dropdown-item">
                                            <span style="display: flex; align-items: center;">
                                                <ion-icon name="create-outline" class="mr-2"></ion-icon>
                                                </i>Edit
                                            </span>
                                        </a>
                                    </li>

                                        <li class="{{ $row->status == 'Realisasi' ? 'my-1 p-0 m-0 mt-0' : 'my-1' }}">
                                            <form action="/jadwal/{{ $row->id }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="dropdown-item confirmdelete" data-name="Data" id="confirmbutton">
                                                    <span style="display: flex; align-items: center;">
                                                        <ion-icon name="trash-outline" class="mr-2"></ion-icon>Delete
                                                    </span>
                                                </button>
                                            </form>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </td>
                        <td style="color: white"><span class="badge {{ $color }} px-3"
                                style="color: white">{{ $row->status }}</span></td>
                        <td>{{ $row->plan }}</td>
                        <td>{{ $row->realisasi }}</td>
                        <td>{{ $row->jenis_pm }}</td>
                        <td>{{ $row->kategori_pm }}</td>
                        <td>{{ $row->hostname }}</td>
                        <td>{{ $row->id_fat }}</td>
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
                        <div class="col-4 my-3"><span class="detail-title">ID :</span><span class="detail-value">{{ $row->jadwal_id }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Plan :</span><span class="detail-value">{{ $row->plan }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Realisasi :</span><span class="detail-value">{{ $row->realisasi }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Status :</span><span class="badge {{ $color }} px-3" style="margin-left: 5px">{{ $row->status }}</span>
                        </div>
                        <div class="col-4 my-3"><span class="detail-title">WO FSM+ / IFast :</span><span class="detail-value">{{ $row->wo_fsm }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Wilayah :</span><span class="detail-value">{{ $row->wilayah }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Area :</span><span class="detail-value">{{ $row->area }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Jenis PM :</span><span class="detail-value">{{ $row->jenis_pm }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Kategori PM :</span><span class="detail-value">{{ $row->kategori_pm }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Segmen PM :</span><span class="detail-value">{{ $row->segmen }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Hostname :</span><span class="detail-value">{{ $row->hostname }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">ID FAT :</span><span class="detail-value">{{ $row->id_fat }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Nama POP / CPE PLN :</span><br><span class="detail-value" style="margin-left: 0px">@if ($row->pop_id == null) - @else {{ $row->pop->nama_pop }} @endif</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Tipe POP :</span><span class="detail-value">@if ($row->pop_id == null) - @else {{ $row->pop->tipe_pop }} @endif</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Nama Jalan / Cluster Perumahan :</span><span class="detail-value" style="margin-left: 0px">{{ $row->cluster }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Link Sharepoint Laporan :</span><br><span class="detail-value" style="margin-left: 0px"><a href="{{ $row->link_sharepoint }}" target="_blank">{{ $row->link_sharepoint }}</a></span></div>
                        <div class="col-4 my-3"><span class="detail-title">Temuan :</span><span class="detail-value">{{ $row->temuan }}</span></div>
                        <div class="col-4 my-3"><span class="detail-title">Temuan Improvement :</span><span class="detail-value">{{ $row->improvement }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endforeach
    @foreach ($jadwal as $row)
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
                    <form action="/jadwal/{{ $row->id }}/realisasi" method="POST">
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
                                min="{{ \Carbon\Carbon::parse($row->plan)->subDays(30)->format('Y-m-d') }}">
                            @error('realisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @endif
                        <div class="form-group mb-5">
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
                        <div class="form-group mb-5">
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
                        <div class="form-group mt-2 mb-5 formImprovement" id="formImprovement" style="display: none">
                            <label for="improvement">Isikan temuan</label>
                            <input type="text" class="form-control" id="improvement" name="improvement"
                                value="-" autocomplete="off">
                            @error('improvement')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2 mb-5 kategoriImprovement" id="kategoriImprovement" style="display: none">
                            <label for="kategori_improvement">Kategori Improvement</label>
                            <select class="form-control select2 @error('kategori_improvement') is-invalid @enderror" value="{{ old('kategori_improvement') }}" id="kategori_improvement" name="kategori_improvement">
                                <option selected hidden value="-"></option>
                                <option value="Jalur Kabel">Jalur Kabel</option>
                                <option value="Utilitas (FDT,FAT,JB,dll)">Utilitas (FDT,FAT,JB,dll)</option>
                                <option value="Batre">Batre</option>
                                <option value="Rectifier">Rectifier</option>
                                <option value="Perangkat">Perangkat</option>
                                <option value="AC">AC</option>
                                <option value="OLT">OLT</option>
                            </select>
                            @error('kategori_improvement')
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
        let kimprovement = document.querySelectorAll('.kategoriImprovement')

        for( let i = 0; i < rada.length; i++){
            rada[i].addEventListener('click',function(){
                improvement[i].style.display = 'block'
                kimprovement[i].style.display = 'block'
            })
        }

        for( let j = 0; j < rtidak.length; j++){
            rtidak[j].addEventListener('click',function(){
                improvement[j].style.display = 'none'
                kimprovement[j].style.display = 'none'
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
