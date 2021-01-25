
<table class="table table-striped table-sm">
    <thead>
        <tr class="bg-gradient-purple">
            <th rowspan=2 class="text-center" style="vertical-align:middle;">No</th>
            <th rowspan=2 class="text-center" style="vertical-align:middle;">Nama Kecamatan</th>
            <th colspan=2 class="text-center">Terdampak</th>
            <th colspan=2 class="text-center">Mengungsi</th>
            <th rowspan=2 class="text-center" style="vertical-align:middle;">Balita</th>
            <th rowspan=2 class="text-center" style="vertical-align:middle;">Lansia</th>
            <th rowspan=2 class="text-center" style="vertical-align:middle;">Perempuan</th>
            {{-- <th rowspan=2 class="text-center"></th> --}}
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
            <td class="text-center">{{number_format($item->terdampak_kk)}}</td>
            <td class="text-center">{{number_format($item->terdampak_jiwa)}}</td>
            <td class="text-center">{{number_format($item->mengungsi_kk)}}</td>
            <td class="text-center">{{number_format($item->mengungsi_jiwa)}}</td>
            <td class="text-center">{{number_format($item->balita)}}</td>
            <td class="text-center">{{number_format($item->lansia)}}</td>
            <td class="text-center">{{number_format($item->ibu)}}</td>
            {{-- <td>
                <a href="/rekapitulasi/detail/{{$item->id}}" class="btn btn-sm btn-primary">Detail</a>
            </td> --}}
        </tr>
        @endforeach
        <tfoot>
            <tr>
                <th></th>
                <th class="text-center">TOTAL</th>
                <th class="text-center">{{number_format(rekapitulasi()->sum('terdampak_kk'))}}</th>
                <th class="text-center">{{number_format(rekapitulasi()->sum('terdampak_jiwa'))}}</th>
                <th class="text-center">{{number_format(rekapitulasi()->sum('mengungsi_kk'))}}</th>
                <th class="text-center">{{number_format(rekapitulasi()->sum('mengungsi_jiwa'))}}</th>
                <th class="text-center">{{number_format(rekapitulasi()->sum('balita'))}}</th>
                <th class="text-center">{{number_format(rekapitulasi()->sum('lansia'))}}</th>
                <th class="text-center">{{number_format(rekapitulasi()->sum('ibu'))}}</th>
            </tr>
        </tfoot>
    </tbody>
</table>
