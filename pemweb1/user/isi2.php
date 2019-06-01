<?php
session_start();
require '../funcions.php';
 if( !isset($_SESSION["login"])){
 	header("location: ../login.php");
 }elseif (!isset($_SESSION["user"])) {
 		header("location: ../admin/");
 }

  $no = $_GET["id"];

  $data = query("SELECT * FROM bis2 WHERE id = $no")[0];

  	$data["niknumber"] = $_SESSION["niknumber"];
  	$data["userid"] = $_SESSION["user"];
  	$kodeboking=$data["niknumber"].$data["tujuan"].$data["kursi"];

  if (isset($_POST["booking"])) {
  	
  	if (booking2($_POST) AND rating($_POST)>0) {
  		echo "
  			<script>
  			alert('Selamat Bookingan Anda Berhasil');
  			document.location.href = 'index.php';
  			</script>
  		";
  	}
  	else{
  		echo "
  			<script>
  			alert('Gagal Booking');
  			document.location.href = 'booking2.php';
  			</script>
  		";
  	}
  }
  if (isset($_POST["batal"])) {
  	header("location: booking2.php");
  }



?>

<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
	<link rel="stylesheet" type="text/css" href="../style.css">

		<style type="text/css">
		body{
			background-position: 50% 100%;
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
			background-color: white;
			font-style: Smoolthan;
			font-family:monospace;
			border-radius: 15px;
			color: black;
			box-sizing : border-box;
			width: 60%;
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
		<div class="header">Welcome!
		<div class="login">
			<a href="mytiket.php" style="color: white">My Tiket</a>
			<a href="../logout.php" style="color: white">Logout</a>
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
		<h1>PAYMENT METHODE</h1>
		<form action="" method="post">
			<ul>
				<li>Virtual Payment
					<input type="text" name="kodeboking" class="form_login" required value="<?= $data["niknumber"].$data["tujuan"].$data["kursi"] ?>" disabled>
				</li>
			</ul>

			<ul>
				<li>Total Bayar 
					&nbsp &nbsp 
					<input type="text" name="harga" class="form_login" required value="<?= $data["harga"] ?>" disabled>
				</li>
			</ul>


		<input type="hidden" name="id" required value="<?= $data["id"] ?>">
		<input type="hidden" name="niknumber" required value="<?= $data["niknumber"] ?>">
		<input type="hidden" name="userid" required value="<?= $data["userid"] ?>">
		<input type="hidden" name="asal" required value="<?= $data["asal"] ?>">
		<input type="hidden" name="tujuan" required value="<?= $data["tujuan"] ?>">
		<input type="hidden" name="keberangkatan" required value="<?= $data["keberangkatan"] ?>">
		<input type="hidden" name="kursi" required value="<?= $data["kursi"] ?>" >
		<input type="hidden" name="bis" required value="<?= $data["bis"] ?>" >



		<button type="submit" name="booking" class="tombol_login">Done</button>
		<button type="batal" name="batal" class=" tombol_login" >Cancel</button>

		</form>

	</div>
</body>
</html>