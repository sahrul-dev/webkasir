<?php

include 'connect.php';

if(isset($_POST['done'])){
$nama_barang = $_POST['nama_barang'];  
$kode_barang = $_POST['kode_barang'];
$harga_barang = $_POST['harga_barang'];
$satuan = $_POST['satuan'];
$diskon = $_POST['diskon'];
$jumlah = $_POST['jumlah'];


	$query = mysqli_query($connect,"INSERT INTO `barang`(`nama_barang`, `kode_barang`, `harga_barang`, `satuan`, `diskon`, `jumlah`) VALUES ('$nama_barang', '$kode_barang', '$harga_barang', '$satuan', '$diskon', '$jumlah')");
	header('location:../dashboard/barang');

	


}
?>