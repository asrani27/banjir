@extends('layouts.app_admin')

@push('css') 
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<style>
    #mapid { height: 500px; }
</style>
@endpush

@section('content')
<a href="/admin/pengungsian" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a> <br /><br />

<div class="row">
  <div class="col-lg-12">
    <div class="card card-danger">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Edit Data </h5>
      </div>
      <form method="post" action="/admin/pengungsian/edit/{{$data->id}}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kelurahan</label>
            <div class="col-sm-10">
              @if (Auth::user()->hasRole('kelurahan'))
              <input type="text" class="form-control" value="{{Auth::user()->kelurahan->nama}}">
              <input type="hidden" class="form-control" name="kelurahan_id" value="{{Auth::user()->kelurahan->id}}">
                  
              @else
              <select name="kelurahan_id" class="form-control">
                  <option value="">-Pilih-</option>
                  @foreach (kelurahan() as $item)
                  <option value="{{$item->id}}" {{$data->kelurahan_id == $item->id ? 'selected':''}}>{{$item->nama}}</option>
                  @endforeach
              </select>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="lokasi" value="{{$data->lokasi}}" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Map</label>
            <div class="col-sm-10">
                <div id="mapid"></div>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="keterangan" value="{{$data->keterangan}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">File Gambar</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="file">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Lat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="lat" id="lat" required value="{{$data->lat}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Long</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="long" id="long" required value="{{$data->long}}">
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-sm btn-block bg-gradient-primary">Simpan</button>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
  <!-- /.col-md-6 -->
</div>
@endsection

@push('js')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<script>
    var map = L.map('mapid').setView([-3.320363756863717, 114.6000705394259], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
    var theMarker = {};

    map.on('click', function(e) {
        document.getElementById("lat").value = e.latlng.lat;
        document.getElementById("long").value = e.latlng.lng;
    
        if (theMarker != undefined) {
              map.removeLayer(theMarker);
        };

        //Add a marker to show where you clicked.
        theMarker = L.marker([e.latlng.lat,e.latlng.lng]).addTo(map);  

        //L.marker([e.latlng.lat, e.latlng.lng]).addTo(map).on('mouseover', onClick);
    });
       // L.marker(e.latlng.lat, e.latlng.lng).addTo(map).on('mouseover', onClick);
</script>

<script>
  function hanyaAngka(event) {
      var angka = (event.which) ? event.which : event.keyCode
      if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
      return true;
  }
</script>
@endpush