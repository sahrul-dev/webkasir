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
		<br><br>
		<div class="box">		
		<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id_user</th>
                <th>nama</th>
                <th>username</th>
                <th>level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        		<?php
        	    include '../vendor/connect.php';
        		$sql = "SELECT * FROM user";
				$query = mysqli_query($connect,$sql);

				while ($rows = mysqli_fetch_array($query)) {
        	?>
            <tr>
            
                   <td><?php echo $rows['id_user']; ?></td>
				    <td><?php echo $rows['nama']; ?></td>
				    <td><?php echo $rows['username'];?></td>
					<td><?php echo $rows['level']; ?></td>
					<td>
					<a href="../vendor/update_user?id_user=<?php echo $rows['id_user']?>"><button class="btn-update"><i class="far fa-edit"></i></button></a>
					
					<a href="../vendor/delete_user?id_user=<?php echo $rows['id_user']?>">
					<button class="btn-delete" onclick="return confirm('Apakah anda yakin ingin menghapus field ini?');"><i class="far fa-trash"></i></button></a>
			</td>
			    
            </tr>
    <?php } ?> 
        </tbody>
        <tfoot>
        	<tr></tr>
        </tfoot>
    </table>
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