@extends('layouts.app_admin')

@push('css') 

@endpush

@section('content')
<a href="/admin/kecamatan" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a> <br /><br />

<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Buat User Untuk Login </h5>
      </div>
      <form method="post" action="/admin/kecamatan/{{$id}}/createuser">
        @csrf
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kecamatan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{namaKecamatan($id)}}" readonly>
          </div>
        </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" placeholder="username" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="password" placeholder="password" required>
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