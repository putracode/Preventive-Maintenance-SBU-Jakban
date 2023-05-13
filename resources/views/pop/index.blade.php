@extends('layout.adminlte')

@section('content')
<div class="card p-4">
    <div class=" d-flex justify-content-between align-items-center pb-3">
        <h5 class="p-0 m-0">POP</h5>
        @can('admin')
            <a href="/pop/create" class="btn-sm btn-primary float-end px-4 ">Create</a>
        @endcan
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover  py-2" id="example1">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    @can('admin')
                    <th class="notexport">Action</th>
                    @endcan
                    <th>ID POP</th>
                    <th>Nama POP / CPE PLN</th>
                    <th>Koordinat</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kota</th>
                    <th>Building</th>
                    <th>Tipe POP</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($pop as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle"
                                data-toggle="dropdown">
                                Action
                            </button>
                            <ul class="dropdown-menu ">
                                <li class="">

                                    <a href="/pop/{{ $row->id }}/edit" class="dropdown-item">
                                        <span style="display: flex; align-items: center;">
                                            <ion-icon name="create-outline" class="mr-2"></ion-icon>
                                            </i>Edit
                                        </span>
                                    </a>

                                </li>
                                <li class="my-2">
                                    <form action="/pop/{{ $row->id }}" class="dropdown-item">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-info">
                                            <ion-icon name="trash-outline" class="mr-2"></ion-icon>
                                            Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td> --}}
                    @can('admin')                        
                        <td>
                            <a href="/pop/teknis/{{ $row->id }}">
                                <button type="button" class="btn btn-icon bg-info">
                                    <ion-icon name="cellular-outline" style="margin: auto"></ion-icon>
                                </button>
                            </a>
                            <a href="/pop/{{ $row->id }}/edit">
                                <button type="button" class="btn btn-icon  btn-warning ">
                                    <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm-1-5L14 5l3 3L7 18H4v-3zM15 4l2-2l3 3l-2.001 2.001L15 4z"
                                            fill="#ffffff" fill-rule="evenodd" />
                                    </svg>
                                </button>
                            </a>
                            <form action="/pop/{{ $row->id }}" method="POST" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-icon btn-danger confirmdelete" data-name="Data" id="confirmbutton">
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
                        </td>
                    @endcan
                    <td>{{ $row->id_pop }}</td>
                    <td>{{ $row->nama_pop }}</td>
                    <td>{{ $row->koordinat }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->kelurahan }}</td>
                    <td>{{ $row->kecamatan }}</td>
                    <td>{{ $row->kota }}</td>
                    <td>{{ $row->building }}</td>
                    <td>{{ $row->tipe_pop }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('script')

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endsection
@section('title')
<h1 style="font-weight: 600; letter-spacing: 1px" class="text-info text-center">Daftar POP & CPE PLN</h1>

@endsection
