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
            <!-- end of card -->
            
        </div> <!-- end of col -->

        <div class="col-lg-12">
            <!-- Card -->
            <div class="card">
                <img class="card-image" src="/front/images/banjir1.png" alt="alternative">
                <div class="card-body">
                    <h3 class="card-title">Banjir Ringan</h3>
                    <p>(0 - 20 Cm)</p>
                    <h5>0 Titik</h5>
                </div>
            </div>

            <div class="card">
                <img class="card-image" src="/front/images/banjir2.png" alt="alternative">
                <div class="card-body">
                    <h3 class="card-title">Banjir Sedang</h3>
                    <p>(21 - 40 Cm)</p>
                    <h5>0 Titik</h5>
                </div>
            </div>

            <div class="card">
                <img class="card-image" src="/front/images/banjir3.png" alt="alternative">
                <div class="card-body">
                    <h3 class="card-title">Banjir Ringan</h3>
                    <p>(Lebih dari 40 Cm)</p>
                    <h5>0 Titik</h5>
                </div>
            </div>
            <!-- end of card -->
            
        </div> <!-- end of col -->

    </div> <!-- end of row -->
</div> <!-- end of container -->