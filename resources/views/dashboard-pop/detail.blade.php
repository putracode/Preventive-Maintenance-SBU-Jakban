@extends('layout.adminlte')

@section('content')
<div class="bungkus bg-info mb-3 py-2" style="margin-top: -30px">
    <p class="d-flex justify-content-center align-items-center">INDEX HEALTHY POP</p>
    <div class="index d-flex justify-content-center align-items-center">
        <p style="font-size: 14px" class="mx-2 px-2 rounded bg-success">AMPERE KWH POP > BEBAN AKTUAL</p>
        <p style="font-size: 14px" class="mx-2 px-2 rounded bg-success">BACK UP TIME PERANGKAT > 8 JAM</p>
        <p style="font-size: 14px" class="mx-2 px-2 rounded bg-success">FAILOVER PLN TO BATTERE</p>
        <p style="font-size: 14px" class="mx-2 px-2 rounded bg-success">FAILOVER PLN TO GENSET</p>
        <p style="font-size: 14px" class="mx-2 px-2 rounded bg-success">SUHU < 25 C</p>
    </div>
    {{-- <a href="{{ url()->previous() }}" class="pb-2 pl-2" style="font-size: 13px">< kembali</a> --}}
</div>


<div class="row">
    <div class="col-12">
      <div class="card card-info card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs justify-content-between" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active px-5" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">INFORMASI UMUM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-5" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">SARPENTEL</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link px-5" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">POP DISTRIBUSI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-5" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">POP AKSES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-5" id="cpe-pln" data-toggle="pill" href="#cpe" role="tab" aria-controls="cpe-pln" aria-selected="false">CPE PLN</a>
            </li> --}}
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <dl>
                  <div class="row">
                    @foreach ($pop as $row)
                      <div class="col-lg-6 my-2">                      
                        <dt>ID POP</dt>
                        <dd>{{ $row->id_pop }}</dd>
                      </div>                        
                      <div class="col-lg-6 my-2">                      
                        <dt>Nama POP</dt>
                        <dd>{{ $row->nama_pop }}</dd>
                      </div>                        
                      <div class="col-lg-6 my-2">                      
                        <dt>Koordinat</dt>
                        <dd>{{ $row->koordinat }}</dd>
                      </div>
                      <div class="col-lg-6 my-2">                      
                        <dt>Alamat</dt>
                        <dd>{{ $row->alamat }}</dd>
                      </div>    
                      <div class="col-lg-6 my-2">                      
                        <dt>Kelurahan</dt>
                        <dd>{{ $row->kelurahan }}</dd>
                      </div>    
                      <div class="col-lg-6 my-2">                      
                        <dt>Kecamatan</dt>
                        <dd>{{ $row->kecamatan }}</dd>
                      </div>    
                      <div class="col-lg-6 my-2">                      
                        <dt>Kota</dt>
                        <dd>{{ $row->kota }}</dd>
                      </div>                     
                      <div class="col-lg-6 my-2">                      
                        <dt>Building</dt>
                        <dd>{{ $row->building }}</dd>
                      </div>                     
                      <div class="col-lg-6 my-2">                      
                        <dt>Tipe POP</dt>
                        <dd>{{ $row->tipe_pop }}</dd>
                      </div>                     
                    @endforeach
                  </div>
                </dl>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="card">
                  <div class="card-header">
                    Kelistrikan
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="form-group row mb-5">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Daya Listrik :</label>
                        <div class="col-sm-4">
                          <input type="email" class="form-control" id="inputEmail3" disabled value="{{ $kelistrikan->daya_listrik ?? '' }}">
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Phasa :</label>
                        <div class="col-sm-4">
                          <input type="email" class="form-control" id="inputEmail3" disabled
                          value="{{ $kelistrikan->jumlah_phasa ?? ''}}">
                        </div>
                      </div>

                      <div class="row mb-2">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">MCB - Phasa R</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->mcbr ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">MCB - Phasa S</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->mcbs ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">MCB - Phasa T</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->mcbt ?? '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Beban - Phasa R</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->beban_r ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Beban - Phasa S</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->beban_s ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Beban - Phasa T</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->beban_t ?? '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Utilitas - Phasa R</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->utilitas_r ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Utilitas - Phasa S</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->utilitas_s ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Utilitas - Phasa T</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->utilitas_t ?? '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Rata Rata</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->rata_rata ?? '' }}">
                          </div>
                        </div>
                        @php
                          $indexListrik = '';
                          $adakelistrikan = $kelistrikan->index_healthy ?? '';
                          if($adakelistrikan == "Excellent"){
                            $indexListrik = 'bg-success';
                          }elseif($adakelistrikan == "Health"){
                            $indexListrik = 'bg-warning';
                          }elseif($adakelistrikan == "Critical"){
                            $indexListrik = 'bg-danger';
                          }elseif($adakelistrikan == "Lose Privillage"){
                            $indexListrik = 'bg-dark';
                          }else{
                            $indexListrik = '';
                          }
                        @endphp
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Index Healthy</label>
                            <input type="email" class="form-control {{ $indexListrik }}" id="exampleInputEmail1" disabled value="{{ $kelistrikan->index_healthy ?? '' }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    {{ $kelistrikan->updated_at ?? '' }}
                  </div>
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                <div class="row">

                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                <div class="row">

                </div>
            </div>
            <div class="tab-pane fade" id="cpe" role="tabpanel" aria-labelledby="cpe-pln">
                <div class="row">

                </div>
            </div> --}}
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
@endsection

@section('title')

@endsection