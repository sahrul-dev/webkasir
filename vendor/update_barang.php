<?php include '../dashboard/head.php'?>
<br>
<?php

include 'connect.php';
if (isset($_POST['done'])) {
$id_barang = $_GET['id_barang'];
$kode_barang = $_POST['kode_barang'];
$harga_barang = $_POST['harga_barang'];
$satuan = $_POST['satuan'];
$diskon = $_POST['diskon'];
$jumlah = $_POST['jumlah'];

$sql = "UPDATE `barang` SET harga_barang='$harga_barang', kode_barang='$kode_barang', satuan='$satuan',diskon='$diskon', jumlah='$jumlah' WHERE id_barang ='$id_barang'";
$query = mysqli_query($connect,$sql);
echo "<script>document.location.href = '/kasir/dashboard/barang';</script> ";
}
?>
<?php
	include 'connect.php';
$id_barang = $_GET['id_barang'];
	$sql = "SELECT * FROM `barang` WHERE id_barang = $id_barang";
	$query = mysqli_query($connect,$sql);
	$row = mysqli_fetch_assoc($query);
?>
<!-- <?php 
if(empty($_SESSION['username'])) {

}else{
	echo "<script>history.back();</script>";
}
?> -->
<body>
<div class="container">
	<div class="jumbotron">
		<div class="form">
		<h1>Ubah data barang</h1>
		<form method="POST">
			<br>
			<label for="">id_barang</label>
			<br><br>
			<input type="text" name="id_barang" value="<?php echo $row['id_barang']; ?>" disabled>
			<br><br>
			<label for="">kode barang</label>
			<br><br>
			<input type="text" name="kode_barang" value="<?php echo $row['kode_barang']; ?>" required>
			<br><br>
			<label for="">Nama barang</label>
			<br><br>
			<input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
			<br><br>
			<label for="">Harga barang</label>
			<br><br>
			<input type="text" name="harga_barang" value="<?php echo $row['harga_barang']; ?>" required>
			<br><br>
			<label for="">satuan</label>
			<br><br>
			<select name="satuan" id_user="">
				<option value="Biji"<?php if ($row['satuan']=="Biji") { echo "selected";}?>>Biji</option>
				<option value="PCS"<?php if ($row['satuan']=="PCS") { echo "selected";}?>>PCS</option>
				<option value="UNIT" <?php if ($row['satuan']=="UNIT") { echo "selected";}?>>UNIT</option>
				<option value="sachet" <?php if ($row['satuan']=="sachet") { echo "selected";}?>>sachet</option>
			</select>
			<br><br>
			<label for="">diskon</label>
			<br><br>
			<input type="text" name="diskon" value="<?php echo $row['diskon']; ?>" required>
			<br><br>
				<label for="">jumlah</label>
			<br><br>
			<input type="number" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
			<br><br>
			<button class="btn" name="done">Simpan perubahan data!	</button>
		</form>
		</div>
		<br>
	</div> 
</div>
</body>
<style>
	.textarea{

	box-sizing: border-box;
	padding: 10px;
	border: 1px solid #dcdcdc;
	border-radius: 4px;
	outline: none;
	height: 300px;
}
</style>
</html>
<script>
	document.title = "kasir - Update barang";
</script>
