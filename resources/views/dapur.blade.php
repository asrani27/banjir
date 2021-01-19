@extends('layouts.app')

@push('css') 
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<style>
    #mapid { height: 300px; }
</style>
@endpush


@section('content')
<h5 class="mb-2"><i class="fas fa-database"></i> Data Bencana Banjarmasin</h5>
  <div class="row">
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fa fa-phone"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">CALL CENTER</span>
          <span class="info-box-number">0878 1441 4887</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fas fa-hand-holding-heart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">DONASI</span>
          <span class="info-box-number">BCA 809727671 an WAWAN</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-danger"><i class="far fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">TOTAL TERDAMPAK</span>
          <span class="info-box-number">22.345</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  
  @include('button')
  
<div class="row">
  <div class="col-lg-12">
    <div class="card card-success">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-database"></i> Peta Dapur Umum Banjarmasin </h5>
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
    <div class="card card-success">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-chart-line"></i> Data </h5>
      </div>
      <div class="card-body">
        
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