<?php require 'head.php' ?>
<?php 
if($_SESSION['username']['level'] == 'SuperAdmin') {
?>
<body>
		<div class="modal">
			<div class="modal-body">
		<div class="form">
			<div class="modal-title"><h1>Tambah User Baru</h1></div>
		<form method="POST" action="../vendor/insert_user">
			<br>
			<label for="">Username</label>
			<br><br>
			<input type="text" name="username" required>
			<br><br>
			<label for="">Nama</label>
			<br><br>
			<input type="text" name="nama" required>
			<br><br>
			<label for="">Password</label>
			<br><br>
			<input type="password" name="password" required>
			<br><br>
			<label for="">level</label>
			<br><br>
			<select name="level" id_user="">
				<option value="Admin">Admin</option>
				<option value="SuperAdmin">SuperAdmin</option>
				<option value="User">User</option>

			</select>
			<br><br>
			<button class="btn" name="done">Submit</button>
			<br><br>
			<button class="btn-delete" type="button" onclick="closeModal();">Batal</button>
		</form>
		</div>
			</div>
		</div>
		<br><br>
<div class="container">
	<div class="jumbotron">		
		<h1>User Kasir</h1>
		<br>
		<button class="btn skyblue" onclick="showModal();">Buat Baru<i class="far fa-plus-circle r-icon"></i></button>
		<br>
		<div class="table">
			<div class="wrapper-table">
			</div>
			<br><br>	
			<table>
				<tr>
					<th>No</th>
					<th>id_user</th>
					<th>nama</th>
					<th>username</th>
					<th>level</th>
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
				$sql2 = "SELECT * FROM 	`user`  LIMIT $mulai, $halaman";
				$query = mysqli_query($connect,$sql2);
				// $queries = mysqli_query($connect,$sql1);
				$queryCount = mysqli_query($connect,"SELECT * FROM `user`");
				$row = mysqli_num_rows($queryCount);
				$pages = ceil($row/$halaman);
				$rows = mysqli_num_rows($query);
				if ($rows == 0) {
				echo "<td></td>";
				echo "<td></td>";
				echo "<td>Data kosong!</td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				}
				$no = 0;
				while ($rows = mysqli_fetch_array($query)){
					$no++;
				?>
				    <td><?php echo $no; ?></td>
					<td><?php echo $rows['id_user']; ?></td>
				    <td><?php echo $rows['nama'];?></td>
					<td><?php echo $rows['username']; ?></td>
					<td><?php echo $rows['level']; ?></td>
					<td><a href="../vendor/update_user?id_user=<?php echo $rows['id_user']?>"><button class="btn-update">Ubah <i class="far fa-edit r-icon"></i></button></a>

					<a href="../vendor/delete_user?id_user=<?php echo $rows['id_user']?>"><button class="btn-delete" onclick="return confirm('Apakah anda yakin ingin menghapus field ini?');">Hapus <i class="far fa-trash r-icon"></i></button></a></td>
				</tr>

				<?php
			}
				?>
				<tr>
					<th><label for="">Ditampilkan  data dari :  <b><?php echo 1; ?></b> ke <b><?php echo $halaman ?></b> </label></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th><label>Jumlah data : <b><?php echo $row; ?></b></label></th>
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
<?php
}else{
	echo "<script>alert('Maaf Anda Tid_userak Diizinkan melihat halaman ini!'); history.back();</script>";
}
?>

</body>
</html>
<style>

</style>
<script>
	document.title = "Kasir - User";

document.querySelector(".link2").style.fontWeight = "600";
</script>