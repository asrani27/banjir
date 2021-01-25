@extends('layouts.app_admin')

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
<div class="row">
  <div class="col-md-4 col-sm-6 col-12">
    <a href="/home" class="btn btn-primary btn-block"><strong>LOKASI BANJIR</strong></a>
  </div>
  <div class="col-md-4 col-sm-6 col-12">
    <a href="/admin/dapur-umum" class="btn btn-success btn-block"><strong>DAPUR UMUM</strong></a>
  </div>
  <div class="col-md-4 col-sm-6 col-12">
    <a href="/admin/pengungsianmap" class="btn btn-danger btn-block"><strong>TEMPAT PENGUNGSIAN</strong></a>
  </div>
</div> 
<br/>
  
<div class="row">
  
  <div class="col-lg-12">
    <div class="card card-primary">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-database"></i> Peta Banjir Banjarmasin </h5>
      </div>
      <div class="card-bod">
        <div id="mapid"></div>
        
        <table id="example1" class="table table-bordered table-striped table-sm">
          <thead>
          <tr class="bg-gradient-primary">
              <th class="text-center">No</th>
              <th class="text-center">Kecamatan</th>
              <th class="text-center">Kelurahan</th>
              <th class="text-center">Lokasi</th>
              <th class="text-center">Tinggi Air (cm)</th>
              <th class="text-center">Tgl Update</th>
              <th class="text-center">Jam Update</th>
          </tr>
          </thead>
          <tbody>
              @php
                  $no =1;
              @endphp
              @foreach (banjir() as $item)
                  <tr>
                      <td class="text-center">{{$no++}}</td>
                      <td class="text-center">{{$item->kelurahan->kecamatan->nama}}</td>
                      <td class="text-center">{{$item->kelurahan->nama}}</td>
                      <td class="text-center">{{$item->lokasi}}</td>
                      <td class="text-center">{{$item->tinggi_air}}</td>
                      <td class="text-center">{{\Carbon\Carbon::parse($item->updated_at)->format('d/M/Y')}}</td>
                      <td class="text-center">{{\Carbon\Carbon::parse($item->updated_at)->format('H:i')}} WITA</td>
                  </tr>
              @endforeach
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /.col-md-6 -->
</div>


@include('rekapadmin')
@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>


<script>
    var map = L.map('mapid').setView([-3.320363756863717, 114.6000705394259], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

    banjir = {!!json_encode(petaBanjir())!!}
   
   var banjirIcon = L.icon({
       iconUrl: '/marker/marker-icon-blue.png',
   });
   
   for (var i = 0; i < banjir.length; i++) { 
    var PopUp = '<strong>KECAMATAN : '+banjir[i].nama_kecamatan+'</strong><br/>\
        <strong>KELURAHAN : '+banjir[i].nama_kelurahan+'</strong><br/>\
        <strong>LOKASI : '+banjir[i].lokasi+'</strong><br/>\
        <strong>TINGGI AIR : '+banjir[i].tinggi_air+' cm</strong><br/>\
        <img src="/storage/'+banjir[i].file+'" width=100>';
   L.marker([banjir[i].lat, banjir[i].long],{icon:banjirIcon}).addTo(map).bindPopup(PopUp);
   }
</script>
@endpush