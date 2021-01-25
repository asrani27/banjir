<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Data Rekapitulasi Dampak Bencana</title>
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
	<strong><span class="auto-style5">Data Rekapitulasi Dampak Bencana</span><br class="auto-style5" />
	<span class="auto-style5">Tanggal : {{\Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y')}}</span></strong> </div><br>
<table cellpadding="2" cellspacing="0" class="auto-style2" style="width: 100%">
	<tr>
		<td class="auto-style1" rowspan="2"><strong>No</strong></td>
		<td class="auto-style1" rowspan="2"><strong>Nama Kecamatan</strong></td>
		<td class="auto-style1" colspan="2"><strong>Terdampak</strong></td>
		<td class="auto-style1" colspan="2"><strong>Mengungsi</strong></td>
		<td class="auto-style1" rowspan="2"><strong>Balita</strong></td>
		<td class="auto-style1" rowspan="2"><strong>Lansia</strong></td>
		<td class="auto-style1" rowspan="2"><strong>Perempuan</strong></td>
	</tr>
	<tr>
		<td class="auto-style1"><strong>KK</strong></td>
		<td class="auto-style1"><strong>Jiwa</strong></td>
		<td class="auto-style1"><strong>KK</strong></td>
		<td class="auto-style1"><strong>Jiwa</strong></td>
    </tr>
    @php
        $no =1;
    @endphp
    @foreach ($data as $item)
        
	<tr>
		<td class="auto-style3">{{$no++}}</td>
		<td class="auto-style3">{{$item->nama}}</td>
		<td class="auto-style3">{{$item->terdampak_kk}}</td>
		<td class="auto-style3">{{$item->terdampak_jiwa}}</td>
		<td class="auto-style3">{{$item->mengungsi_kk}}</td>
		<td class="auto-style3">{{$item->mengungsi_jiwa}}</td>
		<td class="auto-style3">{{$item->balita}}</td>
		<td class="auto-style3">{{$item->lansia}}</td>
        <td class="auto-style3">{{$item->ibu}}</td>
    </tr>
    @endforeach
    <tr>
        <th></th>
        <th>TOTAL</th>
        <th>{{$data->sum('terdampak_kk')}}</th>
        <th>{{$data->sum('terdampak_jiwa')}}</th>
        <th>{{$data->sum('mengungsi_kk')}}</th>
        <th>{{$data->sum('mengungsi_jiwa')}}</th>
        <th>{{$data->sum('balita')}}</th>
        <th>{{$data->sum('lansia')}}</th>
        <th>{{$data->sum('ibu')}}</th>
    </tr>
</table>

</body>

</html>
