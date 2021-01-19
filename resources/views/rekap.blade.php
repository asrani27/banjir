<div class="row">
<div class="col-lg-12">
    <div class="card card-purple">
    <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-file"></i> Rekapitulasi Data </h5>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr class="bg-gradient-purple">
                    <th rowspan=2 class="text-center">No</th>
                    <th rowspan=2 class="text-center">Nama Kecamatan</th>
                    <th colspan=2 class="text-center">Terdampak</th>
                    <th colspan=2 class="text-center">Mengungsi</th>
                    <th rowspan=2 class="text-center"></th>
                </tr>
                <tr class="bg-gradient-purple">                    
                    <th class="text-center">KK</th>
                    <th class="text-center">Jiwa</th>
                    <th class="text-center">KK</th>
                    <th class="text-center">Jiwa</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach (rekapitulasi() as $item)
                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td class="text-center">{{$item->nama}}</td>
                    <td class="text-center">{{$item->terdampak_kk}}</td>
                    <td class="text-center">{{$item->terdampak_jiwa}}</td>
                    <td class="text-center">{{$item->mengungsi_kk}}</td>
                    <td class="text-center">{{$item->mengungsi_jiwa}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Detail</a>
                    </td>
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th></th>
                        <th>TOTAL</th>
                        <th>{{rekapitulasi()->sum('terdampak_kk')}}</th>
                        <th>{{rekapitulasi()->sum('terdampak_jiwa')}}</th>
                        <th>{{rekapitulasi()->sum('mengungsi_kk')}}</th>
                        <th>{{rekapitulasi()->sum('mengungsi_jiwa')}}</th>
                    </tr>
                </tfoot>
            </tbody>
        </table>
    </div>
    </div>
</div>
<!-- /.col-md-6 -->
</div>