<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Data Rekapitulasi Titik Banjir</title>
<style type="text/css">
.auto-style1 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.auto-style2 {
	border-color: #000000;
	border-width: 0px;
}
.auto-style3 {
	border-style: solid;
	text-align: center;
	border-width: 1px;
}
.auto-style4 {
	text-align: center;
}
.auto-style5 {
	font-size: large;
}
</style>
</head>

<body>

<div class="auto-style4">
	<strong><span class="auto-style5">Data Rekapitulasi Titik Banjir</span><br class="auto-style5" />
	<span class="auto-style5">Tanggal : {{\Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y')}}</span></strong> </div><br>
<table cellpadding="2" cellspacing="0" class="auto-style2" style="width: 100%">
	<tr style="font-size:11px">
		<td class="auto-style1"><strong>No</strong></td>
		<td class="auto-style1"><strong>Kelurahan</strong></td>
		<td class="auto-style1"><strong>Lokasi</strong></td>
		<td class="auto-style1"><strong>Tinggi Air</strong></td>
		<td class="auto-style1"><strong>Lat</strong></td>
		<td class="auto-style1"><strong>Long</strong></td>
	</tr>
    @php
        $no =1;
    @endphp
    @foreach ($data as $item)
        
	<tr style="font-size:11px">
		<td class="auto-style3">{{$no++}}</td>
		<td class="auto-style3">{{\App\Kelurahan::find($item->kelurahan_id)->nama}}</td>
		<td class="auto-style3">{{$item->lokasi}}</td>
		<td class="auto-style3">{{$item->tinggi_air}} cm</td>
		<td class="auto-style3">{{$item->lat}}</td>
        <td class="auto-style3">{{$item->long}}</td>
    </tr>
    @endforeach
    <tr style="font-size:11px">
        <th></th>
        <th>JUMLAH TITIK BANJIR</th>
        <th>{{count($data)}}</th>
        <th></th>
        <th></th>
    </tr>
</table>

</body>

</html>
