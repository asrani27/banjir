@extends('layouts.app_admin')

@push('css') 

  <!-- Select2 -->
  <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content')
<a href="/admin/rekapitulasi" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a> <br /><br />

<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Edit Data </h5>
      </div>
      <form method="post" action="/admin/rekapitulasi/edit/{{$data->id}}">
        @csrf
      <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih Lokasi</label>
            <div class="col-sm-10">
              <select name="lokasi_id" class="form-control select2" required>
                <option value="">-Pilih-</option>
                @foreach (lokasi() as $item)
                <option value="{{$item->id}}" {{$data->lokasi_id == $item->id ? 'selected' : ''}}>{{$item->nama}} - KEL. {{$item->kelurahan->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih RT</label>
            <div class="col-sm-10">
              <select name="rt" class="form-control" required>
                <option value="">-Pilih-</option>
                @foreach (RT() as $item)
                <option value="{{$item->nama}}" {{$data->rt == $item->nama ? 'selected' : ''}}>{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih RW</label>
            <div class="col-sm-10">
              <select name="rw" class="form-control">
                <option value="">-Pilih-</option>
                @foreach (RW() as $item)
                <option value="{{$item->nama}}" {{$data->rw == $item->nama ? 'selected' : ''}}>{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Terdampak</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="terdampak_kk" style="text-transform: uppercase" value="{{$data->terdampak_kk}}" required  maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
            <div class="col-sm-1 col-form-label">
              <strong>KK</strong>
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="terdampak_jiwa" style="text-transform: uppercase" value="{{$data->terdampak_jiwa}}" required  maxlength="6" onkeypress="return hanyaAngka(event)"> 
            </div>
            <div class="col-sm-1 col-form-label">
              <strong>JIWA</strong>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Mengungsi</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="mengungsi_kk" style="text-transform: uppercase" value="{{$data->mengungsi_kk}}" required  maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
            <div class="col-sm-1 col-form-label">
              <strong>KK</strong>
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="mengungsi_jiwa" style="text-transform: uppercase" value="{{$data->mengungsi_jiwa}}" required  maxlength="6" onkeypress="return hanyaAngka(event)"> 
            </div>
            <div class="col-sm-1 col-form-label">
              <strong>JIWA</strong>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Balita</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="balita" style="text-transform: uppercase" value="{{$data->balita}}" required maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Lansia</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="lansia" style="text-transform: uppercase" value="{{$data->lansia}}" required maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Ibu-Ibu</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="ibu" style="text-transform: uppercase" value="{{$data->ibu}}" required maxlength="6" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Keterangan/Alamat Pengungsian</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="keterangan" value="{{$data->keterangan}}">
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