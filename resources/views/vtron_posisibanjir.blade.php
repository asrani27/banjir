@extends('layouts.app_tron')

@push('css') 
<!-- DataTables -->
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 text-center">
        <h2><strong>PUSAT INFORMASI
        BENCANA BANJIR KOTA BANJARMASIN</strong></h2>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Data Titik Banjir, Titik Pengungsian Dan Titik Dapur Umum </h5>
      </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
            <tr class="bg-gradient-primary">
                <th class="text-center">No</th>
                <th class="text-center">Nama Kecamatan</th>
                <th class="text-center">Jumlah Titik Banjir</th>
                <th class="text-center">Jumlah Titik Pengungsian</th>
                <th class="text-center">Jumlah Titik Dapur Umum</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach (titik() as $item)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$item->nama}}</td>
                        <td class="text-center">{{$item->titik_banjir}}</td>
                        <td class="text-center">{{$item->titik_posko}}</td>
                        <td class="text-center">{{$item->titik_dapur}}</td>
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