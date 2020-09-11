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
	}
 ?>