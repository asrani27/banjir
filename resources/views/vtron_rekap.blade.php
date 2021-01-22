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
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Data Rekapitulasi Dampak Bencana </h5>
      </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
              <tr class="bg-gradient-purple">
                  <th rowspan=2 class="text-center" style="vertical-align:middle;">No</th>
                  <th rowspan=2 class="text-center" style="vertical-align:middle;">Nama Kecamatan</th>
                  <th colspan=2 class="text-center">Terdampak</th>
                  <th colspan=2 class="text-center">Mengungsi</th>
                  <th rowspan=2 class="text-center" style="vertical-align:middle;">Balita</th>
                  <th rowspan=2 class="text-center" style="vertical-align:middle;">Lansia</th>
                  <th rowspan=2 class="text-center" style="vertical-align:middle;">Perempuan</th>
                  {{-- <th rowspan=2 class="text-center"></th> --}}
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
                    $no =1;
                @endphp
                @foreach (rekapitulasi() as $item)
                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td class="text-center">{{$item->nama}}</td>
                    <td class="text-center">{{number_format($item->terdampak_kk)}}</td>
                    <td class="text-center">{{number_format($item->terdampak_jiwa)}}</td>
                    <td class="text-center">{{number_format($item->mengungsi_kk)}}</td>
                    <td class="text-center">{{number_format($item->mengungsi_jiwa)}}</td>
                    <td class="text-center">{{number_format($item->balita)}}</td>
                    <td class="text-center">{{number_format($item->lansia)}}</td>
                    <td class="text-center">{{number_format($item->ibu)}}</td>
                    {{-- <td>
                        <a href="/rekapitulasi/detail/{{$item->id}}" class="btn btn-sm btn-primary">Detail</a>
                    </td> --}}
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th></th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center">{{number_format(rekapitulasi()->sum('terdampak_kk'))}}</th>
                        <th class="text-center">{{number_format(rekapitulasi()->sum('terdampak_jiwa'))}}</th>
                        <th class="text-center">{{number_format(rekapitulasi()->sum('mengungsi_kk'))}}</th>
                        <th class="text-center">{{number_format(rekapitulasi()->sum('mengungsi_jiwa'))}}</th>
                        <th class="text-center">{{number_format(rekapitulasi()->sum('balita'))}}</th>
                        <th class="text-center">{{number_format(rekapitulasi()->sum('lansia'))}}</th>
                        <th class="text-center">{{number_format(rekapitulasi()->sum('ibu'))}}</th>
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