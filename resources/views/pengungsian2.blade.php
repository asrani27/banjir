@extends('layouts.app')

@push('css') 
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<style>
  #mapid { height: 350px; }
</style>
@endpush


@section('content')
<h5 class="mb-2"><i class="fas fa-database"></i> Data Bencana Banjarmasin</h5>
  
  @include('box')
  
  @include('button')
  
<div class="row">
  <div class="col-lg-12">
    <div class="card card-danger">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-database"></i> Peta Pengungsian Banjarmasin </h5>
      </div>
      <div class="card-bod">
        <div id="mapid"></div>
        
      </div>
    </div>
  </div>
  <!-- /.col-md-6 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card card-danger">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-chart-line"></i> Data Tempat Pengungsian</h5>
      </div>
      <div class="card-body table-responsive">
          <table id="example1" class="table table-bordered table-striped table-sm">
          <thead>
          <tr class="bg-gradient-danger">
              <th class="text-center">No</th>
              <th class="text-center">Kecamatan</th>
              <th class="text-center">Kelurahan</th>
              <th class="text-center">Lokasi</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Tgl Update</th>
              <th class="text-center">Jam Update</th>
              <th class="text-center">Foto</th>
          </tr>
          </thead>
          <tbody>
              @php
                  $no =1;
              @endphp
              @foreach (pengungsian() as $item)
                  <tr>
                      <td class="text-center">{{$no++}}</td>
                      <td class="text-center">{{$item->kelurahan->kecamatan->nama}}</td>
                      <td class="text-center">{{$item->kelurahan->nama}}</td>
                      <td class="text-center">{{$item->lokasi}}</td>
                      <td class="text-center">{{$item->keterangan}}</td>
                      <td class="text-center">{{\Carbon\Carbon::parse($item->updated_at)->format('d/M/Y')}}</td>
                      <td class="text-center">{{\Carbon\Carbon::parse($item->updated_at)->format('H:i')}} WITA</td>
                      <td class="text-center">
                        @if ($item->file == null)
                            -
                        @else  
                          <img src="/storage/{{$item->file}}" width="100">
                        @endif
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
@include('rekap')

@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>


<script>
  
    var map = L.map('mapid').setView([-3.320363756863717, 114.6000705394259], 14);
    

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
       
        pengungsian = {!!json_encode(petaPengungsian())!!}
   
   var pengungsianIcon = L.icon({
       iconUrl: '/marker/marker-icon-red.png',
   });
   
   for (var i = 0; i < pengungsian.length; i++) { 
    var PopUp = '<strong>KECAMATAN : '+pengungsian[i].nama_kecamatan+'</strong><br/>\
        <strong>KELURAHAN : '+pengungsian[i].nama_kelurahan+'</strong><br/>\
        <strong>LOKASI : '+pengungsian[i].lokasi+'</strong><br/>\
        <strong>KETERANGAN : '+pengungsian[i].keterangan+'</strong><br/>\
        <img src="/storage/'+pengungsian[i].file+'" width=100>';
   L.marker([pengungsian[i].lat, pengungsian[i].long],{icon:pengungsianIcon}).addTo(map).bindPopup(PopUp);
   }
</script>
{{-- <script>
  var ctx = document.getElementById('myChart').getContext('2d');
        var dates = {!!json_encode($data['tanggal'])!!}
        var konfirmasi = {!!json_encode($data['konfirmasi'])!!}
        var suspect = {!!json_encode($data['suspect'])!!}
        var probable = {!!json_encode($data['probable'])!!}
        console.log(dates);
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: dates,
          datasets: [
            {
              label: 'KONFIRMASI',
              fill: false,
              data: konfirmasi,
              borderColor: [
                  'rgba(26, 193, 185, 1)'
              ],
              borderWidth: 2
            },{
              label: 'SUSPECT',
              fill: false,
              data: suspect,
             
              borderColor: [
                  'rgba(0, 143, 24, 1)'
              ],
              borderWidth: 2
            },{
              label: 'PROBABLE',
              fill: false,
              data: probable,
             
              borderColor: [
                  'rgba(143, 0, 0, 1)'
              ],
              borderWidth: 2
            },
          
          ]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
</script> --}}

@endpush