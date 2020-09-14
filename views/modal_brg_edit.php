<div id="edit" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Barang</h4>
			</div>
			<form id="form" method="post" enctype="multipart/form-data">
				<div class="modal-body" name="id_brg" id="modal-edit">
					<div class="form-group">
						<label class="control-label" for="nm_brg">Nama Barang</label>
						<input type="hidden" name="id_brg" id="id_brg_e">
						<input type="text" name="nm_brg" class="form-control" id="nm_brg_e" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="hrg_brg">Harga Barang</label>
						<input type="number" name="hrg_brg" class="form-control" id="hrg_brg_e" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="stok_brg">Stok Barang</label>
						<input type="number" name="stok_brg" class="form-control" id="stok_brg_e" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="gbr_brg">Gambar Barang</label>
						<div style="padding-bottom: 5px">
							<img src="" width="80px" id="pict">
						</div>
						<input type="file" name="gbr_brg" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success" name="edit" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on("click", "#edit_brg", function()
	{
		var idbrg = $(this).data('id');
		var nmbrg = $(this).data('nama');
		var hrgbrg = $(this).data('harga');
		var stokbrg = $(this).data('stok');
		var gbrbrg = $(this).data('gbr');
		$("#modal-edit #id_brg_e").val(idbrg);
		$("#modal-edit #nm_brg_e").val(nmbrg);
		$("#modal-edit #hrg_brg_e").val(hrgbrg);
		$("#modal-edit #stok_brg_e").val(stokbrg);
		$("#modal-edit #pict").attr("src", "assets/img/barang/"+gbrbrg);
	});

	$(document).ready(function(e)
	{
		$("#form").on("submit", (function(e)
		{
			e.preventDefault();
			$.ajax({
				url : 'models/process_edit_barang.php',
				type : 'POST',
				data : new FormData(this),
				contentType : false,
				cache : false,
				processData : false,
				success : function(msg)
				{
					$('.table').html(msg);
				}
			});
		}));
	})
</script>