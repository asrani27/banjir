<div class="row">
    <div class="col-lg-12">
        <div class="card card-secondary">
        <div class="card-header">
            <h5 class="card-title m-0"> <i class="fas fa-file"></i> Galery Kegiatan </h5>
        </div>
        <div class="card-body table-responsive">
            <div class="timeline-body">
                @foreach (galery() as $item)
                    <img src="/storage/{{$item->file}}" alt="..." width="350" height="200">
                @endforeach
              </div>
        </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>