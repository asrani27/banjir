{{-- <div class="row">
<div class="col-lg-12">
    <div class="card card-purple">
    <div class="card-header">
        <h5 class="card-title m-0"> <i class="fas fa-file"></i> Rekapitulasi Data </h5>
    </div>
    <div class="card-body table-responsive"> --}}
        <table class="table table-striped table-sm">
            <thead>
                <tr class="bg-gradient-purple">
                    <th class="text-center" style="vertical-align:middle;">No</th>
                    <th class="text-center" style="vertical-align:middle;">Nama Kecamatan</th>
                    <th class="text-center">Kelurahan</th>
                    <th class="text-center">Alamat Pengungsian</th>
                    <th class="text-center">Laki-laki</th>
                    <th class="text-center" style="vertical-align:middle;">Perempuan</th>
                    <th class="text-center" style="vertical-align:middle;">Balita</th>
                    <th class="text-center" style="vertical-align:middle;">Lansia</th>
                    <th class="text-center" style="vertical-align:middle;">jumlah</th>
                    {{-- <th rowspan=2 class="text-center"></th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach (\App\RekapitulasiLuar::get() as $item)
                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td class="text-center">{{$item->kecamatan->nama}}</td>
                    <td class="text-center">{{$item->kelurahan->nama}}</td>
                    <td class="text-center">{{$item->lokasi}}</td>
                    <td class="text-center">{{number_format($item->laki)}}</td>
                    <td class="text-center">{{number_format($item->perempuan)}}</td>
                    <td class="text-center">{{number_format($item->balita)}}</td>
                    <td class="text-center">{{number_format($item->lansia)}}</td>
                    <td class="text-center">{{number_format($item->jumlah)}}</td>
                    {{-- <td>
                        <a href="/rekapitulasi/detail/{{$item->id}}" class="btn btn-sm btn-primary">Detail</a>
                    </td> --}}
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center">{{number_format(\App\RekapitulasiLuar::get()->sum('laki'))}}</th>
                        <th class="text-center">{{number_format(\App\RekapitulasiLuar::get()->sum('perempuan'))}}</th>
                        <th class="text-center">{{number_format(\App\RekapitulasiLuar::get()->sum('balita'))}}</th>
                        <th class="text-center">{{number_format(\App\RekapitulasiLuar::get()->sum('lansia'))}}</th>
                        <th class="text-center">{{number_format(\App\RekapitulasiLuar::get()->sum('jumlah'))}}</th>
                    </tr>
                </tfoot>
            </tbody>
        </table>
    {{-- </div>
    </div>
</div>
<!-- /.col-md-6 -->
</div> --}}