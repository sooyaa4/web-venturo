@extends('layouts.app')

@section('content')


<div class="container-fluid">
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-header">
                Venturo - Laporan penjualan tahunan per menu
            </div>
            <div class="card-body">
                <form action="/" method="get">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="tahun">
                                    <option value="">Pilih Tahun</option>
                                    <option {{old('tahun',$tahun)=="2021"? 'selected':''}} value="2021">2021</option>
                                    <option {{old('tahun',$tahun)=="2022"? 'selected':''}} value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                            <a href="http://tes-web.landa.id/intermediate/menu" target="_blank" rel="Array Menu" class="btn btn-secondary">
                                Json Menu
                            </a>
                            <a href="http://tes-web.landa.id/intermediate/transaksi?tahun={{ $tahun }}" target="_blank" rel="Array Transaksi" class="btn btn-secondary">
                                Json Transaksi
                            </a>
                            <a href="https://tes-web.landa.id/intermediate/download?path=example.php" target="_blank" rel="Array Transaksi" class="btn btn-secondary">
                                Download Example
                            </a>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="margin: 0;">
                        <thead>
                            <tr class="table-dark">
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu</th>
                                <th colspan="12" style="text-align: center;">Periode Pada {{ $tahun }}
                                </th>
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total</th>
                            </tr>
                            <tr class="table-dark">
                                <th style="text-align: center;width: 75px;">Jan</th>
                                <th style="text-align: center;width: 75px;">Feb</th>
                                <th style="text-align: center;width: 75px;">Mar</th>
                                <th style="text-align: center;width: 75px;">Apr</th>
                                <th style="text-align: center;width: 75px;">Mei</th>
                                <th style="text-align: center;width: 75px;">Jun</th>
                                <th style="text-align: center;width: 75px;">Jul</th>
                                <th style="text-align: center;width: 75px;">Ags</th>
                                <th style="text-align: center;width: 75px;">Sep</th>
                                <th style="text-align: center;width: 75px;">Okt</th>
                                <th style="text-align: center;width: 75px;">Nov</th>
                                <th style="text-align: center;width: 75px;">Des</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-secondary" colspan="14"><b>Makanan</b></td>
                            </tr>
                            @foreach ($responsebody as $d )
                            <tr>
                                <td>{{ $d->menu}}</td>
                                @foreach ($responseBody as $d )
                                <td>{{ $d->total }}</td>
                                @endforeach
                                <td style="text-align: right;"><b>665,000</b></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="table-secondary" colspan="14"><b>Minuman</b></td>
                            </tr>
                            @foreach ($responsebody as $d )
                            <tr>
                                <td>{{ $d->menu}}</td>
                                @foreach ($responseBody as $d )
                                <td>{{ $d->total }}</td>
                                @endforeach
                                <td style="text-align: right;"><b>665,000</b></td>
                            </tr>
                            @endforeach
                            <tr class="table-dark">
                                <td><b>Total</b></td>
                                <td style="text-align: right;">
                                    <b>469,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>605,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>350,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>604,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>257,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>464,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>228,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>303,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>229,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>169,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>157,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>130,000</b>
                                </td>
                                <td style="text-align: right;"><b>3,965,000</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>


@endsection