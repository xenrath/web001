<?php 
	class Barang
	{
		private $mysqli;

		function __construct($conn)
		{
			$this->mysqli = $conn;
		}

		public function tampil($id = null)
		{
			$db = $this->mysqli->conn;
			$sql = "SELECT * FROM tb_barang";
			if ($id != null) {
				$sql .= " WHERE id_brg = $id";
			}
			$query = $db->query($sql) or die ($db->error);
			return $query;
		}

		public function tambah($nm_brg, $hrg_brg, $stok_brg, $gbr_brg)
		{
			$db = $this->mysqli->conn;
			$sql = "INSERT INTO tb_barang (nama_brg, harga_brg, stok_brg, gbr_brg) VALUES ('$nm_brg', '$hrg_brg', '$stok_brg', '$gbr_brg')";
			$db->query($sql) or die ($db->error);
		}

		public function edit($sql)
		{
			$db = $this->mysqli->conn;
			$db->query($sql) or die ($db->error);
		}

		public function hapus($id)
		{
			$db = $this->mysqli->conn;
			$sql = "DELETE FROM tb_barang WHERE id_brg = '$id'";
			$db->query($sql) or die ($db->error);
		}

		function __destruct(){
			$db = $this->mysqli->conn;
			$db->close();
		}

	}
 ?>