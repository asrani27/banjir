@extends('layouts.app_admin')

@push('css') 

  <!-- Select2 -->
  <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content')
<a href="/admin/rekapitulasi_luar" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a> <br /><br />

<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Tambah Data </h5>
      </div>
      <form method="post" action="/admin/rekapitulasi_luar/add">
        @csrf
      <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih Kelurahan</label>
            <div class="col-sm-10">
              <select name="kelurahan_id" class="form-control select2" required>
                <option value="">-Pilih-</option>
                @foreach (kelurahan() as $item)
                <option value="{{$item->id}}">{{$item->nama}} - KEC. {{$item->kecamatan->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Lokasi Mengungsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="lokasi" placeholder="Alamat pengungsian">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Pengungsi</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="jumlah" value="0"required maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Perempuan</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="perempuan" style="text-transform: uppercase" value="0" required maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Laki-laki</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="laki" style="text-transform: uppercase" value="0" required maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Balita</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="balita" style="text-transform: uppercase" value="0" required maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Lansia</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="lansia" style="text-transform: uppercase" value="0" required maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="keterangan">
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
<!-- Select2 -->
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
<script>
  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
  function hanyaAngka(event) {
      var angka = (event.which) ? event.which : event.keyCode
      if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
          return false;
      return true;
  }
</script>
@endpush