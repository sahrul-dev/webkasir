<?php
require_once 'vendor/connect.php';
if (!empty($_SESSION['username'])) {
	header('location:dashboard/index');
}else{
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KASIR - Masuk dengan username dan password</title>
	<link rel="stylesheet" href="../lib/css/all.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="asset/img/logo.png" type="image/x-icon">
</head>
<body>
<div class="wrapper">
	<div class="column">
	<form method="POST" action="vendor/auth" enctype="multipart/formdata"> 
	<div class="box">
	<img src="asset/img/logo.png" alt="">
	<h1>Masuk!</h1>
	<small>Masukan identitas pengguna untuk melanjutkan.</small>
	<br>
	<input type="text" placeholder="nama pengguna" name="username" required>
	<input type="password" placeholder="kata sandi" name="password" required>
	
	<br>
	<button class="btn" type="submit" name="done">Masuk! <i class="far fa-arrow-right ico-right"></i></button>
	<br><br>

	</div>
</form>
<?php if($error){ ?>
	<br>
    <div class="error">Nama pengguna dan password salah!, coba lagi</div>
 <?php } ?>
	</div>
	<div class="column">
		<div class="box">
		
		</div>
	</div>
</div>

</body>
</html>
<style>
	*{
		margin: 0 auto;
		padding: 0 auto;
		-webkit-font-smoothing: antialiased;
		scroll-behavior: smooth;
		font-family: 'Poppins', sans-serif;
		box-sizing: border-box;
	}
	:root{
		--primary: #00DF9A;
		--focusprimary:  #008057;
		--secondprimary: #eee;
		--light: #fff;
		--darksmooth: #050505;
		--dark:#333;
		--text-mute:#dcdcdc;
	}
	.ico-right{
		margin-left: 10px;
	}
	.error{
		color: red;
	}
	.context{
		text-align: center;
	}
	body{
		background: #eee;
	}
	.wrapper{
		display: flex;
		height: 100vh;
	}
	.column{
		background: #fff;
		box-sizing: border-box;
		width: 100%;
		padding: 20px;
	}
	.context a{
		color: var(--primary);
		text-decoration: none;
	}
	.box{
		width: 600px;
		color: #333;
		box-sizing: border-box;
		margin-top: 150px;
	}

	.btn{
		padding: 15px;
		width: 100%;
		font-size: 16px;
		border: none;
		border-radius: 4px;	
		font-weight: 600;
		outline: none;
		transition: 0.4s ease-out;
		color: var(--secondprimary);
		background: #03244D;
	}
	.btn:hover{
		box-shadow: 0px 0px 5px var(--primary);
	}
	.btn:focus{
		background: var(--focusprimary);
	}
	.column small{
		color: grey;
	}
	.column h1{
		font-weight: 700;
		color: #333;
	}
	.column img{
		max-width: 50px;
	}
	.column input{
		width: 100%;
		box-sizing: border-box;
		padding: 15px;
		display: block;
		outline: none;
		color: #333;
		margin-top: 30px;
		border: none;
		border-radius: 5px;
		background: #f2f2f2;
	}
	.column:nth-child(2){
		/*background: #dcdcdc;*/
		background: url('asset/img/pexels-photo-4199523.jpeg');
		background-size: cover;
	}
	@media only screen and (max-width: 780px){
		.column:nth-child(2){
			display: none;
		}
		.box{
			width: 100%;
		}
	}
</style>