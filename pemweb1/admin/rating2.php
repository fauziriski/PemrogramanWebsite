<?php
session_start();
require '../funcions.php';


$datadiri = $_SESSION["admin"];


$jumlahdataperhalaman = 5;
$x = query("SELECT * FROM rating WHERE rating > 0 AND bis = 'royal'");
$jumlahdata = count($x);
$jumlahhalaman = ceil($jumlahdata/$jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

$rating = query("SELECT * FROM rating WHERE rating > 0 AND bis = 'royal' LIMIT $awaldata,$jumlahdataperhalaman ");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="../style.css">
		
	<style type="text/css">
		body{
    		background-position: 50% -100%;
  		}
		.login{
			float: right;
			font-style: Smoolthan;
			font-size:20px;
			font-family:Agency FB;
			color:#fff;
			margin-right: 20px;

		}

		.table1 {
			font-family: monospace;
			font-size: 90px;
      		font-style: bold;
			color: #444;
			border-collapse: collapse;
			width: 100%;
			border: 1px solid #f2f5f7;
			}

		.table1 tr th{
			background: #35A9DB;
			color: #fff;
			font-weight: normal;
			}
		

		.table1, th, td {
			padding: 8px 20px;
			text-align: center;
			}

		.table1 tr:hover {
			background-color: #f5f5f5;
			}

		.table1 tr:nth-child(even) {
			background-color: #A9E2F3;
			}
		.kotak_login{
			background-color: white;
			font-family: monospace;
			border: 2px solid white;
			border-radius: 15px;
			/*background-color: white;*/
			width: 90%;
			/*meletakkan form ke tengah*/
			margin: 100px auto;
			padding: 30px 20px;

		}
		a{                 
			text-decoration: none;

			}

	</style>
</head>
<body>

	
	<div class="header">Welcome! <?=$datadiri;?>
		<div class="login">
			<a href="../logout.php" style="color: white">Logout</a>
		</div>
	</div>
	<div class= "menu">
	 	<ul>
	 		<li><a href="index.php"><img src="../css/busz.png" style="margin-top:7px;width:20px;height:20px"></a></li>
			<li><a href="berangkat2.php">Bis Royal</a></li>
			<li><a href="penumpang2.php">Penumpang Bis Royal</a></li>
			<li><a href="rating2.php">Rating Bis Royal</a></li>
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


	<div class="kotak_login">
	<table class="tabel1">
	<?php $i = 1; ?>
	<?php foreach ($rating as $dat) :?>
		<tr>
			<td><?= $dat['bis']; ?></td>
			<td><?= $dat['userid']; ?></td><td style="width: 100%; text-align:left;"><?= $dat['rating']; ?><img src="../css/bintang 1.png" style="width: 10px;"></td>
		</tr>
		<tr>
			<td style="font-size: 7px; line-height: 0px">Description</td>
		</tr>
		<tr style="">
			<td colspan="3" style="text-align: left; border-bottom: 1px solid black;"><?= $dat['komentar']; ?></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>

	<?php if($halamanaktif > 1) : ?>
		<a href="?halaman=<?= $halamanaktif - 1; ?>"><</a>
	<?php endif;?>

	<?php for($j =1; $j<=$jumlahhalaman; $j++) : ?>

		<?php if($j == $halamanaktif) :?>
			<a href="?halaman=<?= $j; ?>" style="font-weight: bold;color: red;"><?= $j; ?></a>

		<?php else :?>
			<a href="?halaman=<?= $j; ?>"><?= $j; ?></a>

		<?php endif; ?>

	<?php endfor; ?>

	<?php if($halamanaktif < $jumlahhalaman) : ?>
		<a href="?halaman=<?= $halamanaktif + 1; ?>">></a>
	<?php endif;?>


	</div>
</body>
</html>