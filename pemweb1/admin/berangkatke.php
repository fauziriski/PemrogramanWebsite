<?php
session_start();
require '../funcions.php';
$id = $_GET['id'];
$berangkat = mysqli_query($conn,"UPDATE db_bis
			SET 
			status ='1'
			WHERE id = $id");

if ($berangkat>0) {
	echo "<script>
  			alert('Sedang Dalam Perjalanan');
  			document.location.href = 'berangkat.php';
  			</script>";
}

?>