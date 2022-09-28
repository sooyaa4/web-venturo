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
                        <?php
                        $totalmenuperbulan = 0; 
                        $totalperbulan1 = 0;
                        $totalpermenu1 = 0;
                        $totalmenuall = 0;
                        $totalmenuall += $totalpermenu1;
                        $totalmenuperbulan += $totalperbulan1;
                        ?>
                        @foreach ($responsebody as $c )
                        @if ($c->kategori == 'makanan') 
                            @for ($i = 1; $i <= 12; $i++)
                                @foreach ($responseBody as $d)
                                    @if ($c->menu == $d->menu && (Carbon\Carbon::parse($d->tanggal)->format('n')  == $i ))
                                        <?php
                                        $totalperbulan1 += $d->total;
                                        $totalpermenu1 += $d->total;      
                                        $totalmenuperbulan += $d->total;  
                                        $totalmenuall += $d->total;                              
                                        ?>
                                    @endif
                                @endforeach
                            @endfor
                        <?php
                            $totalperbulan1 = 0;
                        ?>
                        @endif
                        @endforeach
                    <tr>
                        <td class="table-secondary" colspan="1"><b>Makanan</b></td>
                        @for ($i = 1; $i <= 12; $i++)
                            <td class="table-secondary" style="text-align: right;"><b><?= $english_format_number = number_format($totalmenuperbulan) ?></b></td> 
                        @endfor
                        <td class="table-secondary" style="text-align: right;"><b><?= $english_format_number = number_format($totalmenuall) ?></b></td> 
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
                                        @if ($c->menu == $d->menu && (Carbon\Carbon::parse($d->tanggal)->format('n')  == $i ) && $d->total)
                                            <?php
                                            $totalperbulan += $d->total;
                                            $totalpermenu += $d->total;
                                            ?>
                                        @endif
                                    @endforeach
                                     @if ($totalperbulan == 0)
                                        <td></td>
                                     @else
                                        <td style="text-align: right;"><?= $english_format_number = number_format($totalperbulan) ?></td>
                                    @endif
                                @endfor
                            <?php
                                $totalperbulan = 0;
                            ?>
                            <td style="text-align: right;"><b><?= $english_format_number = number_format($totalpermenu) ?></b></td>
                            </tr>
                            <?php
                            $total += $totalpermenu;
                            $totalpermenu = 0;
                            ?>
                            @endif
                            @endforeach

                            <?php
                            $totalmenuperbulan1 = 0;
                            $totalperbulan2 = 0;
                            $totalpermenu2 = 0;
                            $totalmenuall1 = 0;
                            $totalmenuall1 += $totalpermenu2;
                            ?>
                            @foreach ($responsebody as $c )
                            @if ($c->kategori == 'minuman') 
                                @for ($i = 1; $i <= 12; $i++)
                                    @foreach ($responseBody as $d)
                                        @if ($c->menu == $d->menu && (Carbon\Carbon::parse($d->tanggal)->format('n')  == $i ))
                                            <?php
                                            $totalperbulan2 += $d->total;
                                            $totalpermenu2 += $d->total;       
                                            $totalmenuall1 += $d->total;                              
                                            ?>
                                        @endif
                                        @if ($c->menu == $d->menu && (Carbon\Carbon::parse($d->tanggal)->format('n')  == $i ))
                                            <?php     
                                            $totalmenuperbulan1 += $totalperbulan2;                             
                                            ?>
                                        @endif
                                    @endforeach
                                @endfor

                            @endif
                            @endforeach
                        <tr>
                            <td class="table-secondary" colspan="1"><b>Minuman</b></td>
                            @for ($i = 1; $i <= 12; $i++)
                                <td class="table-secondary" style="text-align: right;"><b><?= $english_format_number = number_format($totalmenuperbulan1) ?></b></td> 
                            @endfor
                            <td class="table-secondary" style="text-align: right;"><b><?= $english_format_number = number_format($totalmenuall1) ?></b></td> 
                        </tr>

                            <?php
                            $totalperbulan = 0;
                            $totalpermenu = 0 ;
                            ?>
                            @foreach ($responsebody as $c )
                                @if ($c->kategori == 'minuman')
                                    <tr>
                                        <td>{{ $c->menu}}</td>  
                                            @for ($i = 1; $i <= 12; $i++)
                                                @foreach ($responseBody as $d)
                                                    @if ($c->menu == $d->menu && $d->total != null && ((Carbon\Carbon::parse($d->tanggal)->format('n') == $i)))
                                                            <?php
                                                                $totalperbulan += $d->total;
                                                                $totalpermenu += $d->total;
                                                            ?>          
                                                    @endif
                                                @endforeach
                                                @if ($totalperbulan == 0)
                                                    <td></td>
                                                @else
                                                    <td style="text-align: right;"><?= $english_format_number = number_format($totalperbulan) ?></td>
                                                @endif                                           
                                            @endfor
                                            <?php
                                                $totalperbulan = 0;
                                            ?>
                                        <td style="text-align: right;"><b><?= $english_format_number = number_format($totalpermenu) ?></b></td>
                                    </tr>
                                    <?php
                                        $total += $totalpermenu;
                                        $totalpermenu = 0;
                                    ?>
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
                                    @if ($totalperbulan == 0)
                                        <td></td>
                                    @else
                                        <td style="text-align: right;"><b><?= $english_format_number = number_format($totalperbulan) ?></b></td>
                                    @endif  
                                    <?php
                                        $totalperbulan = 0;
                                    ?>
                                @endfor
                                <td style="text-align: right;"><b><?= $english_format_number = number_format($totalpermenu) ?></b></td>
                            </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection