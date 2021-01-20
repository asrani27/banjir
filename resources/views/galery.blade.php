
@foreach (galery() as $item)

<div class="swiper-slide">
<div class="image-container">
<a href="/storage/{{$item->file}}" target="_blank"><img class="img-responsive" src="/storage/{{$item->file}}" width="180px" height="160px" alt="alternative"></a>
</div>
</div>
@endforeach
{{-- <div class="row">
    <div class="col-lg-12">
        <div class="card card-secondary">
        <div class="card-header">
            <h5 class="card-title m-0"> <i class="fas fa-file"></i> Galery Kegiatan </h5>
        </div>
        <div class="card-body table-responsive">
            <div class="owl-carousel">
                @foreach (galery() as $item)
                    <div><img src="/storage/{{$item->file}}" alt="..." width="350" height="200"><strong>{{$item->nama}}</strong></div>
                @endforeach
              </div>
        </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div> --}}
