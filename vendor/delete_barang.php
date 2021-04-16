
<?php
include 'connect.php';
$id_barang = $_GET['id_barang'];
$sql = "DELETE FROM barang WHERE id_barang = '$id_barang'";
$query = mysqli_query($connect,$sql);
header('location:../dashboard/barang');


?>