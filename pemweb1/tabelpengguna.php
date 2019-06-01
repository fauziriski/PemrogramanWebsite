<?php
session_start();
require 'funcions.php';

 if( !isset($_SESSION["admin"])){
 	echo "Kalian bukan admin";
 	header("location: login.php");
 	exit;

 }
$datadiri = $_SESSION["admin"];
$data = query("SELECT * FROM datapengguna");

?>

<!DOCTYPE html>
<html>
<head>
	<title>table pengguna</title>
	<style type="text/css">
		body{
			background-color: black;
		}
	</style>
</head>
<body>
	<h1>Daftar Pengguna</h1>
	<a href="logout.php">Logout</a>
	<table border="1">
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
				<a href="hapus.php?niknumber=<?= $dat["niknumber"]; ?>">Hapus Data</a> ||
				<a href="ubah.php?niknumber=<?= $dat["niknumber"]; ?>">Ubah Data</a>
				
			</td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>


	</table>

</body>
</html>