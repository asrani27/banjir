@extends('layouts.app_admin')

@push('css') 
<!-- DataTables -->
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

@endpush

@section('content')

<a href="/admin/json/store" class="btn btn-sm bg-gradient-info"><i class="fas fa-sync-alt"></i>&nbsp; Store Data Json</a> 
{{-- <a href="/admin/json/rekap/print" class="btn btn-sm bg-gradient-info"><i class="fas fa-print"></i>&nbsp; Rekap</a> 
<a href="/admin/json/rekapluar/print" class="btn btn-sm bg-gradient-info"><i class="fas fa-print"></i>&nbsp; Rekap Luar</a> 
<a href="/admin/json/dapur/print" class="btn btn-sm bg-gradient-info"><i class="fas fa-print"></i>&nbsp; Dapur Umum</a> 
<a href="/admin/json/pengungsian/print" class="btn btn-sm bg-gradient-info"><i class="fas fa-print"></i>&nbsp; Pengungsian</a>  --}}

<br /><br />
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Data Per Tanggal</h5>
      </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
            <tr class="bg-gradient-primary">
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Data Rekap Dalam Kota</th>
                <th class="text-center">Data Rekap Luar Kota</th>
                <th class="text-center">Data Titik Banjir</th>
                <th class="text-center">Data Dapur Umum</th>
                <th class="text-center">Pengungsian</th>
                <th class="text-center"></th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach ($data as $item)
                    <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                        <td>{{$no++}}</td>
                        <td class="text-center">{{\Carbon\Carbon::parse($item->tanggal)->format('d/M/Y')}}</td>
                        <td class="text-center">
                            @if($item->json_rekap == null)
                            -
                            @else
                            <a href="/admin/json/json_rekap/{{$item->id}}" target="_blank"><i class="fas fa-eye"></i></a>
                            <a href="/admin/json/json_rekap/print/{{$item->id}}" class="btn btn-xs bg-gradient-info"><i class="fas fa-print"></i>&nbsp; print</a> 
                            @endif
                        </td>
                        <td class="text-center">
                            @if($item->json_rekapluar == null)
                            -
                            @else
                            <a href="/admin/json/json_rekapluar/{{$item->id}}" target="_blank"><i class="fas fa-eye"></i></a>
                            <a href="/admin/json/json_rekapluar/print/{{$item->id}}" class="btn btn-xs bg-gradient-info"><i class="fas fa-print"></i>&nbsp; print</a> 
                            @endif
                        </td>
                        <td class="text-center">
                            @if($item->json_banjir == null)
                            -
                            @else
                            <a href="/admin/json/json_banjir/{{$item->id}}" target="_blank"><i class="fas fa-eye"></i></a>
                            <a href="/admin/json/json_banjir/print/{{$item->id}}" class="btn btn-xs bg-gradient-info"><i class="fas fa-print"></i>&nbsp; print</a> 
                            @endif
                        </td>
                        <td class="text-center">
                            @if($item->json_dapur == null)
                            -
                            @else
                            <a href="/admin/json/json_dapur/{{$item->id}}" target="_blank"><i class="fas fa-eye"></i></a>
                            <a href="/admin/json/json_dapur/print/{{$item->id}}" class="btn btn-xs bg-gradient-info"><i class="fas fa-print"></i>&nbsp; print</a> 
                            @endif
                        </td>
                        <td class="text-center">
                            @if($item->json_pengungsian == null)
                            -
                            @else
                            <a href="/admin/json/json_pengungsian/{{$item->id}}" target="_blank"><i class="fas fa-eye"></i></a>
                            <a href="/admin/json/json_pengungsian/print/{{$item->id}}" class="btn btn-xs bg-gradient-info"><i class="fas fa-print"></i>&nbsp; print</a> 
                            @endif
                        </td>
                        <td class="text-center">
                          <a href="/admin/json/usedata/{{$item->id}}" class="btn btn-xs bg-gradient-purple">Use DB <i class="fas fa-database"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
  </div>
  <!-- /.col-md-6 -->
</div>
@endsection

@push('js')
<!-- DataTables -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush