@extends('layout.adminlte')

@section('content')
<p class="bg-info d-flex justify-content-center align-items-center py-1" style="margin-top: -30px">TOTAL POP : {{ count($pop) }}</p>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <p style="font-size: 10px">TOTAL POP</p>
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle">{{ count($popsb) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="bg-info d-flex justify-content-center align-items-center py-1">POP S-BACKBONE</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <p style="font-size: 10px">TOTAL POP</p>
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle">{{ count($popb) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="bg-info d-flex justify-content-center align-items-center py-1">POP BACKBONE</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <p style="font-size: 10px">TOTAL POP</p>
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle">{{ count($popd) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="bg-info d-flex justify-content-center align-items-center py-1">POP DISTRIBUSI</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <p style="font-size: 10px">TOTAL POP</p>
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle">{{ count($popa) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="bg-info d-flex justify-content-center align-items-center py-1">POP AKSES</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                        <div class="bungkus">
                            <p style="font-size: 10px">TOTAL POP</p>
                            <div style="width: 50px; height: 50px;" class="d-flex justify-content-center align-items-center bg-info rounded-circle">{{ count($popc) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="bg-info d-flex justify-content-center align-items-center py-1">CPE PLN</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
      <div class="card card-info card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs justify-content-between" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active px-5" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">POP S-BACKBONE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-5" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">POP BACKBONE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-5" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">POP DISTRIBUSI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-5" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">POP AKSES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-5" id="cpe-pln" data-toggle="pill" href="#cpe" role="tab" aria-controls="cpe-pln" aria-selected="false">CPE PLN</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <div class="row">
                    @foreach ($popsb as $row)
                    <div class="col-md-3 d-flex justify-content-center align-items-center mt-5">
                        <div class="bungkus">
                            <a href="#">
                                <div style="width: 50px; height: 50px; margin: auto" class="d-flex justify-content-center align-items-center bg-success rounded-circle mb-3">P-SB</div>
                                <p style="font-size: 10px">{{ $row->nama_pop }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="row">
                    @foreach ($popb as $row)
                    <div class="col-md-3 d-flex justify-content-center align-items-center mt-5">
                        <div class="bungkus">
                            <a href="#">
                                <div style="width: 50px; height: 50px; margin: auto" class="d-flex justify-content-center align-items-center bg-success rounded-circle mb-3">P-BB</div>
                                <p style="font-size: 10px">{{ $row->nama_pop }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                <div class="row">
                    @foreach ($popd as $row)
                    <div class="col-md-3 d-flex justify-content-center align-items-center mt-5">
                        <div class="bungkus">
                            <a href="#">
                                <div style="width: 50px; height: 50px; margin: auto" class="d-flex justify-content-center align-items-center bg-success rounded-circle mb-3">P-D</div>
                                <p style="font-size: 10px">{{ $row->nama_pop }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                <div class="row">
                    @foreach ($popa as $row)
                    <div class="col-md-3 d-flex justify-content-center align-items-center mt-5">
                        <div class="bungkus">
                            <a href="#">
                                <div style="width: 50px; height: 50px; margin: auto" class="d-flex justify-content-center align-items-center bg-success rounded-circle mb-3">P-A</div>
                                <p style="font-size: 10px">{{ $row->nama_pop }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="cpe" role="tabpanel" aria-labelledby="cpe-pln">
                <div class="row">
                    @foreach ($popc as $row)
                    <div class="col-md-3 d-flex justify-content-center align-items-center mt-5">
                        <div class="bungkus">
                            <a href="#">
                                <div style="width: 50px; height: 50px; margin: auto" class="d-flex justify-content-center align-items-center bg-success rounded-circle mb-3">CPE</div>
                                <p style="font-size: 10px">{{ $row->nama_pop }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
@endsection

@section('title')

@endsection