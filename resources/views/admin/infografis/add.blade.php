@extends('layouts.app_admin')

@push('css') 

@endpush

@section('content')
<a href="/admin/infografis" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Kembali</a> <br /><br />

<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Tambah Data Infografis </h5>
      </div>
      <form method="post" action="/admin/infografis/add" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">File Gambar</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="file" required>
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


@endpush