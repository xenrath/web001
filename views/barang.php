<?php 
	include "models/m_barang.php";

	$brg = new Barang($connection);
 ?>

<div class="row">
  <div class="col-lg-12">
    <h1>Barang <small>Data Barang</small></h1>
    <ol class="breadcrumb">
      <li><i class="icon-dashboard"></i> Barang</a></li>
      <li class="active"><i class="icon-file-alt"></i> Data Barang</li>
    </ol>
  </div>
</div><!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th>
					<th>Stok Barang</th>
					<th>Gambar Barang</th>
					<th>Opsi</th>
				</tr>
				<?php 
					$no = 1;
					$tampil = $brg->tampil();
					while($data = $tampil->fetch_object()){
				 ?>
				<tr>
					<td align="center"><?php echo $no++."." ?></td>
					<td><?php echo $data->nama_brg ?></td>
					<td><?php echo $data->harga_brg ?></td>
					<td><?php echo $data->stok_brg ?></td>
					<td><?php echo $data->gbr_brg ?></td>
					<td align="center">
						<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button>
						<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</button>
					</td>
				</tr>
			<?php } ?>
			</table>
		</div>
	</div>
</div>