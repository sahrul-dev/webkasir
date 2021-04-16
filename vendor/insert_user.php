<?php

include 'connect.php';

if(isset($_POST['done'])){
	$username = htmlspecialchars($_POST['username']);
	$nama = htmlspecialchars($_POST['nama']);
	$password = $_POST['password'];
	$level = $_POST['level'];

	$query = mysqli_query($connect,"INSERT INTO `user`(`username`,`nama`, `password`, `level`) VALUES ('$username','$nama',  '$password', '$level')");

	if ($query) {
	header('location:../dashboard/user');	
	}
}

?>