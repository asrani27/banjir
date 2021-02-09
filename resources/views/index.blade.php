<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Posko Bencana Banjarmasin</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="/front/css/bootstrap.css" rel="stylesheet">
    <link href="/front/css/fontawesome-all.css" rel="stylesheet">
    <link href="/front/css/swiper.css" rel="stylesheet">
	<link href="/front/css/magnific-popup.css" rel="stylesheet">
	<link href="/front/css/styles.css" rel="stylesheet">
	
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <style>
        #mapid { height: 450px; width:100% }
        #mapidbanjir { height: 450px; width:100% }
    </style>
	<!-- Favicon  -->
    <link rel="icon" href="/front/images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="/front/images/logo1.png" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/login">Login <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="#your-link">
                        <i class="fas fa-circle fa-stack-2x twitter"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise">POS KOMANDO</span></h1>
                            <h3>PENANGANAN DARURAT BENCANA BANJIR</h3>
                            <h3>KOTA BANJARMASIN 2021</h3>
                            <br>
<!--                             <p class="p-large">Use Evolo free landing page template to promote your business startup and generate leads for the offered services</p> -->
                            {{-- <a class="btn-solid-lg page-scroll" href="#services">Lapor Kondisi</a> --}}
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="/front/images/depan.png" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <!-- Services -->
    <div id="services" class="cards-1">
        @include('terkini')
    </div> <!-- end of cards-1 -->
    <!-- end of services -->

    
    <div id="services" style="text-align: center">
        @include('grafik')
    </div> <!-- end of cards-1 -->

    <!-- Customers -->
    <div class="slider-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Infografis</h3>
                    
                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                @include('infografis')
                            </div> <!-- end of swiper-wrapper -->
                        </div> <!-- end of swiper container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of customers -->
    <!-- Services -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('sigap')
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div>
    <!-- end of services -->

    <!-- Video -->
    <div class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Pemetaan Data Bencana</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div>
       <div class="container">
            <div class="row">
                @include('button')
            </div>                    
        </div> <!-- end of container -->
        <br>
       <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Video Preview -->   
                        <div id="mapid"></div>
                    <!-- end of video preview -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of video -->

    <!-- Video -->
    <div class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Data Rekapitulasi Posisi Banjir</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card-body table-responsive">
                        @include('titik')
                    </div>
 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of video -->

    <!-- Video -->
    <div class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Data Rekapitulasi Dampak Bencana</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body table-responsive">
                        @include('rekap')
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->

        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Data Pengungsi Dari Luar Kota</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body table-responsive">
                        @include('rekapluar')
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of video -->



    <!-- Customers -->
    <div class="slider-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Kegiatan</h3>
                    
                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                @include('galery')
                            </div> <!-- end of swiper-wrapper -->
                        </div> <!-- end of swiper container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of customers -->
    
    <!-- Details 2 -->
    <div class="basic-2">
        <div class="container">
            <div class="row">

                    @include('donasi')

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 2 -->

    <!-- Details Lightboxes -->
    <!-- Details Lightbox 1 -->
	<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="/front/images/details-lightbox-1.svg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Design And Plan</h3>
                    <hr>
                    <h5>Core feature</h5>
                    <p>The emailing module basically will speed up your email marketing operations while offering more subscriber control.</p>
                    <p>Do you need to build lists for your email campaigns? It just got easier with Evolo.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="#request">REQUEST</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->

    <!-- Details Lightbox 2 -->
	<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="/front/images/details-lightbox-2.svg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Search To Optimize</h3>
                    <hr>
                    <h5>Core feature</h5>
                    <p>The emailing module basically will speed up your email marketing operations while offering more subscriber control.</p>
                    <p>Do you need to build lists for your email campaigns? It just got easier with Evolo.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="#request">REQUEST</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 2 -->
    <!-- end of details lightboxes -->

    <!-- Video -->
    <div class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Call Center Darurat</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                <div class="card-body table-responsive">
                    @include('call')
                </div>
 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of video -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2021 <a href="https://inovatik.com">Diskominfotik Banjarmasin</a> - All rights reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->

    <script src="/front/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="/front/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="/front/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="/front/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="/front/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="/front/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="/front/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="/front/js/scripts.js"></script> <!-- Custom scripts -->
    
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
       iconUrl: '/front/images/posko.png',
       iconSize:[40, 45],
   });
   
   for (var i = 0; i < pengungsian.length; i++) { 
            if(pengungsian[i].file == null){
                var PopUp = '<strong>KECAMATAN : '+pengungsian[i].nama_kecamatan+'</strong><br/>\
                <strong>KELURAHAN : '+pengungsian[i].nama_kelurahan+'</strong><br/>\
                <strong>LOKASI : '+pengungsian[i].lokasi+'</strong><br/>\
                <strong>KETERANGAN : '+pengungsian[i].keterangan+'</strong><br/>';
                L.marker([pengungsian[i].lat, pengungsian[i].long],{icon:pengungsianIcon}).addTo(map).bindPopup(PopUp);
            }else{
                var PopUp = '<strong>KECAMATAN : '+pengungsian[i].nama_kecamatan+'</strong><br/>\
                <strong>KELURAHAN : '+pengungsian[i].nama_kelurahan+'</strong><br/>\
                <strong>LOKASI : '+pengungsian[i].lokasi+'</strong><br/>\
                <strong>KETERANGAN : '+pengungsian[i].keterangan+'</strong><br/>\
                <img src="/storage/'+pengungsian[i].file+'" width=100>';
                L.marker([pengungsian[i].lat, pengungsian[i].long],{icon:pengungsianIcon}).addTo(map).bindPopup(PopUp);
            }
   }
