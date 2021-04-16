<?php include '../dashboard/head.php'?>
<br>
<?php
include 'connect.php';
if (isset($_POST['done'])) {
$id_user = $_GET['id_user'];
$username = htmlspecialchars($_POST['username']);
$nama = htmlspecialchars($_POST['nama']);
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "UPDATE `user` SET username ='$username', nama='$nama', password='$password',level='$level' WHERE id_user ='$id_user'";
$query = mysqli_query($connect,$sql);
header('location:../dashboard/user');

}
?>
<?php
	include 'connect.php';
	$id_user = $_GET['id_user'];
	$sql = "SELECT * FROM `user` WHERE id_user = $id_user";
	$query = mysqli_query($connect,$sql);
	$row = mysqli_fetch_assoc($query);
?>
<?php 
if(empty($_SESSION['username'])) {

}else if($_SESSION['username']['level'] == "SuperAdmin"){

}else{
	echo "<script>history.back();</script>";
}
?>
<body>
<div class="container">
	<div class="jumbotron">
		<div class="form">
		<h1>Update User</h1>
		<form method="POST">
			<br>
			<label for="">id_user</label>
			<br><br>
			<input type="text" name="id_user" value="<?php echo $row['id_user']; ?>" disabled>
			<br><br>
			<label for="">Username</label>
			<br><br>
			<input type="text" name="username" value="<?php echo $row['username']; ?>" required>
			<br><br>
			<label for="">Nama</label>
			<br><br>
			<input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
			<br><br>
			<label for="">Password</label>
			<br><br>
			<input type="password" name="password" value="<?php echo $row['password']?>"  required>
			<br><br>
			<label for="">level</label>
			<br><br>
			<select name="level" id_user="">
				<option value="Admin"<?php if ($row['level']=="Admin") { echo "selected";}?>>Admin</option>
				<option value="Admin"<?php if ($row['level']=="SuperAdmin") { echo "selected";}?>>SuperAdmin</option>
				<option value="User" <?php if ($row['level']=="User") { echo "selected";}?>>User</option>
			</select>
			<br><br>
			<button class="btn" name="done">Simpan perubahan data!	</button>
		</form>
		</div>
		<br>
	</div> 
</div>
</body>

</html>
<script>
	document.title = "Kasir - Update User";
</script>
