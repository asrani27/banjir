<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>UPDATE DATA TERKINI</h2>
            <p class="p-heading p-large">Update per {{\Carbon\Carbon::today()->format('d/M/Y')}}</p>
        </div> <!-- end of col -->
    </div> <!-- end of row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Card -->
            <div class="card">
                <img class="card-image" src="/front/images/posko.png" alt="alternative">
                <div class="card-body">
                    <h3 class="card-title">Jumlah Posko</h3>
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
                    <h3 class="card-title">Lokasi Banjir</h3>
                    <h5>{{titik()->sum('titik_banjir')}} Titik</h5>
                </div>
            </div>
            <!-- end of card -->
            
        </div> <!-- end of col -->

    </div> <!-- end of row -->
</div> <!-- end of container -->