</script>
<script>
    var map = L.map('mapidbanjir').setView([-3.320363756863717, 114.6000705394259], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

    banjir = {!!json_encode(petaBanjir())!!}
   
   var banjirIcon = L.icon({
       iconUrl: '/front/images/banjir3.png',
       iconSize:[40, 45],
   });
   
   for (var i = 0; i < banjir.length; i++) {
       if(banjir[i].lat == '-' || banjir[i].lat == null){

       }else{
            if(banjir[i].file == null){
                var PopUp = '<strong>KECAMATAN : '+banjir[i].nama_kecamatan+'</strong><br/>\
                    <strong>KELURAHAN : '+banjir[i].nama_kelurahan+'</strong><br/>\
                        <strong>LOKASI : '+banjir[i].lokasi+'</strong><br/>\
                        <strong>TINGGI AIR : '+banjir[i].tinggi_air+' cm</strong><br/>';
                L.marker([banjir[i].lat, banjir[i].long],{icon:banjirIcon}).addTo(map).bindPopup(PopUp);
            } else{
                    var PopUp = '<strong>KECAMATAN : '+banjir[i].nama_kecamatan+'</strong><br/>\
                        <strong>KELURAHAN : '+banjir[i].nama_kelurahan+'</strong><br/>\
                        <strong>LOKASI : '+banjir[i].lokasi+'</strong><br/>\
                        <strong>TINGGI AIR : '+banjir[i].tinggi_air+' cm</strong><br/>\
                        <img src="/storage/'+banjir[i].file+'" width=100>';
                L.marker([banjir[i].lat, banjir[i].long],{icon:banjirIcon}).addTo(map).bindPopup(PopUp);
            }
       }
   }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var dates = {!!json_encode($data['tanggal'])!!}
    var banjir = {!!json_encode($data['banjir'])!!}
    var dapur = {!!json_encode($data['dapur'])!!}
    var pengungsian = {!!json_encode($data['pengungsian'])!!}
    var pengungsiluar = {!!json_encode($data['pengungsiluar'])!!}
    
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: dates,
          datasets: [
            {
              label: 'BANJIR',
              fill: false,
              data: banjir,
              borderColor: [
                  'rgba(26, 193, 185, 1)'
              ],
              borderWidth: 2
            },{
              label: 'DAPUR',
              fill: false,
              data: dapur,
             
              borderColor: [
                  'rgba(0, 143, 24, 1)'
              ],
              borderWidth: 2
            },{
              label: 'POS PENGUNGSIAN',
              fill: false,
              data: pengungsian,
             
              borderColor: [
                  'rgba(143, 0, 0, 1)'
              ],
              borderWidth: 2
            },{
              label: 'PENGUNGSI DARI LUAR',
              fill: false,
              data: pengungsiluar,
             
              borderColor: [
                  'rgb(249, 19, 147)'
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
</script>

<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var pengungsi = {!!json_encode($data['pengungsi'])!!}
    
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: dates,
          datasets: [
            {
              label: 'TERDAMPAK (JIWA)',
              fill: false,
              data: pengungsi,
             
              borderColor: [
                  'rgb(251, 127, 80)'
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
</script>
</body>
</html>