@extends('layouts.app_admin')

@push('css') 
<!-- DataTables -->
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

@endpush

@section('content')
<a href="/admin/rekapitulasi/add" class="btn btn-sm bg-gradient-purple"><i class="fas fa-plus"></i>&nbsp; Tambah Data</a> <br /><br />
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Data Rekapitulasi Akibat Banjir </h5>
      </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
            <tr class="bg-gradient-primary">
                <th class="text-center" rowspan=2>No</th>
                <th class="text-center" rowspan=2>Kecamatan</th>
                <th class="text-center" rowspan=2>Kelurahan</th>
                <th class="text-center" rowspan=2>Nama Lokasi</th>
                <th class="text-center" rowspan=2>RT</th>
                <th class="text-center" rowspan=2>RW</th>
                <th class="text-center" colspan=2>Terdampak</th>
                <th class="text-center" colspan=2>Mengungsi</th>
                <th class="text-center" rowspan=2>Balita</th>
                <th class="text-center" rowspan=2>Lansia</th>
                <th class="text-center" rowspan=2>Perempuan</th>
                <th class="text-center" rowspan=2>Keterangan/Lokasi Pengungsian</th>
                <th class="text-center" rowspan=2>#</th>
            </tr>
            <tr class="bg-gradient-primary">
              <th class="text-center">KK</th>
              <th class="text-center">Jiwa</th>
              <th class="text-center">KK</th>
              <th class="text-center">Jiwa</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach ($data as $item)
                    <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                        <td>{{$no++}}</td>
                        <td>{{$item->lokasi->kelurahan->kecamatan->nama}}</td>
                        <td>{{$item->lokasi->kelurahan->nama}}</td>
                        <td>{{$item->lokasi->nama}}</td>
                        <td>{{$item->rt}}</td>
                        <td>{{$item->rw}}</td>
                        <td>{{$item->terdampak_kk}}</td>
                        <td>{{$item->terdampak_jiwa}}</td>
                        <td>{{$item->mengungsi_kk}}</td>
                        <td>{{$item->mengungsi_jiwa}}</td>
                        <td>{{$item->balita}}</td>
                        <td>{{$item->lansia}}</td>
                        <td>{{$item->ibu}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td>
                          <a href="/admin/rekapitulasi/edit/{{$item->id}}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit Data"><i class="fas fa-edit"></i></a>
                          <a href="/admin/rekapitulasi/delete/{{$item->id}}" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Yakin Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
                        </td>
                        {{-- <td>{{$item->kelurahan->nama}}</td>
                        <td>{{$item->kelurahan->kecamatan->nama}}</td>
                        <td>
                            <a href="/admin/lokasi/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="/admin/lokasi/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
                        </td> --}}
                    </tr>
                @endforeach
            
            </tbody>
            <tfoot>
              <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                <th></th>
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>{{$data->sum('terdampak_kk')}}</th>
                <th>{{$data->sum('terdampak_jiwa')}}</th>
                <th>{{$data->sum('mengungsi_kk')}}</th>
                <th>{{$data->sum('mengungsi_jiwa')}}</th>
                <th>{{$data->sum('balita')}}</th>
                <th>{{$data->sum('lansia')}}</th>
                <th>{{$data->sum('ibu')}}</th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
            </table>
        </div>
    </div>
  </div>
  <!-- /.col-md-6 -->
  
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Data Rekapitulasi Berdasarkan Kelurahan </h5>
      </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
            <tr class="bg-gradient-primary">
                <th class="text-center" rowspan=2>No</th>
                <th class="text-center" rowspan=2>Kelurahan</th>
                <th class="text-center" colspan=2>Terdampak</th>
                <th class="text-center" colspan=2>Mengungsi</th>
                <th class="text-center" rowspan=2>Balita</th>
                <th class="text-center" rowspan=2>Lansia</th>
                <th class="text-center" rowspan=2>Perempuan</th>
            </tr>
            <tr class="bg-gradient-primary">
              <th class="text-center">KK</th>
              <th class="text-center">Jiwa</th>
              <th class="text-center">KK</th>
              <th class="text-center">Jiwa</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach ($kel as $item)
                    <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                        <td>{{$no++}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->terdampak_kk}}</td>
                        <td>{{$item->terdampak_jiwa}}</td>
                        <td>{{$item->mengungsi_kk}}</td>
                        <td>{{$item->mengungsi_jiwa}}</td>
                        <td>{{$item->balita}}</td>
                        <td>{{$item->lansia}}</td>
                        <td>{{$item->ibu}}</td>
                        {{-- <td>{{$item->kelurahan->nama}}</td>
                        <td>{{$item->kelurahan->kecamatan->nama}}</td>
                        <td>
                            <a href="/admin/lokasi/edit/{{$item->id}}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="/admin/lokasi/delete/{{$item->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
                        </td> --}}
                    </tr>
                @endforeach
            
            </tbody>
            <tfoot>
              <tr style="font-size:11px; font-family:Arial, Helvetica, sans-serif">
                <th></th>
                <th>TOTAL</th>
                <th>{{$data->sum('terdampak_kk')}}</th>
                <th>{{$data->sum('terdampak_jiwa')}}</th>
                <th>{{$data->sum('mengungsi_kk')}}</th>
                <th>{{$data->sum('mengungsi_jiwa')}}</th>
                <th>{{$data->sum('balita')}}</th>
                <th>{{$data->sum('lansia')}}</th>
                <th>{{$data->sum('ibu')}}</th>
              </tr>
            </tfoot>
            </table>
        </div>
    </div>
  </div>
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