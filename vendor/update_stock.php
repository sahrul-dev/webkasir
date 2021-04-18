<?php include '../dashboard/head.php'?>
<br>
<?php

include 'connect.php';
if (isset($_POST['done'])) {
$id_barang = $_GET['id_stock'];
$harga_barang = $_POST['harga_barang'];
$jumlah = $_POST['jumlah'];

$sql = "UPDATE `barang` SET harga_barang='$harga_barang', jumlah='$jumlah' WHERE id_barang ='$id_barang'";
$query = mysqli_query($connect,$sql);
echo "<script>document.location.href = '/kasir/dashboard/barang';</script> ";
}
?>
<?php
	include 'connect.php';
$id_barang = $_GET['id_stock'];
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
		<button class="btn skyblue to-right" onclick="history.back();">Kembali <i class="far fa-arrow-right right"></i></button>
	 	<br><br>
		<div class="form">
		
		<h1>Ubah Stock Barang</h1>
		<form method="POST">
			<br>
			<label for="">id_barang</label>
			<br><br>
			<input type="text" name="id_barang" value="<?php echo $row['id_barang']; ?>" disabled>
			<br><br>
			<label for="">kode barang</label>
			<br><br>
			<input type="text" name="kode_barang" value="<?php echo $row['kode_barang']; ?>" required disabled>
			<br><br>
			<label for="">Harga barang</label>
			<br><br>
			<input type="text" name="harga_barang" value="<?php echo $row['harga_barang']; ?>" required>
			<br><br>
			<label for="">jumlah Stock</label>
			<br><br>
			<input type="number" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
			<br><br>
			<button class="btn saved" name="done">Simpan perubahan!</button>
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
