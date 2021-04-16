<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username'])) {
	header('location:../');

}else{
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kasir - Dashboard</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="../lib/css/all.css">
	<link rel="stylesheet" href="../asset/css/main.css">
</head>
<header>
	<div class="container">
		<img src="../asset/img/logo.png" alt="">
		<div class="right-side">
		<label for="toggle">Hai, <?php echo $_SESSION['username']['nama'];?></label>
		<a href="profile" class="far fa-user-circle bar"></a>
		<a href="#" id="clock"></a>
		<a href="javascript:void(0);" class="far fa-bars bar" id="toggle" onclick="openMenu();"></a>
		</div>
	</div>
</header>
<nav>
<div class="account-info">
	<small>Signed As <b><?php echo $_SESSION['username']['level'];?></b></small>
</div>
<div class="body-nav">

<small>MENU</small>
<a href="/kasir/dashboard/index"><section><i class="fas fa-th"></i> Dashboard</section></a>

<a href="/kasir/dashboard/barang"><section><i class="far fa-box"></i> Barang
</section></a>

<a href="/kasir/dashboard/transaksi"><section><i class="far fa-cash-register"></i> Transaksi
</section></a>
<br>
<?php 
if($_SESSION['username']['level'] == 'SuperAdmin') {
?>

<small>Master</small>
<a href="/kasir/dashboard/user"><section><i class="far fa-user"></i> User Kasir</section></a>
</div>
<?php
}else{

}
?>
<div class="option-menu">
	<a href="/kasir/dashboard/logout" onclick="return confirm('Keluar?');"><section><i class="far fa-sign-out-alt"></i> Sign out</section></a>
</div>
<div class="div"></div>
</nav>
<style>
*{
	margin: 0 auto;
	padding: 0 auto;
	font-family: 'Segoe UI', sans-serif;
}
nav{
	position: fixed;
	z-index: 999;
	background: #fff;
	border-radius: 8px;
	display: none;
	right: 50px;
	box-shadow: 0 0 10px rgba(0,0,0,0.2);
	border: 1px solid #dcdcdc;
	margin-top: 70px;
}
nav .div{
	padding: 4px;
}
.right{
	margin-left: 10px;
}
nav .body-nav{
	padding: 20px;
}
nav .option-menu{
	border-top: 1px solid #dcdcdc;
}

nav .account-info{
	width: 400px;
	padding: 15px;
	border-bottom: 1px solid #dcdcdc;
}
nav section{
	padding: 10px;
	box-sizing: border-box;
	text-align: left;
	width: 100%;
}
nav section:hover{
	background: #08B9FF;
	color: #fff;
}

nav a{
	color: #333;
	font-weight: 300;
	text-decoration: none;
}
.textarea{
	width: 100%;
	box-sizing: border-box;
	padding: 10px;
	border: 1px solid #dcdcdc;
	border-radius: 4px;
	outline: none;
	height: 300px;
}
.to-right{
	float: right;
}
nav section:hover a{
	color: #fff;
}
header{
	width: 100%;
	position: fixed;
	background: #fff;
	box-shadow: 0 0 3px rgba(0,0,0,0.2);
	padding: 20px;
	color: #333;

}
header .title{
	font-size: 20px;
	font-weight: 800;
}
header .bar{
	margin-left: 10px;
	color: #333;
	padding: 5px;
	text-decoration: none;
	font-size: 23px;
}
header .right-side{
	float: right;
}
header ul{
	float: right;
	margin-top: 5px;
	list-style: none;
}
header ul li{
	display: inline-block;
}
header ul li a{
	font-weight: normal;
	padding: 5px 20px;
	text-decoration: none;
	color: grey;
}
.r-icon{
	margin-left: 10px;
}
.form select{
	padding: 10px;
	outline: none;
	background: #f2f2f2;
	border: 2px solid #dcdcdc; 
	box-sizing: border-box;
	width: 100%;
}
header img{
	position: absolute;
	max-width: 50px;
	width: 100%;
	margin-top: -15px;
}
.table{
}
.wrapper-form{
	width: 100%;
	display: flex;
}
.container_fluid{
	padding: 10px;
	width: 100%;
}
.form{
	width: 100%;
	background: #fff;
	margin-left: 0;
	padding: 20px;
	box-sizing: border-box;
}
.form input{
	padding: 10px;
	outline: none;
	background: #f2f2f2;
	border: 2px solid #dcdcdc; 
	box-sizing: border-box;
	width: 100%;
}
.container{
	max-width: 85rem;
}
h1{
	color: #333;
}
.form h1{
	color: #333;
}
.table input{
	border: 1px solid #dcdcdc;
	width: 300px;
	margin-left: 10px;
	padding: 8px;
}
.form button{
	padding: 15px;
	width: 100%;
	background: #08B9FF;
	outline: none;
	cursor: pointer;
	font-size: 19px;
	font-weight: 600;
	color: #fff;
	border: none;
	border-radius: 4px;
}
.btn-delete{
	padding: 10px;
	cursor: pointer;
	background: red !important;
	outline: none;
	font-size: 15px;
	font-weight: 600;
	color: #fff;
	border: none;
	border-radius: 4px;
}
.btn-export-pdf{
	padding: 10px;
	cursor: pointer;
	background: red !important;
	outline: none;
	font-size: 15px;
	font-weight: 600;
	color: #fff;
	border: none;
	border-radius: 4px;
}
.btn-update{
	padding: 10px;
	background: darkorange;
	outline: none;
	cursor: pointer;
	font-size: 15px;
	font-weight: 600;
	color: #fff;
	border: none;
	border-radius: 4px;
}
.btn{
	padding: 10px;
	/*background: darkorange;*/
	outline: none;
	font-size: 15px;
	font-weight: 600;
	/*color: #fff;*/
	border: none;
	border-radius: 4px;
}
.skyblue{
	background: #08B9FF;
	color: #fff;
}
.jumbotron{
	margin-top: 80px;
}
.table{
	margin-top: 30px;
}
.modal{
	padding: 20px;
	z-index: 999;
	background: rgba(0,0,0,0.3);
	width: 100%;
	height: 100vh;
	overflow: auto;S
}
.modal-body{
	max-width: 700px;

}

table{
	width: 100%;
	/*border: 1px solid #dcdcdc;*/
	border: 1px solid #dcdcdc;
	padding: 20px;
	border-collapse: collapse;
}
td button{
	margin-left: 10px;
}
tr, th{
	border:  none;
	border-bottom: 1px solid #dcdcdc;
	padding: 15px;
}
tr, td{
	padding: 10px;
	border-bottom: 1px solid #dcdcdc;
	text-align: center;
	font-weight: normal;
	border: none;
}
table tr:nth-child(even){
	background: #eee;
}
tr th{
	background: #fff !important;
}
td{
	overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
	border-bottom: 2px solid #dcdcdc;
}
th label{
	font-weight: 400;
}
tr:hover{
	background: #f2f2f2;
}
.select{
	padding: 8px;
	width: 80px;
	border-radius: 4px;
	border: 1px solid #dcdcdc;
	margin-left: 10px;
}
.modal{
	display: none;
	position: fixed;
	z-index: 999;
	width: 100%;
	height: 100vh;
	background: rgba(0,0,0,0.2);
}

.search input{
	padding: 10px;
	width: 400px	;
	margin-left: 0;
	background: #f2f2f2;
	border: 1px solid #dcdcdc;
}
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: #08B9FF;
  color: white;
  /*border: 1px solid #4CAF50;*/
}
.show{
	display: block;
}
.ellipsis {
    position: relative;
}
.ellipsis:before {
    content: '&nbsp;';
    visibility: hidden;
}
.ellipsis span {
    position: absolute;
    left: 0;
    right: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
#clock{
	text-decoration: none;
	color: #333;
}
</style>

<script>
	function openMenu() {
		document.querySelector("nav").classList.toggle("show");
	}

	function showModal() {
		document.querySelector(".modal").style.display = "block";
	}
	function closeModal() {
		document.querySelector(".modal").style.display = "none";
	}
	setInterval(showTime, 1000);
function showTime() {
	let time = new Date();
	let hour = time.getHours();
	let min = time.getMinutes();
	let sec = time.getSeconds();
	am_pm = "AM";

	if (hour > 12) {
		hour -= 12;
		am_pm = "PM";
	}
	if (hour == 0) {
		hr = 12;
		am_pm = "AM";
	}

	hour = hour < 10 ? "0" + hour : hour;
	min = min < 10 ? "0" + min : min;
	sec = sec < 10 ? "0" + sec : sec;

	let currentTime = hour + ":"
			+ min + ":" + sec +" "+ am_pm;

	document.getElementById("clock")
			.innerHTML = currentTime;
}
showTime();	

</script>