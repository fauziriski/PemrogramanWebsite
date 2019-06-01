<?php

session_start();
require '../funcions.php';
 if( !isset($_SESSION["login"])){
 	header("location: ../login.php");
 }elseif (!isset($_SESSION["user"])) {
 		header("location: ../admin/");
 }

if (isset($_POST["cek"])) {
	$asal = $_POST["asal"];
	$tujuan = $_POST["tujuan"];
	$keberangkatan = $_POST["keberangkatan"];

$result1 = mysqli_query($conn,"SELECT * FROM bis2 WHERE 
		asal = '$asal' AND
		tujuan = '$tujuan' AND
		keberangkatan = '$keberangkatan'AND
		kursi LIKE '%A'");

$result2 = mysqli_query($conn,"SELECT * FROM bis2 WHERE 
		asal = '$asal' AND
		tujuan = '$tujuan' AND
		keberangkatan = '$keberangkatan' AND
		kursi LIKE '%B'");

$result3 = mysqli_query($conn,"SELECT * FROM bis2 WHERE 
		asal = '$asal' AND
		tujuan = '$tujuan' AND
		keberangkatan = '$keberangkatan' AND
		kursi LIKE '%C'");

$result4 = mysqli_query($conn,"SELECT * FROM bis2 WHERE 
		asal = '$asal' AND
		tujuan = '$tujuan' AND
		keberangkatan = '$keberangkatan' AND
		kursi LIKE '%D'");

}

?>

<!DOCTYPE html>
<html>
<head>
	 	<title>Kursi</title>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<style type="text/css">
			body{
				background-position: 50% 60%;
			}
			.kotak_login{

				width: 570px;
				/*meletakkan form ke tengah*/
				margin: 200px auto;
				padding: 30px 20px;
			}
 			
 			table{
 				font-family:Agency FB;
 				font-style: Smoolthan;
 			}
			th, td {
				color: white;
				font-size: 20px;
    			border: 1px solid #999;
    			padding: 10px 10px;
    			border-radius: 7px;

            }
            td.ada{
            	font-family:Agency FB;
 				font-style: Smoolthan;

            	color: #31708F;
				background-color: white;
				color: white;
				font-size: 30px;
    			border: 1px solid #999;
    			padding: 15px 15px;
    			border-radius: 7px;
            }
            td.tidak{
            	font-family:Agency FB;
 				font-style: Smoolthan;
            	color: #31708F;
				background-color: #FF0000;
				color: white;
				font-size: 30px;
    			border: 1px solid #999;
    			padding: 15px 15px;
    			border-radius: 7px;
            }             
            a{                 
			text-decoration: none;

			}



		</style>
</head>
<body>

	<div class="header">Welcome!</div>
	<div class="login">
			<a href="biodata.php" style="color: white">LOGIN</a>
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
	<table>
		<tr>
			Kursi No
		</tr>
		<?php $i = 1; ?>
		<?php $row = mysqli_fetch_assoc($result1);?>
		<?php foreach ($result1 as $dat) :?>
			
			<?php if ($dat["niknumber"] > 0) :?>
				<td class="tidak"><?=$dat["kursi"] ?></td>

			<?php else :?>
				<td class="ada"><a href="isi2.php?id=<?= $dat["id"]; ?>"><?=$dat["kursi"] ?></a></td>
			<?php endif; ?>

		<?php $i++; ?>
		<?php endforeach; ?>

		<tr>
		</tr>

		<?php foreach ($result2 as $dat) :?>
			
			<?php if ($dat["niknumber"] > 0) :?>
				<td class="tidak"><?=$dat["kursi"] ?></td>
			<?php else :?>
				<td class="ada"><a href="isi2.php?id=<?= $dat["id"]; ?>"><?=$dat["kursi"] ?></a></td>
			<?php endif; ?>
		<?php $i++; ?>
		<?php endforeach; ?>

		<tr>
			<td style="border:0; background-color:transparent;"></td>
		</tr>

		<?php foreach ($result3 as $dat) :?>
			
			<?php if ($dat["niknumber"] > 0) :?>
				<td class="tidak"><?=$dat["kursi"] ?></td>
			<?php else :?>
				
				<td class="ada"><a href="isi2.php?id=<?= $dat["id"]; ?>"><?=$dat["kursi"] ?></a></td>
			<?php endif; ?>
		<?php $i++; ?>
		<?php endforeach; ?>

		<tr>
		</tr>

		<?php foreach ($result4 as $dat) :?>
			
			<?php if ($dat["niknumber"] > 0) :?>
				<td class="tidak"><?=$dat["kursi"] ?></td>
			<?php else :?>
				
				<td class="ada"><a href="isi2.php?id=<?= $dat["id"]; ?>"><?=$dat["kursi"] ?></a></td>
			<?php endif; ?>
		<?php $i++; ?>
		<?php endforeach; ?>

	</table>
	</div>
</body>
</html>