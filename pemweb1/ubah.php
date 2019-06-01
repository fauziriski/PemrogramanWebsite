<?php

session_start();

 if( !isset($_SESSION["login"])){
 	header("location: login.php");
 	exit;

 }

require 'funcions.php';

//ambil data
$niknumber = $_GET["niknumber"];

$data = query("SELECT * FROM datapengguna WHERE niknumber = $niknumber")[0];

if(isset($_POST["submit"])){
	
	if ( ubah($_POST) > 0){
		echo "Data Berhasil Diubah";
	}
	else {
		echo "Data Gagal Diubah";
	}

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Pelanggan</title>

</head>

<body>
	<h1>Ubah Data Pelanggan</h1>
	<form action="" method="post">
		<table>
			<tr>
				<td>NIK NUMBER</td>
				<td>:</td>
				<td><input type="int" name="niknumber" required value="<?= $data["niknumber"] ?>"></td>
			</tr>
			<tr>
				<td>USERID</td>
				<td>:</td>
				<td><input type="text" name="userid" value="<?= $data["userid"] ?>"></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td>:</td>
				<td><input type="password" name="password" value="<?= $data["password"] ?>"></td>
			</tr>
			<tr>
				<td>EMAIL</td>
				<td>:</td>
				<td><input type="email" name="email" value="<?= $data["email"] ?>"></td>
			</tr>
			<tr>
				<td>PHONE</td>
				<td>:</td>
				<td><input type="text" name="phone" value="<?= $data["phone"] ?>"></td>
			</tr>

		</table>
		<button type="submit" name="submit">Ubah Data</button>

	</form>

</body>

</html>