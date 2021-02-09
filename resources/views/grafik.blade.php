
    <div class="row">
        <div class="col-lg-12">
            <h2>GRAFIK DATA </h2>
            <p class="p-heading p-large"><strong>Tanggal {{\Carbon\Carbon::parse($data['tanggal']->first())->format('d-M-Y')}} s/d {{\Carbon\Carbon::parse($data['tanggal']->last())->format('d-M-Y')}}</strong></p>
        </div> <!-- end of col -->
    </div> <!-- end of row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-12">
                <canvas id="myChart" width="500" height="120"></canvas>
            </div>
        </div> <!-- end of col -->

    </div> <!-- end of row -->
<br /><br />
    <div class="row">
        <div class="col-lg-12">
            <h2>GRAFIK TERDAMPAK (JIWA) </h2>
            <p class="p-heading p-large"><strong>Tanggal {{\Carbon\Carbon::parse($data['tanggal']->first())->format('d-M-Y')}} s/d {{\Carbon\Carbon::parse($data['tanggal']->last())->format('d-M-Y')}}</strong></p>
        </div> <!-- end of col -->
    </div> <!-- end of row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-12">
                <canvas id="myChart2" width="500" height="120"></canvas>
            </div>
        </div> <!-- end of col -->

    </div> <!-- end of row -->