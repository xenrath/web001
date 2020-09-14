<?php 
	require ('../assets/vendor/autoload.php');
	use Spipu\Html2Pdf\Html2Pdf;

	require_once('../config/koneksi.php');
	require_once('../models/database.php');
	include "../models/m_barang.php";
	$connection = new Database($host, $user, $pass, $database);
	$brg = new Barang($connection);

	$content = '
		<style>
			.tabel{ border-collapse:collapse; }
			.tabel th { padding: 8px 5px; background-color:#f60; color:#fff;}
		</style>
	';

	$content .= '
		<page>
			<div style="padding: 4mm; border: 1px solid;" align="center">
				<span style="font-size: 25px">Cetak PDF Data Barang</span>
			</div>
			<div style="padding: 20px 0 10px 0; font-size: 15px;">
				Laporan Data Barang
			</div>
			<table border="1px" class="tabel">
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th>
					<th>Stok Barang</th>
				</tr>
	';

	$no = 1;
	$tampil = $brg->tampil();
	while ($data = $tampil->fetch_object()) {
		$content .= '
			<tr>
				<td align="center">'.$no++.'</td>
				<td>'.$data->nama_brg.'</td>
				<td>Rp. '.number_format($data->harga_brg, 2, ",", ".").'</td>
				<td>'.$data->stok_brg.'</td>
			</tr>
	';
	
	}

	$content .= '
			</table>
		</page>
	';

	$html2pdf = new Html2Pdf('P', 'A4', 'en');
	$html2pdf->writeHTML($content);
	$html2pdf->output('example.pdf');
 ?>