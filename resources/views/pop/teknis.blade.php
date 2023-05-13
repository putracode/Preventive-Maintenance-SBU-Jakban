@extends('layout.adminlte')

@section('content')
@if (!empty($teknis))
<div class="row">
  <div class="col-md-12">
      <div class="card card-primary">
          <div class="card-header">
              <h3 class="card-title">Kelistrikan</h3>
          </div>
          <form action="/pop/teknis/{{ $pop_id }}" method="POST">
              @csrf
              <div class="card-body">
                  <div class="form-group mb-5">
                      <input type="hidden" name="pop_id" value="{{ $pop_id }}">
                      <label for="exampleSelectRounded0">Daya Listrik</label>
                      <select class="custom-select rounded-0" id="exampleSelectRounded0" name="daya_listrik">
                          <option {{ $teknis->daya_listrik == '450' ? 'selected' : '' }}>450</option>
                          <option {{ $teknis->daya_listrik == '900' ? 'selected' : '' }}>900</option>
                          <option {{ $teknis->daya_listrik == '1300' ? 'selected' : '' }}>1300</option>
                          <option {{ $teknis->daya_listrik == '2200' ? 'selected' : '' }}>2200</option>
                          <option {{ $teknis->daya_listrik == '3500' ? 'selected' : '' }}>3500</option>
                          <option {{ $teknis->daya_listrik == '4400' ? 'selected' : '' }}>4400</option>
                          <option {{ $teknis->daya_listrik == '5500' ? 'selected' : '' }}>5500</option>
                          <option {{ $teknis->daya_listrik == '6600' ? 'selected' : '' }}>6600</option>
                          <option {{ $teknis->daya_listrik == '7700' ? 'selected' : '' }}>7700</option>
                          <option {{ $teknis->daya_listrik == '10600' ? 'selected' : '' }}>10600</option>
                          <option {{ $teknis->daya_listrik == '11000' ? 'selected' : '' }}>11000</option>
                          <option {{ $teknis->daya_listrik == '13200' ? 'selected' : '' }}>13200</option>
                          <option {{ $teknis->daya_listrik == '19500' ? 'selected' : '' }}>19500</option>
                          <option {{ $teknis->daya_listrik == '23000' ? 'selected' : '' }}>23000</option>
                          <option {{ $teknis->daya_listrik == '33000' ? 'selected' : '' }}>33000</option>
                          <option {{ $teknis->daya_listrik == '41500' ? 'selected' : '' }}>41500</option>
                          <option {{ $teknis->daya_listrik == '53000' ? 'selected' : '' }}>53000</option>
                          <option {{ $teknis->daya_listrik == '66000' ? 'selected' : '' }}>66000</option>
                          <option {{ $teknis->daya_listrik == '82500' ? 'selected' : '' }}>82500</option>
                          <option {{ $teknis->daya_listrik == '105000' ? 'selected' : '' }}>105000</option>
                          <option {{ $teknis->daya_listrik == '131000' ? 'selected' : '' }}>131000</option>
                          <option {{ $teknis->daya_listrik == '147000' ? 'selected' : '' }}>147000</option>
                          <option {{ $teknis->daya_listrik == '164000' ? 'selected' : '' }}>164000</option>
                          <option {{ $teknis->daya_listrik == '197000' ? 'selected' : '' }}>197000</option>
                      </select>
                  </div>
                  <div class="form-group mb-5">
                      <label for="exampleSelectRounded0">Jumlah Phasa</label>
                      <select class="custom-select rounded-0" id="exampleSelectRounded0" name="jumlah_phasa">
                          <option {{ $teknis->jumlah_phasa == '1' ? 'selected' : '' }}>1</option>
                          <option {{ $teknis->jumlah_phasa == '3' ? 'selected' : '' }}>3</option>
                      </select>
                  </div>
                  <div class="row">
                      <div class="col-4">
                          <div class="form-group mb-5">
                              <label for="exampleInputPassword1">MCBR</label>
                              <input type="number" class="form-control" id="exampleInputPassword1" name="mcbr" value="{{ $teknis->mcbr }}">
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="form-group mb-5">
                              <label for="exampleInputPassword1">MCBS</label>
                              <input type="number" class="form-control" id="exampleInputPassword1" name="mcbs" value="{{ $teknis->mcbs }}">
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="form-group mb-5">
                              <label for="exampleInputPassword1">MCBT</label>
                              <input type="number" class="form-control" id="exampleInputPassword1" name="mcbt" value="{{ $teknis->mcbt }}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-4">
                          <div class="form-group mb-5">
                              <label for="exampleInputPassword1">Beban R</label>
                              <input type="number" class="form-control" id="exampleInputPassword1" name="beban_r" value="{{ $teknis->beban_r }}">
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="form-group mb-5">
                              <label for="exampleInputPassword1">Beban S</label>
                              <input type="number" class="form-control" id="exampleInputPassword1" name="beban_s" value="{{ $teknis->beban_r }}">
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="form-group mb-5">
                              <label for="exampleInputPassword1">Beban T</label>
                              <input type="number" class="form-control" id="exampleInputPassword1" name="beban_t" value="{{ $teknis->beban_r }}">
                          </div>
                      </div>
                  </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                <a href="/pop" class="btn btn-danger px-5 mr-2">kembali</a>
              </div>
          </form>
      </div>
  </div>
</div>
@else
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Kelistrikann</h3>
            </div>
            <form action="/pop/teknis" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-5">
                        <input type="hidden" name="pop_id" value="{{ $pop_id }}">
                        <label for="exampleSelectRounded0">Daya Listrik</label>
                        <select class="custom-select rounded-0" id="exampleSelectRounded0" name="daya_listrik">
                            <option>450</option>
                            <option>900</option>
                            <option>1300</option>
                            <option>2200</option>
                            <option>3500</option>
                            <option>4400</option>
                            <option>5500</option>
                            <option>6600</option>
                            <option>7700</option>
                            <option>10600</option>
                            <option>11000</option>
                            <option>13200</option>
                            <option>19500</option>
                            <option>23000</option>
                            <option>33000</option>
                            <option>41500</option>
                            <option>53000</option>
                            <option>66000</option>
                            <option>82500</option>
                            <option>10500</option>
                            <option>105000</option>
                            <option>131000</option>
                            <option>147000</option>
                            <option>164000</option>
                            <option>197000</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="exampleSelectRounded0">Jumlah Phasa</label>
                        <select class="custom-select rounded-0" id="exampleSelectRounded0" name="jumlah_phasa">
                            <option>1</option>
                            <option>3</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">MCBR</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="mcbr">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">MCBS</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="mcbs">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">MCBT</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="mcbt">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">Beban R</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="beban_r">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">Beban S</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="beban_s">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">Beban T</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="beban_t">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                  <a href="/pop" class="btn btn-danger px-5 mr-2">kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

@section('title')
{{ $pop->nama_pop }}
@endsection