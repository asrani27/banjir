<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fa fa-phone"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">CALL CENTER</span>
          <span class="info-box-number">-</span>
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
          <span class="info-box-number">Pemerintah Kota Banjarmasin</span>
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
          <span class="info-box-number">{{rekapitulasi()->sum('terdampak_kk')}} KK /{{rekapitulasi()->sum('terdampak_jiwa')}} JIWA </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>