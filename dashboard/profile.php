<?php include 'head.php';?>

<?php
$id = $_SESSION['username']['id'];

include '../vendor/connect.php';

if (isset($_POST['done'])) {
$id = $_SESSION['username']['id'];
$username = htmlspecialchars($_POST['username']);
$nama = htmlspecialchars($_POST['nama']);
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "UPDATE `user` SET username ='$username',nama='$nama', password='$password',level='$level' WHERE id ='$id'";
$query = mysqli_query($connect,$sql);
header('location:../dashboard/profile');

}

?>
<?php
	include '../vendor/connect.php';
	$id = $_SESSION['username']['id'];
	$sql = "SELECT * FROM `user` WHERE id = $id";
	$query = mysqli_query($connect,$sql);
	$row = mysqli_fetch_assoc($query);
?>

?>

<div class="container">

	<div class="jumbotron">	
	    	<button class="btn skyblue to-right" onclick="history.back();">Kembali <i class="far fa-arrow-right right"></i></button>
	    	<br><br>	
		<h1>Profile mu</h1>
		<br>
		<div class="form">
		<form method="POST" id="form" >
		<label for="">Nama </label>
		<br><br>
		<input type="text" name="nama" value="<?php echo $_SESSION['username']['nama']?>" required>
		<br><br>
		<label for="">Username</label>
		<br><br>
		<input type="text" name="username" value="<?php echo $_SESSION['username']['username']?>" required>
		<br><br>
		<label for="">level Akses <b style="font-style: italic; color: red; font-weight: normal; margin-left: 10px;">Hanya SuperAdmin bisa mengubah level akses mu*</b></label>
			<br><br>
			<select name="level" id="">
				<option value="<?php echo $_SESSION['username']['level']?>"><?php echo $_SESSION['username']['level']?></option>
			</select>
			<br><br>
		<label for="">Ubah password</label>
		<br><br>
		<input type="password" name="password" id="passold" value="" required>
		<br><br>
		<button class="btn skyblue" name="done">Simpan perubahan</button>
	</form>
</div>
	</div> 
</div>

<script>
	document.title = "Kasir - Profile";
</script>