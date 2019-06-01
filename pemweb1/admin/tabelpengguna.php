<?php
session_start();
require '../funcions.php';

 if( !isset($_SESSION["admin"])){
 	echo "Kalian bukan admin";
 	header("location: login.php");
 	exit;

 }
$datadiri = $_SESSION["admin"];
$data = query("SELECT * FROM datapengguna WHERE level ='user'");

?>

<!DOCTYPE html>
<html>
<head>
	<title>table pengguna</title>
<link rel="stylesheet" type="text/css" href="../style.css">

		<style type="text/css">
		body{
    		background-position: 50% -5000%;
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
			font-size: 20px;
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
			font-family: monospace;
			border: 2px solid white;
			border-radius: 15px;
      		background-color: transparent;
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
			<li><a href="berangkat.php">Bis Ekonomi</a></li>
			<li><a href="#">Bis Eksekutif</a></li>
			<li><a href="#">Bis Royal</a></li>
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
	<table class="table1">
		<tr>
			<th>No</th>
			<th>Niknumber</th>
			<th>Userid</th>
			<th>Password</th>
			<th>Email</th>
			<th>Nomor Handphone</th>
			<th>Edit</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach ($data as $dat) :?>
		<tr>
			<td><?= $i ?></td>
			<td><?= $dat["niknumber"]; ?></td>
			<td><?= $dat["userid"]; ?></td>
			<td><?= $dat["password"]; ?></td> 
			<td><?= $dat["email"]; ?></td>
			<td><?= $dat["phone"]; ?></td>
			
			<td>
				<a href="../hapus.php?niknumber=<?= $dat["niknumber"]; ?>">Hapus Data</a> ||
				<a href="../ubah.php?niknumber=<?= $dat["niknumber"]; ?>">Ubah Data</a>
				
			</td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>
	</div>

</body>
</html>