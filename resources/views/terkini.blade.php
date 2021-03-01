<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>UPDATE DATA TERKINI</h2>
            <p class="p-heading p-large">Update Terakhir Tgl : {{\Carbon\carbon::parse(\App\DataJson::orderBy('id','DESC')->first()->tanggal)->format('d M Y')}}</p>
        </div> <!-- end of col -->
    </div> <!-- end of row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Card -->
            <div class="card">
                <img class="card-image" src="/front/images/posko.png" alt="alternative">
                <div class="card-body">
                    <h3 class="card-title">Pos Pengungsian</h3>
                    <h5>{{titik()->sum('titik_posko')}} Titik</h5>
                </div>
            </div>

            <div class="card">
                <img class="card-image" src="/front/images/dapur.png" alt="alternative">
                <div class="card-body">
                    <h3 class="card-title">Dapur Umum</h3>
                    <h5>{{titik()->sum('titik_dapur')}} Titik</h5>
                </div>
            </div>
            
            <div class="card">
                <img class="card-image" src="/front/images/banjir3.png" alt="alternative">
                <div class="card-body">
                    <h3 class="card-title">Area Terdampak</h3>
                    <h5>0 %</h5>
                </div>
            </div>
            <!-- end of card -->
            
        </div> <!-- end of col -->

    </div> <!-- end of row -->
</div> <!-- end of container -->