@extends('layout.adminlte')

@section('content')
@if (!empty($listrik))
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Kelistrikan</h3>
            </div>
            <form action="/pop/teknis/listrik/{{ $pop_id }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-5">
                        <input type="hidden" name="pop_id" value="{{ $pop_id }}">
                        <label for="exampleSelectRounded0">Daya Listrik</label>
                        <select class="custom-select rounded-0" id="exampleSelectRounded0" name="daya_listrik">
                            <option {{ $listrik->daya_listrik == '450' ? 'selected' : '' }}>450</option>
                            <option {{ $listrik->daya_listrik == '900' ? 'selected' : '' }}>900</option>
                            <option {{ $listrik->daya_listrik == '1300' ? 'selected' : '' }}>1300</option>
                            <option {{ $listrik->daya_listrik == '2200' ? 'selected' : '' }}>2200</option>
                            <option {{ $listrik->daya_listrik == '3500' ? 'selected' : '' }}>3500</option>
                            <option {{ $listrik->daya_listrik == '4400' ? 'selected' : '' }}>4400</option>
                            <option {{ $listrik->daya_listrik == '5500' ? 'selected' : '' }}>5500</option>
                            <option {{ $listrik->daya_listrik == '6600' ? 'selected' : '' }}>6600</option>
                            <option {{ $listrik->daya_listrik == '7700' ? 'selected' : '' }}>7700</option>
                            <option {{ $listrik->daya_listrik == '10600' ? 'selected' : '' }}>10600</option>
                            <option {{ $listrik->daya_listrik == '11000' ? 'selected' : '' }}>11000</option>
                            <option {{ $listrik->daya_listrik == '13200' ? 'selected' : '' }}>13200</option>
                            <option {{ $listrik->daya_listrik == '19500' ? 'selected' : '' }}>19500</option>
                            <option {{ $listrik->daya_listrik == '23000' ? 'selected' : '' }}>23000</option>
                            <option {{ $listrik->daya_listrik == '33000' ? 'selected' : '' }}>33000</option>
                            <option {{ $listrik->daya_listrik == '41500' ? 'selected' : '' }}>41500</option>
                            <option {{ $listrik->daya_listrik == '53000' ? 'selected' : '' }}>53000</option>
                            <option {{ $listrik->daya_listrik == '66000' ? 'selected' : '' }}>66000</option>
                            <option {{ $listrik->daya_listrik == '82500' ? 'selected' : '' }}>82500</option>
                            <option {{ $listrik->daya_listrik == '105000' ? 'selected' : '' }}>105000</option>
                            <option {{ $listrik->daya_listrik == '131000' ? 'selected' : '' }}>131000</option>
                            <option {{ $listrik->daya_listrik == '147000' ? 'selected' : '' }}>147000</option>
                            <option {{ $listrik->daya_listrik == '164000' ? 'selected' : '' }}>164000</option>
                            <option {{ $listrik->daya_listrik == '197000' ? 'selected' : '' }}>197000</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="exampleSelectRounded0">Jumlah Phasa</label>
                        <select class="custom-select rounded-0 createJumlahPhasa" id="exampleSelectRounded0"
                            name="jumlah_phasa">
                            <option {{ $listrik->jumlah_phasa == '1' ? 'selected' : '' }}>1</option>
                            <option {{ $listrik->jumlah_phasa == '3' ? 'selected' : '' }}>3</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">MCBR (A)</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="mcbr"
                                    value="{{ $listrik->mcbr }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">MCBS (A)</label>
                                <input type="number" class="form-control createMCBS" id="exampleInputPassword1"
                                    name="mcbs" value="{{ $listrik->mcbs }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">MCBT (A)</label>
                                <input type="number" class="form-control createMCBT" id="exampleInputPassword1"
                                    name="mcbt" value="{{ $listrik->mcbt }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">Beban R (A)</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="beban_r"
                                    value="{{ $listrik->beban_r }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">Beban S (A)</label>
                                <input type="number" class="form-control createBebanS" id="exampleInputPassword1"
                                    name="beban_s" value="{{ $listrik->beban_s }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">Beban T (A)</label>
                                <input type="number" class="form-control createBebanT" id="exampleInputPassword1"
                                    name="beban_t" value="{{ $listrik->beban_t }}">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (!empty($genset))
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Genset</h3>
            </div>
            <form action="/pop/teknis/genset/{{ $pop_id }}" method="POST">
                @csrf
                <input type="hidden" name="pop_id" value="{{ $pop_id }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-5">
                                <label for="daya_listrik">Daya Listrik</label>
                                <input type="number" class="form-control" id="daya_listrik" name="daya_listrik" value="{{ $listrik->daya_listrik ?? '' }}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-5">
                                <label for="jumlah_phasa">Jumlah Phasa</label>
                                <input type="number" class="form-control" id="jumlah_phasa" name="jumlah_phasa" value="{{ $listrik->jumlah_phasa ?? '' }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="merk_type">Merk dan Type</label>
                        <input type="text" class="form-control" id="merk_type" name="merk_type" value="{{ $genset->merk_type ?? '' }}">
                    </div>
                    <div class="form-group mb-5">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" id="sn" name="sn" value="{{ $genset->sn ?? '' }}">
                    </div>
                    <div class="form-group mb-5">
                        <label for="kapasitas">Kapasitas Genset (Watt)</label>
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="{{ $genset->kapasitas ?? '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
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
                <h3 class="card-title">Genset</h3>
            </div>
            <form action="/pop/teknis/genset" method="POST">
                @csrf
                <input type="hidden" name="pop_id" value="{{ $pop_id }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-5">
                                <label for="daya_listrik">Daya Listrik</label>
                                <input type="number" class="form-control" id="daya_listrik" name="daya_listrik" value="{{ $listrik->daya_listrik ?? '' }}" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-5">
                                <label for="jumlah_phasa">Jumlah Phasa</label>
                                <input type="number" class="form-control" id="jumlah_phasa" name="jumlah_phasa" value="{{ $listrik->jumlah_phasa ?? '' }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="merk_type">Merk dan Type</label>
                        <input type="text" class="form-control" id="merk_type" name="merk_type">
                    </div>
                    <div class="form-group mb-5">
                        <label for="sn">SN</label>
                        <input type="text" class="form-control" id="sn" name="sn">
                    </div>
                    <div class="form-group mb-5">
                        <label for="kapasitas">Kapasitas Genset (Watt)</label>
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" autocomplete="off">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@if (!empty($suhu))
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Suhu Ruangan</h3>
            </div>
            <form action="/pop/teknis/suhu/{{ $pop_id }}" method="POST">
                @csrf
                <input type="hidden" name="pop_id" value="{{ $pop_id }}">
                <div class="card-body">
                    <div class="form-group mb-5">
                        <label for="suhu">Suhu°</label>
                        <input type="number" class="form-control suhu" id="suhu" name="suhu_ruangan" value="{{ $suhu->suhu_ruangan ?? '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
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
                <h3 class="card-title">Suhu Ruangan</h3>
            </div>
            <form action="/pop/teknis/suhu" method="POST">
                @csrf
                <input type="hidden" name="pop_id" value="{{ $pop_id }}">
                <div class="card-body">
                    <div class="form-group mb-5">
                        <label for="suhu">Suhu</label>
                        <input type="number" class="form-control suhu" id="suhu" name="suhu_ruangan">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@else
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Kelistrikan</h3>
            </div>
            <form action="/pop/teknis/listrik" method="POST">
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
                        <select class="custom-select rounded-0 createJumlahPhasa" id="createJumlahPhasa"
                            name="jumlah_phasa">
                            <option>3</option>
                            <option>1</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="exampleInputPassword1">MCBR </label>
                                <input type="number" class="form-control" id="exampleInputPassword1" name="mcbr">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="createMCBS">MCBS </label>
                                <input type="number" class="form-control createMCBS" id="createMCBS" name="mcbs">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="createMCBT">MCBT </label>
                                <input type="number" class="form-control createMCBT" id="createMCBT" name="mcbt">
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
                                <label for="createBebanS">Beban S</label>
                                <input type="number" class="form-control createBebanS" id="createBebanS" name="beban_s">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-5">
                                <label for="createBebanT">Beban T</label>
                                <input type="number" class="form-control createBebanT" id="createBebanT" name="beban_t">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
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

@section('script')
    <script>
        $('.createJumlahPhasa').on('change', function () {
            let selected = $(this).val();
            console.log(selected);
            if (selected == 1) {
                $('.createMCBS').val('0');
                $('.createMCBT').val('0');
                $('.createBebanS').val('0');
                $('.createBebanT').val('0');
                $('.createMCBS').attr('readonly', true);
                $('.createMCBT').attr('readonly', true);
                $('.createBebanS').attr('readonly', true);
                $('.createBebanT').attr('readonly', true);
            } else {
                $('.createMCBS').val(<?php echo $listrik->mcbs ?? ''; ?>);
                $('.createMCBT').val(<?php echo $listrik->mcbt ?? ''; ?>);
                $('.createBebanS').val(<?php echo $listrik->beban_s ?? ''; ?>);
                $('.createBebanT').val(<?php echo $listrik->beban_t ?? ''; ?>);
                $('.createMCBS').attr('readonly', false);
                $('.createMCBT').attr('readonly', false);
                $('.createBebanS').attr('readonly', false);
                $('.createBebanT').attr('readonly', false);
            }
        });
    </script>
@endsection
