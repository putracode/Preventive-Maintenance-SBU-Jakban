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
        <div class="card-header bg-info p-0 pt-1">
          <ul class="nav nav-tabs justify-content-start" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active px-5" id="informasi-umum-tab" data-toggle="pill" href="#informasi-umum" role="tab" aria-controls="informasi-umum" aria-selected="true">INFORMASI UMUM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-5" id="sarpentel-tab" data-toggle="pill" href="#sarpentel" role="tab" aria-controls="sarpentel" aria-selected="false">SARPENTEL</a>
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
            <div class="tab-pane fade show active" id="informasi-umum" role="tabpanel">
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
            <div class="tab-pane fade" id="sarpentel" role="tabpanel">
                <div class="card">
                  <div class="card-header bg-info">
                    <div class="card-title">
                      Kelistrikan
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="form-group row mb-5">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Daya Listrik (Watt) :</label>
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
                            <label for="exampleInputEmail1">MCB - Phasa R (A)</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->mcbr ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">MCB - Phasa S (A)</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->mcbs ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">MCB - Phasa T (A)</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->mcbt ?? '' }}">
                          </div>
                        </div>
                      </div>

                      <div class="row mb-2">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Beban - Phasa R (A)</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->beban_r ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Beban - Phasa S (A)</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $kelistrikan->beban_s ?? '' }}">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Beban - Phasa T (A)</label>
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
                <div class="card">
                  <div class="card-header bg-info">
                    <div class="card-title">
                      Suhu Ruangan
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="row mb-2">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Suhu (*C)</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $suhu->suhu_ruangan ?? '' }}">
                          </div>
                        </div>
                        @php
                          $indexSuhu = '';
                          $adasuhu = $suhu->index_healthy ?? '';
                          if($adasuhu == "Excellent"){
                            $indexSuhu = 'bg-success';
                          }elseif($adasuhu == "Health"){
                            $indexSuhu = 'bg-warning';
                          }elseif($adasuhu == "Critical"){
                            $indexSuhu = 'bg-danger';
                          }elseif($adasuhu == "Lose Privillage"){
                            $indexSuhu = 'bg-dark';
                          }else{
                            $indexSuhu = '';
                          }
                        @endphp
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Index Healthy</label>
                            <input type="email" class="form-control {{ $indexSuhu }}" id="exampleInputEmail1" disabled value="{{ $suhu->index_healthy ?? '' }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    {{ $suhu->updated_at ?? '' }}
                  </div>
                </div>
                <div class="card">
                  <div class="card-header bg-info">
                    <div class="card-title">
                      Genset
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="row mb-2">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Merk Type</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $genset->merk_type ?? '' }}">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">SN</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $genset->sn ?? '' }}">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kapasitas (Watt)</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $genset->kapasitas ?? '' }}">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kemampuan Genset</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" disabled value="{{ $genset->kemampuan_genset ?? '' }}">
                          </div>
                        </div>
                      </div>
                      @php
                      $indexgenset = '';
                      $adagenset = $genset->index_healthy ?? '';
                      if($adagenset == "Excellent"){
                        $indexgenset = 'bg-success';
                      }elseif($adagenset == "Health"){
                        $indexgenset = 'bg-warning';
                      }elseif($adagenset == "Critical"){
                        $indexgenset = 'bg-danger';
                      }elseif($adagenset == "Lose Privillage"){
                        $indexgenset = 'bg-dark';
                      }else{
                        $indexgenset = '';
                      }
                      @endphp
                      <div class="form-group">
                        <label for="exampleInputEmail1">Index Healthy</label>
                        <input type="email" class="form-control {{ $indexgenset }}" id="exampleInputEmail1" disabled value="{{ $genset->index_healthy ?? '' }}">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    {{ $genset->updated_at ?? '' }}
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