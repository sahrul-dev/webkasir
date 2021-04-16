<?php
include 'connect.php';
$id_user = $_GET['id_user'];
$sql = "DELETE FROM user WHERE id_user = '$id_user'";
$query = mysqli_query($connect,$sql);
header('location:../dashboard/user');

?>