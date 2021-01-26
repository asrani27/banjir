
<table class="table table-striped table-sm">
    <thead>
        <tr class="bg-gradient-purple">
            <th class="text-center">No</th>
            <th class="text-center">Nama Kecamatan</th>
            <th class="text-center">Jumlah Titik Banjir</th>
            <th class="text-center">Jumlah Titik Pengungsian</th>
            <th class="text-center">Jumlah Titik Dapur Umum</th>
            <th class="text-center">Detail</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach (titik() as $item)
            <tr>
                <td class="text-center">{{$no++}}</td>
                <td class="text-center">{{$item->nama}}</td>
                <td class="text-center">{{$item->titik_banjir}}</td>
                <td class="text-center">{{$item->titik_posko}}</td>
                <td class="text-center">{{$item->titik_dapur}}</td>
                <td class="text-center">
                    <a href="/rekapitulasi/titik/detail/{{$item->id}}" class="btn btn-sm btn-primary">Detail</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
            <tr>
                <th></th>
                <th class="text-center">TOTAL</th>
                <th class="text-center">{{titik()->sum('titik_banjir')}}</th>
                <th class="text-center">{{titik()->sum('titik_posko')}}</th>
                <th class="text-center">{{titik()->sum('titik_dapur')}}</th>
                <th class="text-center"></th>
            </tr>
        </tfoot>
    </tbody>
</table>