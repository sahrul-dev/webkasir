<?php
	

include 'connect.php';
session_start();
error_reporting(0);
// menghilangkan tanda error yang tidak bisa diperbaiki
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];
$query = mysqli_query($connect, "select * from user where username = '$username' and password = '$password' ");
if(mysqli_num_rows ($query)>0){
	$row = mysqli_fetch_array ($query);
	$_SESSION['username'] = $row;

header("location:../dashboard/");	
}
else {
?>
<script type="text/javascript">alert('Maaf data pengguna yang anda masukan tidak terdaftar atau mungkin salah!'); document.location = "../";</script>
<?php
}
?>

<!-- buat validasi no induk biar masuk ke halaman berikutnya -->

?>
?>