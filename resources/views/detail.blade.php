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



    <!-- Video -->
    <div class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="/"><h5>< BERANDA</h5></a>
                    <h2>Tabel Rekapitulasi Dampak Bencana</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr class="bg-gradient-purple">
                                    <th rowspan=2 class="text-center" style="vertical-align:middle;">No</th>
                                    <th rowspan=2 class="text-center" style="vertical-align:middle;">Nama Kecamatan</th>
                                    <th rowspan=2 class="text-center" style="vertical-align:middle;">Kelurahan</th>
                                    <th rowspan=2 class="text-center" style="vertical-align:middle;">Lokasi</th>
                                    <th colspan=2 class="text-center">Terdampak</th>
                                    <th colspan=2 class="text-center">Mengungsi</th>
                                    <th rowspan=2 class="text-center" style="vertical-align:middle;">Balita</th>
                                    <th rowspan=2 class="text-center" style="vertical-align:middle;">Lansia</th>
                                    <th rowspan=2 class="text-center" style="vertical-align:middle;">Perempuan</th>
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
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center">{{$item->kecamatan->nama}}</td>
                                    <td class="text-center">{{$item->kelurahan->nama}}</td>
                                    <td class="text-center">{{$item->lokasi->nama}}</td>
                                    <td class="text-center">{{$item->terdampak_kk}}</td>
                                    <td class="text-center">{{$item->terdampak_jiwa}}</td>
                                    <td class="text-center">{{$item->mengungsi_kk}}</td>
                                    <td class="text-center">{{$item->mengungsi_jiwa}}</td>
                                    <td class="text-center">{{$item->balita}}</td>
                                    <td class="text-center">{{$item->lansia}}</td>
                                    <td class="text-center">{{$item->ibu}}</td>
                                </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-center">TOTAL</th>
                                        <th class="text-center">{{number_format($data->sum('terdampak_kk'))}}</th>
                                        <th class="text-center">{{number_format($data->sum('terdampak_jiwa'))}}</th>
                                        <th class="text-center">{{number_format($data->sum('mengungsi_kk'))}}</th>
                                        <th class="text-center">{{number_format($data->sum('mengungsi_jiwa'))}}</th>
                                        <th class="text-center">{{number_format($data->sum('balita'))}}</th>
                                        <th class="text-center">{{number_format($data->sum('lansia'))}}</th>
                                        <th class="text-center">{{number_format($data->sum('ibu'))}}</th>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
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
                    <p class="p-small">Copyright © 2020 <a href="https://inovatik.com">Diskominfotik Banjarmasin</a> - All rights reserved</p>
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
    
</body>
</html>