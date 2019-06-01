<?php
 session_start();
 require '../funcions.php';

 if( !isset($_SESSION["login"])){
 	header("location: ../login.php");
 }
 elseif ( !isset($_SESSION["user"])) {
 	header("location: ../admin");
 }
 $datadiri = $_SESSION["user"];

$data = query("SELECT * FROM datapengguna WHERE userid ='$datadiri'")[0];

if(isset($_POST["submit"])){
	
	if ( ubah($_POST) > 0){
		echo "
  			<script>
  			alert('Data Berhasil Diubah');
  			document.location.href = 'index.php';
  			</script>
  		";
	}
	else {
		echo "
  			<script>
  			alert('Data Gagal Diubah');
  			document.location.href = 'biodata.php';
  			</script>
  		";
	}

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Pelanggan</title>
	<link rel="stylesheet" type="text/css" href="../style.css">

		<style type="text/css">

		body{
			background-position: 50% 70%;
		}

		.login{
			float: right;
			font-style: Smoolthan;
			font-size:20px;
			font-family:Agency FB;
			color:#fff;
			margin-right: 20px;

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
		li{
			font-family: monospace;
			font-size: 17px;
			font-style: bold;
		}
		 
		.kotak_login{
			font-family: monospace;
			/*background-color: white;*/
			width: 500px;
			/*meletakkan form ke tengah*/
			margin: 100px auto;
			padding: 30px 20px;

		}
		 
		label{
			font-size: 11pt;
		}
		ul{
			list-style-type:none;
		}
		 
		.form_login{
			background-color: white;
			font-style: bold;
			font-family:monospace;
			border-radius: 15px;
			color: black;
			box-sizing : border-box;
			width: 90%;
			padding: 10px;
			font-size: 17px;
			margin-bottom: 20px;
			
		}
		 
		.tombol_login{
			font-family: monospace;
			border-radius: 20px;
			margin-left:  10px;
			background: #31708F;
			color: white;
			font-size: 11pt;
			width: 30%;
			border: none;
			border-radius: 10px;
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
	<div class="header">Welcome!
		<div class="login">
			<a href="mytiket.php" style="color: white">My Tiket</a>
			<a href="../logout.php" style="color: white">Logout</a>
			<a href="biodata.php" style="color: white">My Account</a>
		</div>
	</div>
	<div class= "menu">
	 	<ul>
	 		<li><a href="index.php"><img src="../css/busz.png" style="margin-top:7px;width:20px;height:20px"></a></li>
			<li><a href="booking.php">Ekonomi</a></li>
			<li><a href="#">Eksekutif</a></li>
			<li><a href="#">Royal</a></li>
			<li><a href="rating.php">Rating</a></li>
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
	<div class="kotak_login">
		<center><img src="../css/user.png"></center>
	<form action="" method="post">
	
			<ul>

				<li><input type="int" name="niknumber" required value="<?= $data["niknumber"] ?>" class="form_login"></li>
			</ul>
			<ul>

				<li><input type="text" name="userid" value="<?= $data["userid"] ?>" class="form_login"></li>
			</ul>
			<ul>

				<li><input type="password" name="password" value="<?= $data["password"] ?>" class="form_login"></li>
			</ul>
			<ul>

				<li><input type="email" name="email" value="<?= $data["email"] ?>" class="form_login"></li>
			</ul>
			<ul>

				<li><input type="text" name="phone" value="<?= $data["phone"] ?>" class="form_login"></li>
			</ul>

		<center><button type="submit" name="submit" class="tombol_login">SAVE</button></center>

	</form>
	</div>

</body>

</html>