@extends('layout.adminlte')

@section('content')
@if (empty($listrik))
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
                            <input type="hidden" name="pop_id" value="{{ $id }}">
                            <label for="daya_listrik">Daya Listrik PLN (Watt)</label>
                            <select class="custom-select rounded-0 @error('daya_listrik') is-invalid @enderror" id="daya_listrik" name="daya_listrik" required  autocomplete="off">
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
                            @error('daya_listrik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="createJumlahPhasa">Jumlah Phasa</label>
                            <select class="custom-select rounded-0 createJumlahPhasa" id="createJumlahPhasa"
                                name="jumlah_phasa" required autocomplete="off">
                                <option>3</option>
                                <option>1</option>
                            </select>
                            @error('jumlah_phasa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="mcbr">MCBR (A)</label>
                                    <input type="number" class="form-control @error('mcbr') is-invalid @enderror" id="mcbr" name="mcbr" required autocomplete="off">
                                    @error('mcbr')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="createMCBS">MCBS (A)</label>
                                    <input type="number" class="form-control createMCBS @error('mcbs') is-invalid @enderror" id="createMCBS" name="mcbs" required autocomplete="off">
                                    @error('mcbs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="createMCBT">MCBT (A)</label>
                                    <input type="number" class="form-control createMCBT @error('mcbt') is-invalid @enderror" id="createMCBT" name="mcbt" required autocomplete="off">
                                    @error('mcbt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="beban_r">Beban R (A)</label>
                                    <input type="number" class="form-control @error('beban_r') is-invalid @enderror" id="beban_r" name="beban_r" required autocomplete="off">
                                    @error('beban_r')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="createBebanS">Beban S (A)</label>
                                    <input type="number" class="form-control createBebanS @error('beban_r') is-invalid @enderror" id="createBebanS" name="beban_s" required autocomplete="off">
                                    @error('beban_s')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="createBebanT">Beban T (A)</label>
                                    <input type="number" class="form-control createBebanT @error('beban_r') is-invalid @enderror" id="createBebanT" name="beban_t" required autocomplete="off">
                                    @error('beban_t')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                        <a href="/pop/teknis/{{ $id }}" class="btn btn-danger float-right px-5 mr-3">Kembali</a>
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
                    <h3 class="card-title">Kelistrikan</h3>
                </div>
                <form action="/pop/teknis/listrik/{{ $id }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-5">
                            <input type="hidden" name="pop_id" value="{{ $id }}">
                            <label for="daya_listrik">Daya Listrik PLN (Watt)</label>
                            <select class="custom-select rounded-0 @error('daya_listrik') is-invalid @enderror" id="daya_listrik" name="daya_listrik" required  autocomplete="off">
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
                            @error('daya_listrik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="createJumlahPhasa">Jumlah Phasa</label>
                            <select class="custom-select rounded-0 createJumlahPhasa @error('jumlah_phasa') is-invalid @enderror" id="createJumlahPhasa"
                                name="jumlah_phasa" required autocomplete="off">
                                <option {{ $listrik->jumlah_phasa == '1' ? 'selected' : '' }}>1</option>
                                <option {{ $listrik->jumlah_phasa == '3' ? 'selected' : '' }}>3</option>
                            </select>
                            @error('jumlah_phasa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="mcbr">MCBR (A)</label>
                                    <input type="number" class="form-control @error('mcbr') is-invalid @enderror" id="mcbr" name="mcbr" required autocomplete="off" value="{{ $listrik->mcbr }}">
                                    @error('mcbr')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="createMCBS">MCBS (A)</label>
                                    <input type="number" class="form-control createMCBS @error('mcbs') is-invalid @enderror" id="createMCBS" name="mcbs" required autocomplete="off" value="{{ $listrik->mcbs }}" {{ $listrik->jumlah_phasa == '1' ? 'readonly' : '' }}>
                                    @error('mcbs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="createMCBT">MCBT (A)</label>
                                    <input type="number" class="form-control createMCBT @error('mcbt') is-invalid @enderror" id="createMCBT" name="mcbt" required autocomplete="off" value="{{ $listrik->mcbt }}" {{ $listrik->jumlah_phasa == '1' ? 'readonly' : '' }}>
                                    @error('mcbt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="beban_r">Beban R (A)</label>
                                    <input type="number" class="form-control @error('beban_r') is-invalid @enderror" id="beban_r" name="beban_r" required autocomplete="off" value="{{ $listrik->beban_r }}">
                                    @error('beban_r')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="createBebanS">Beban S (A)</label>
                                    <input type="number" class="form-control createBebanS @error('beban_r') is-invalid @enderror" id="createBebanS" name="beban_s" required autocomplete="off" value="{{ $listrik->beban_s }}" {{ $listrik->jumlah_phasa == '1' ? 'readonly' : '' }}>
                                    @error('beban_s')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-5">
                                    <label for="createBebanT">Beban T (A)</label>
                                    <input type="number" class="form-control createBebanT @error('beban_r') is-invalid @enderror" id="createBebanT" name="beban_t" required autocomplete="off" value="{{ $listrik->beban_t }}" {{ $listrik->jumlah_phasa == '1' ? 'readonly' : '' }}>
                                    @error('beban_t')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right px-5">Submit</button>
                        <a href="/pop/teknis/{{ $id }}" class="btn btn-danger float-right px-5 mr-3">Kembali</a>
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