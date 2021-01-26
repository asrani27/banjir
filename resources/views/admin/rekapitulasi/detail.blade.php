@extends('layouts.app')

@push('css') 

@endpush


@section('content')
<h5 class="mb-2"><i class="fas fa-database"></i> Rekapitulasi Data Akibat Banjir</h5>
  
<a href="/home" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a> <br /><br />

<div class="row">
    <div class="col-lg-12">
        <div class="card card-purple">
        <div class="card-header">
            <h5 class="card-title m-0"> <i class="fas fa-file"></i> Rekapitulasi Data </h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr class="bg-gradient-purple">
                        <th rowspan=2 class="text-center" style="vertical-align:middle;">No</th>
                        <th rowspan=2 class="text-center" style="vertical-align:middle;">Nama Kecamatan</th>
                        <th rowspan=2 class="text-center" style="vertical-align:middle;">Kelurahan</th>
                        <th colspan=2 class="text-center">Terdampak</th>
                        <th colspan=2 class="text-center">Mengungsi</th>
                        <th rowspan=2 class="text-center" style="vertical-align:middle;">Balita</th>
                        <th rowspan=2 class="text-center" style="vertical-align:middle;">Lansia</th>
                        <th rowspan=2 class="text-center" style="vertical-align:middle;">Perempuan</th>
                    </tr>
                    <tr class="bg-gradient-purple">                    
                        <th class="text-center">KK</th>
                        <th class="text-center">Jiwa</th>
                        <th class="text-center">KK</th>
                        <th class="text-center">Jiwa</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$item->kecamatan}}</td>
                        <td class="text-center">{{$item->nama}}</td>
                        <td class="text-center">{{$item->terdampak_kk}}</td>
                        <td class="text-center">{{$item->terdampak_jiwa}}</td>
                        <td class="text-center">{{$item->mengungsi_kk}}</td>
                        <td class="text-center">{{$item->mengungsi_jiwa}}</td>
                        <td class="text-center">{{$item->balita}}</td>
                        <td class="text-center">{{$item->lansia}}</td>
                        <td class="text-center">{{$item->ibu}}</td>
                    </tr>
                    @endforeach
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center">{{$data->sum('terdampak_kk')}}</th>
                            <th class="text-center">{{$data->sum('terdampak_jiwa')}}</th>
                            <th class="text-center">{{$data->sum('mengungsi_kk')}}</th>
                            <th class="text-center">{{$data->sum('mengungsi_jiwa')}}</th>
                            <th class="text-center">{{$data->sum('balita')}}</th>
                            <th class="text-center">{{$data->sum('lansia')}}</th>
                            <th class="text-center">{{$data->sum('ibu')}}</th>
                        </tr>
                    </tfoot>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
    </div>
@endsection

@push('js')

@endpush