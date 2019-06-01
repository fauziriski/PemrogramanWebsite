<?php
session_start();
require '../funcions.php';
$id = $_GET['id'];
$berangkat = mysqli_query($conn,"UPDATE db_bis
			SET 
			status ='0'
			WHERE id = $id");
$result = mysqli_query($conn, "SELECT * FROM db_bis WHERE id = '$id'");

$row = mysqli_fetch_assoc($result);

$tujuan = $row["tujuan"];
$keberangkatan = $row["keberangkatan"];

if ($berangkat>0) {
	echo "<script>
  			alert('Bis sudah sampai');
  			</script>";

	$query = "UPDATE bis2 SET 
			niknumber ='0', 
			userid = '', 
			kodeboking = '' 
			WHERE tujuan = '$tujuan' AND
			keberangkatan = '$keberangkatan'"; 

	$kosongkan = mysqli_query($conn,$query);

	if ($kosongkan > 0) {
		echo "<script>
  			alert('Data Telah Dikosongkan');
  			document.location.href = 'berangkat.php';
  			</script>";
	}
	else{
		echo "<script>
  			alert('datablmdihapus');
  			document.location.href = 'berangkat.php';
  			</script>";
	}

}

?>