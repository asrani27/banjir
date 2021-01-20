@extends('layouts.app_admin')

@push('css') 
<!-- DataTables -->
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

@endpush

@section('content')
<a href="/admin/dapur/add" class="btn btn-sm bg-gradient-purple"><i class="fas fa-plus"></i>&nbsp; Tambah Data</a> <br /><br />
<div class="row">
  <div class="col-lg-12">
    <div class="card card-success">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Data Dapur Umum </h5>
      </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
            <tr class="bg-gradient-primary">
                <th class="text-center">No</th>
                <th class="text-center">Kecamatan</th>
                <th class="text-center">Kelurahan</th>
                <th class="text-center">Lokasi</th>
                <th class="text-center">Tgl Update</th>
                <th class="text-center">Jam Update</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Lat</th>
                <th class="text-center">Long</th>
                <th class="text-center">#</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$item->kelurahan->kecamatan->nama}}</td>
                        <td class="text-center">{{$item->kelurahan->nama}}</td>
                        <td class="text-center">{{$item->lokasi}}</td>
                        <td class="text-center">{{\Carbon\Carbon::parse($item->updated_at)->format('d/M/Y')}}</td>
                        <td class="text-center">{{\Carbon\Carbon::parse($item->updated_at)->format('H:i')}}</td>
                        <td class="text-center">{{$item->keterangan}}</td>
                        <td class="text-center">
                          @if ($item->file == null)
                              -
                          @else  
                            <img src="/storage/{{$item->file}}" width="100">
                          @endif
                        </td>
                        <td class="text-center">{{$item->lat}}</td>
                        <td class="text-center">{{$item->long}}</td>
                        <td class="text-center">
                            <a href="/admin/dapur/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="/admin/dapur/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
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