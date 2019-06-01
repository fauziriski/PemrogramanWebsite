<?php
session_start();

 if( !isset($_SESSION["login"])){
 	header("location: login.php");
 	exit;

 }
require 'funcions.php';

$no = $_GET["niknumber"];

	if (hapus($no) > 0 ){
		echo "Data Berhasil di Hapus";
	}else{
		echo "Gagal di hapus";
	}



?>

