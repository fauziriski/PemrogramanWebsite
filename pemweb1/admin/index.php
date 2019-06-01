<?php

session_start();
require '../funcions.php';

 if( !isset($_SESSION["login"])){
 	header("location: ../login.php");
 }
 elseif ( !isset($_SESSION["admin"])) {
 	header("location: ../user");
 }
 $datadiri = $_SESSION["admin"];
 // $datas = $_SESSION["datadiri"];
 // $data = datadiri($_SESSION["niknumber"]);

 $result = mysqli_query($conn,"SELECT * FROM datapengguna WHERE userid ='$datadiri'");
 $row = mysqli_fetch_assoc($result);




?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Latihan Menu
	</title>
	<link rel="stylesheet" type="text/css" href="../style.css">

		<style type="text/css">
		.login{
			float: right;
			font-style: Smoolthan;
			font-size:20px;
			font-family:Agency FB;
			color:#fff;
			margin-right: 20px;

		}
	</style>
</head>
	<div class="header">Welcome! <?=$datadiri;?>
	<div class="login">
			<a href="../logout.php" style="color: white">Logout</a>
		</div>
	</div>
	<div class= "menu">
	 	<ul>
	 		<li><a href="index.php"><img src="../css/busz.png" style="margin-top:7px;width:20px;height:20px"></a></li>
			<li><a href="berangkat.php">Bis Ekonomi</a></li>
			<li><a href="#">Bis Eksekutif</a></li>
			<li><a href="berangkat2.php">Bis Royal</a></li>
			<li><a href="tabelpengguna.php">Data User</a></li>
		</ul>
	</div>

	<div class="footer">
			<div class="left"><a>.Tentang Kami</a></div>
			<div class="right"><a>.Sentra TiketQ</a></div>
			<center>
			<div class="mid">
				<img src="../css/fb.png"><a>Sentra TiketQ</a><br>
				<img src="../css/gmail.png"><a>sentratiketq@gmail.com</a><br>
				<img src="../css/ig.png"><a>@sentratiketq</a><br>
				<img src="../css/maps.png"><a>JL. W.R. Mongonsidi No 17. Kota Balam</a>
			</center>
			</div>
			
	</div>
</body>
</html>