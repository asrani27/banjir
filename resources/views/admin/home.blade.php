@extends('layouts.app_admin')

@push('css') 
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<style>
    #mapbanjir { height: 350px; }
    #mapdapur { height: 350px; }
    #mappengungsian { height: 350px; }
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
    <a href="/admin/pengungsian" class="btn btn-danger btn-block"><strong>TEMPAT PENGUNGSIAN</strong></a>
  </div>
</div> 
<br/>
  
<div class="row">
  <div class="col-12 col-sm-12">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          <li class="pt-2 px-3"><h3 class="card-title">Peta :</h3></li>
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Lokasi Banjir</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Dapur Umum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Tempat Pengungsian</a>
          </li>
        </ul>
      </div>
      <div class="card-body table-responsive">
        <div class="tab-content" id="custom-tabs-two-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
            <div id="mapbanjir"></div><br />
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
          <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
            <div id="mapdapur"></div><br />
            <table id="example1" class="table table-bordered table-striped table-sm">
              <thead>
              <tr class="bg-gradient-primary">
                  <th class="text-center">No</th>
                  <th class="text-center">Kecamatan</th>
                  <th class="text-center">Kelurahan</th>
                  <th class="text-center">Lokasi</th>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center">Tgl Update</th>
                  <th class="text-center">Jam Update</th>
              </tr>
              </thead>
              <tbody>
                  @php
                      $no =1;
                  @endphp
                  @foreach (dapur() as $item)
                      <tr>
                          <td class="text-center">{{$no++}}</td>
                          <td class="text-center">{{$item->kelurahan->kecamatan->nama}}</td>
                          <td class="text-center">{{$item->kelurahan->nama}}</td>
                          <td class="text-center">{{$item->lokasi}}</td>
                          <td class="text-center">{{$item->keterangan}}</td>
                          <td class="text-center">{{\Carbon\Carbon::parse($item->updated_at)->format('d/M/Y')}}</td>
                          <td class="text-center">{{\Carbon\Carbon::parse($item->updated_at)->format('H:i')}} WITA</td>
                      </tr>
                  @endforeach
              
              </tbody>
              </table>
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
            <div id="mappengungsian"></div><br />
            <table id="example1" class="table table-bordered table-striped table-sm">
              <thead>
              <tr class="bg-gradient-primary">
                  <th class="text-center">No</th>
                  <th class="text-center">Kecamatan</th>
                  <th class="text-center">Kelurahan</th>
                  <th class="text-center">Lokasi</th>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center">Tgl Update</th>
                  <th class="text-center">Jam Update</th>
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
                      </tr>
                  @endforeach
              
              </tbody>
              </table>
         </div>\
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>

@include('rekapadmin')
@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>

<script>
    var map = L.map('mapbanjir').setView([-3.320363756863717, 114.6000705394259], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        map.invalidateSize();
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

<script>
  var mapdapur = L.map('mapdapur').setView([-3.320363756863717, 114.6000705394259], 14);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(mapdapur);
      mapdapur.invalidateSize();
  dapur = {!!json_encode(petaDapur())!!}
 
 var dapurIcon = L.icon({
     iconUrl: '/marker/marker-icon-green.png',
 });
 
 for (var i = 0; i < dapur.length; i++) { 
  var PopUp = '<strong>KECAMATAN : '+dapur[i].nama_kecamatan+'</strong><br/>\
      <strong>KELURAHAN : '+dapur[i].nama_kelurahan+'</strong><br/>\
      <strong>LOKASI : '+dapur[i].lokasi+'</strong><br/>\
      <strong>TINGGI AIR : '+dapur[i].tinggi_air+' cm</strong><br/>\
      <img src="/storage/'+dapur[i].file+'" width=100>';
 L.marker([dapur[i].lat, dapur[i].long],{icon:dapurIcon}).addTo(mapdapur).bindPopup(PopUp);
 }
</script>

<script>
  var mappengungsian = L.map('mappengungsian').setView([-3.320363756863717, 114.6000705394259], 14);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(mappengungsian);

      mappengungsian.invalidateSize();
  pengungsian = {!!json_encode(petaPengungsian())!!}
 
 var pengungsianIcon = L.icon({
     iconUrl: '/marker/marker-icon-red.png',
 });
 
 for (var i = 0; i < pengungsian.length; i++) { 
  var PopUp = '<strong>KECAMATAN : '+pengungsian[i].nama_kecamatan+'</strong><br/>\
      <strong>KELURAHAN : '+pengungsian[i].nama_kelurahan+'</strong><br/>\
      <strong>LOKASI : '+pengungsian[i].lokasi+'</strong><br/>\
      <strong>TINGGI AIR : '+pengungsian[i].tinggi_air+' cm</strong><br/>\
      <img src="/storage/'+pengungsian[i].file+'" width=100>';
 L.marker([pengungsian[i].lat, pengungsian[i].long],{icon:pengungsianIcon}).addTo(mappengungsian).bindPopup(PopUp);
 }
</script>
@endpush