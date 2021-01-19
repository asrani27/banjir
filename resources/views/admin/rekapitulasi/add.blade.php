@extends('layouts.app_admin')

@push('css') 

@endpush

@section('content')
<a href="/admin/rekapitulasi" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a> <br /><br />

<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-server"></i> Tambah Data </h5>
      </div>
      <form method="post" action="/admin/rekapitulasi/add">
        @csrf
      <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Pilih Lokasi</label>
            <div class="col-sm-10">
              <select name="lokasi_id" class="form-control" required>
                <option value="">-Pilih-</option>
                @foreach (lokasi() as $item)
                <option value="{{$item->id}}">{{$item->nama}} - KEL. {{$item->kelurahan->nama}}</option>
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
                <option value="{{$item->nama}}">{{$item->nama}}</option>
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
                <option value="{{$item->nama}}">{{$item->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Terdampak</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="terdampak_kk" style="text-transform: uppercase" value="0">
            </div>
            <div class="col-sm-1 col-form-label">
              <strong>KK</strong>
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="terdampak_jiwa" style="text-transform: uppercase" value="0"> 
            </div>
            <div class="col-sm-1 col-form-label">
              <strong>JIWA</strong>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Mengungsi</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="mengungsi_kk" style="text-transform: uppercase" value="0">
            </div>
            <div class="col-sm-1 col-form-label">
              <strong>KK</strong>
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="mengungsi_jiwa" style="text-transform: uppercase" value="0"> 
            </div>
            <div class="col-sm-1 col-form-label">
              <strong>JIWA</strong>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Keterangan/Alamat Pengungsian</label>
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


@endpush