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
                            <th colspan="12" style="text-align: center;">Periode Pada {{ $tahun }}</th>
                            <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total</th>
                        </tr>
                        <tr class="table-dark">
                             @foreach ($namaBulan as $d )
                                <th style="text-align: center;width: 75px;">{{ $d }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="table-secondary" colspan="14"><b>Makanan</b></td>
                            </tr>
                            <?php
                            $totalperbulan = 0;
                            $totalpermenu = 0;
                            $total = 0;
                            ?>
                            @foreach ($responsebody as $c )
                            @if ($c->kategori == 'makanan')
                            <tr>
                                <td>{{ $c->menu}}</td>  
                                @for ($i = 1; $i <= 12; $i++)
                                    @foreach ($responseBody as $d)
                                        @if ($c->menu == $d->menu && (Carbon\Carbon::parse($d->tanggal)->format('n')  == $i ))
                                            <?php
                                            $totalperbulan += $d->total;
                                            $totalpermenu += $d->total;
                                            ?>
                                        @endif
                                    @endforeach
                                    <td style="text-align: right;">{{ $totalperbulan }}</td>
                                @endfor
                            <?php
                                $totalperbulan = 0;
                            ?>
                            <td style="text-align: right;"><b> {{$totalpermenu }}</b></td>
                            </tr>
                            @endif
                            @endforeach

                            <tr>
                                <td class="table-secondary" colspan="14"><b>Minuman</b></td>
                            </tr>
                            @foreach ($responsebody as $c )
                                @if ($c->kategori == 'minuman')
                                    <tr>
                                        <td>{{ $c->menu}}</td>  
                                            @for ($i = 1; $i <= 12; $i++)
                                                @foreach ($responseBody as $d)
                                                    @if ($c->menu == $d->menu && (Carbon\Carbon::parse($d->tanggal)->format('n') == $i))
                                                        <?php
                                                        $totalperbulan += $d->total;
                                                        $totalpermenu += $d->total;
                                                        ?>
                                                    @endif
                                                @endforeach
                                                <td style="text-align: right;">{{ $totalperbulan }}</td>
                                            @endfor

                                        <?php
                                            $total += $totalpermenu;
                                            $totalperbulan = 0;
                                        ?>

                                        <td style="text-align: right;"><b>{{$totalpermenu}}</b></td>
                                    </tr>
                                 @endif
                            @endforeach

                            <tr class="table-dark">
                                <td><b>Total</b></td>
                                @for ($i = 1; $i <= 12; $i++)
                                    @foreach ($responseBody as $d)
                                        @if ((Carbon\Carbon::parse($d->tanggal)->format('n')  == $i ))
                                            <?php
                                            $totalperbulan += $d->total;
                                            $totalpermenu += $d->total;
                                            ?>
                                        @endif
                                    @endforeach
                                    <td style="text-align: right;">{{ $totalperbulan }}
                                @endfor
                            <td style="text-align: right;">{{ $totalpermenu }}</td>
                            </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection