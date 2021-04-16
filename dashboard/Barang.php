	<?php require 'head.php' ?>
<body>
		<div class="modal">
			<div class="modal-body">
		<div class="form">
			<div class="modal-title"><h1>Tambah Barang</h1></div>
			<br><br>
		<form method="POST" action="../vendor/insert_barang">
			<div class="rows">
				
			
			<div class="column">
			<label for="">kode barang</label>
			<br><br>
			<input type="text" name="kode_barang" required>
			<br><br>
			<label for="">Nama barang</label>
			<br><br>
			<input type="text" name="nama_barang" required>
			<br><br>
			<label for="">Harga barang</label>
			<br><br>
			<input type="number" name="harga_barang"  required>
			<br><br>
			</div>
			<div class="column">
			<label for="">satuan</label>
			<br><br>
			<select name="satuan">
				<option value="biji">Biji</option>
				<option value="PCS">PCS</option>
				<option value="UNIT">UNIT</option>
				<option value="sachet">sachet</option>
			</select>
			<br><br>
			<label for="">diskon</label>
			<br><br>
			<input type="text" name="diskon"  required>
			<br><br>
				<label for="">jumlah</label>
			<br><br>
			<input type="number" name="jumlah"  required>
			<br><br>
			</div>
			</div>
			<button class="btn" name="done">Submit</button>
			<br><br>
			<button class="btn-delete" type="button" onclick="closeModal();">Batal</button>
		</form>
		</div>
			</div>
			<br><br>
		</div>
		<br>
<div class="container">
	<div class="jumbotron">
		<button class="btn skyblue to-right" onclick="history.back();">Kembali <i class="far fa-arrow-right right"></i></button>
		<br><br>
		<h1>Barang</h1>
		<br>
		<button class="btn skyblue" onclick="showModal();">Tambah Barang<i class="far fa-plus-circle r-icon"></i></button>

		<br>
		<div class="table">
			<div class="wrapper-table">
			</div>
			<br><br>	
			<table>
				<tr>
					<th>id_barang</th>
					<th>kode_barang</th>
					<th>nama_barang</th>
					<th>Harga</th>
					<th>satuan</th>
					<th>diskon</th>
					<th>Jumlah</th>
					<th>Tanggal_masuk</th>
					<th>Aksi</th>
				</tr>
				<tr>
				<?php

				include '../vendor/connect.php';
				error_reporting(0);
				$halaman = 5;
				$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
				$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
				$search = $_POST['search'];
				$sql2 = "SELECT * FROM barang LIMIT $mulai, $halaman";
				$query = mysqli_query($connect,$sql2);
				// $queries = mysqli_query($connect,$sql1);
				$queryCount = mysqli_query($connect,"SELECT * FROM `barang`");
				$row = mysqli_num_rows($queryCount);
				$pages = ceil($row/$halaman);
				$rows = mysqli_num_rows($query);
				if ($rows == 0) {
				echo "<td></td>";
				echo "<td></td>";
				echo "<td>Data tidak tersedia atau tidak ditemukan!</td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				}
		
				while ($rows = mysqli_fetch_array($query)){
					
				?>
				    <td><?php echo $rows['id_barang']; ?></td>
				    <td><?php echo $rows['kode_barang']; ?></td>
				    <td><?php echo $rows['nama_barang'];?></td>
					<td class="ellipsis"><span>Rp.<?php echo $rows['harga_barang']; ?></span></td>
					<td><?php echo $rows['satuan']; ?></td>
					<td><?php echo $rows['diskon']; ?></td>
					<td><?php echo $rows['jumlah']; ?></td>
					<td><?php echo $rows['tanggal_masuk']?></td>
					<td>
					<a href="../vendor/update_barang?id_barang=<?php echo $rows['id_barang']?>"><button class="btn-update">Ubah <i class="far fa-edit r-icon"></i></button></a>
					
					<a href="../vendor/delete_barang?id_barang=<?php echo $rows['id_barang']?>">
					<button class="btn-delete" onclick="return confirm('Apakah anda yakin ingin menghapus field ini?');">Hapus <i class="far fa-trash r-icon"></i></button></a>
			</td>
				</tr>

				<?php
			}
				?>
				<tr>
					<th><label for="">Ditampilkan data barang dari :  <b><?php echo 1; ?></b> ke <b><?php echo $halaman ?></b> </label></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th><label>Jumlah barang : <b><?php echo $row; ?></b></label></th>
				</tr> 
			</table>
			<br>
		</div>
		<div class="pagination">
  <a href="#" onclick="history.back();">Previous</a>
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>" class="active"><?php echo $i; ?></a>
  <?php } ?>
   <a href="#">Next</a>
</div>
</div>
	</div> 
</div>
<br><br>
</body>
</html>
<style>
	.column{
		width: 100%;
	}
	.rows{
		display: flex;
	}
</style>
<script>
	document.title = "Kasir - Barang";

document.querySelector(".link2").style.fontWeight = "600";
</script>