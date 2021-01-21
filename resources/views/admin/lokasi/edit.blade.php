@extends('layouts.app_admin')

@push('css') 
<!-- Select2 -->
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endpush

@section('content')
<a href="/admin/lokasi" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a> <br /><br />

<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Edit Data Lokasi </h5>
      </div>
      <form method="post" action="/admin/lokasi/edit/{{$data->id}}">
        @csrf
      <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih Kelurahan</label>
            <div class="col-sm-10">
              @if (Auth::user()->hasRole('kelurahan'))
              <input type="text" class="form-control" value="{{Auth::user()->kelurahan->nama}}">
              <input type="hidden" class="form-control" name="kelurahan_id" value="{{Auth::user()->kelurahan->id}}">
                  
              @else
                <select name="kelurahan_id" class="form-control select2" required>
                  <option value="">-Pilih-</option>
                  @foreach (kelurahan() as $item)
                  <option value="{{$item->id}}" {{$data->kelurahan_id == $item->id ? 'selected':''}}>{{$item->nama}} - {{$item->kecamatan->nama}}</option>
                  @endforeach
                </select>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Lokasi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" style="text-transform: uppercase" required value="{{$data->nama}}">
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
</script>
@endpush