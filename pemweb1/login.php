<?php
session_start();

require 'funcions.php';

 if(isset($_SESSION["login"])){
 	header("location: index.php");
 }

if (isset($_POST["login"])){
	$userid = $_POST["userid"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM datapengguna WHERE userid = '$userid'");

	if( mysqli_num_rows($result) == 1){

		//cekpassword
		$row = mysqli_fetch_assoc($result);

		if($password = $row["password"]){

			if ($row["level"] == "admin") {
				$_SESSION["admin"] = $userid;
				$_SESSION["niknumber"]= $row["niknumber"];
				$_SESSION["login"] = true;
				
				header("location: admin");
			}
			elseif ($row["level"] == "user") {
				$_SESSION["user"] = $userid;
				$_SESSION["niknumber"]= $row["niknumber"];
				$_SESSION["login"] = true;
				header("location: user");
			}

		}
		echo "Tidak Terdaftar";
	}
} 

?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		body{
			background-position: 50% 100%;
		}
 
		h1{
			text-align: center;
			font-weight: 300;
		}
		 
		.tulisan_login{
			text-align: center;
			/*membuat semua huruf menjadi kapital*/
			text-transform: uppercase;
		}
		 
		.kotak_login{

			width: 400px;
			/*meletakkan form ke tengah*/
			margin: 200px auto;
			padding: 30px 20px;
		}
		 
		label{
			font-size: 11pt;
		}
		ul{
			list-style-type:none;
		}
		 
		.form_login{
			border-radius: 15px;
			/*membuat lebar form penuh*/
			box-sizing : border-box;
			width: 80%;
			padding: 10px;
			text-align: 
			font-size: 11pt;
			margin-bottom: 20px;
		}
		 
		.tombol_login{
			border-radius: 30px;
			margin-left:  140px;
			background: #31708F;
			color: white;
			font-size: 11pt;
			width: 50%;
			border: none;
			border-radius: 3px;
			padding: 10px 20px;
		}
		 
		.link{
			color: #232323;
			text-decoration: none;
			font-size: 10pt;
		}

	</style>
</head>
<body>

	<div class="header">Welcome!</div>
	<div class="login">
			<a href="login.php" style="color: white">LOGIN</a>
		</div>
	</div>
	<div class= "menu">
	 	<ul>
	 		<li><a href="index.php"><img src="css/busz.png" style="margin-top:7px;width:20px;height:20px"></a></li>
			<li><a href="login.php">Ekonomi</a></li>
			<li><a href="#">Eksekutif</a></li>
			<li><a href="#">Royal</a></li>
			<li><a href="#">Rating</a></li>
		</ul>
	</div>

	<div class="kotak_login">
			<center><h1>Sentra Tiket</h1></center>
			<form action="" method="post">
				<ul>
					<li><img src="css/user.png" style="width: 35px; margin-bottom: -10px;">
						<input type="text" name="userid" placeholder="USERNAME" class="form_login" ></li>
				</ul>
				<ul>
					<li><img src="css/img_376352.png" style="width: 35px; margin-bottom: -10px;">
						<input type="password" name="password" placeholder="PASSWORD" class="form_login"></li>
				</ul>
				
				<button type="submit" name="login" class="tombol_login" style="border-radius: 15px;">Sign In</button><a href="insert.php"><img src="css/daftar.png" style="width: 35px; margin-bottom: -10px;"></a>
			</form>




	</div>

	<div class="footer">
			<div class="left"><a>Tentang Kami</a></div>
			<div class="right"><a>Tentang Kami</a></div>
			<center>
			<div class="mid">
				<img src="css/gmail.png"><a>gabut</a><br>
				<img src="css/gmail.png"><a>gabut</a><br>
				<img src="css/gmail.png"><a>gabut</a>
			</center>
			</div>
			
	</div>
</body>
</html>