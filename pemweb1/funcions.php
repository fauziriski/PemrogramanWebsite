<?php

//koneksi data base
$conn = mysqli_connect("localhost", "root","","pemweb");

//funcions query menerima inputan dari quqry
function query($query){
	global $conn;
	$result_data = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result_data) ){
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $conn;
	//ambil data dari form
	$niknumber = htmlspecialchars($data["niknumber"]);
	$userid = htmlspecialchars($data["userid"]);
	$password = htmlspecialchars($data["password"]);
	$email =  htmlspecialchars($data["email"]);
	$phone = htmlspecialchars($data["phone"]);
	
	//query insert data
		$query = "INSERT INTO datapengguna
			VALUES
			('$niknumber','$userid','$password','$email','$phone','user')";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
		
	}
	

function hapus($hapus) {
	global $conn;
	mysqli_query($conn,"DELETE FROM datapengguna WHERE niknumber = $hapus");

	return mysqli_affected_rows($conn);
}

function ubah ($data){
	global $conn;

	//ambil data dari form
	$niknumber = htmlspecialchars($data["niknumber"]);
	$userid = htmlspecialchars($data["userid"]);
	$password = htmlspecialchars($data["password"]);
	$email =  htmlspecialchars($data["email"]);
	$phone = htmlspecialchars($data["phone"]);

	$query = "UPDATE datapengguna
			SET
			niknumber = '$niknumber',
			userid = '$userid',
			password = '$password',
			email = '$email',
			phone = '$phone',
			WHERE niknumber = '$niknumber'
			";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
		

}

function datadiri($niknumber){
	global $conn;
	$query = "SELECT * FROM datapengguna WHERE niknumber ='$niknumber'";

	return query($query);

}

function booking($data){
	global $conn;
	$id = $data["id"];
	$niknumber = $data["niknumber"];
	$userid = $data["userid"];
	$asal = $data["asal"];
	$tujuan = $data["tujuan"];
	$keberangkatan = $data["keberangkatan"];
	$kursi = $data["kursi"];
	$bis = $data["bis"];
	$kodeboking = $data["niknumber"].$data["tujuan"].$data["kursi"];

	$query = "UPDATE bis1
			SET
			id = '$id',
			niknumber = '$niknumber',
			userid = '$userid',
			asal = '$asal',
			tujuan = '$tujuan',
			keberangkatan = '$keberangkatan',
			kursi = '$kursi',

			kodeboking = '$kodeboking'
			WHERE id = '$id'
			";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
		

}

function rating($data){
	global $conn;
	$niknumber = $data["niknumber"];
	$userid = $data["userid"];
	$bis = $data["bis"];
	$kodeboking = $data["niknumber"].$data["tujuan"].$data["kursi"];

	$query = "INSERT INTO rating
			VALUES(
			'',
			'$niknumber',
			'$userid',
			'$kodeboking',
			'$bis',
			'',
			'')";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
		

}
function pemberi_rating($data){

	global $conn;
	$id = $data["id"];
	$niknumber = $data["niknumber"];
	$userid = $data["userid"];
	$bis = $data["bis"];
	$rating =$data["rating"];
	$komentar =$data["komentar"];

	$query = "UPDATE rating
			SET
			id = '$id',
			niknumber = '$niknumber',
			userid = '$userid',
			bis = '$bis',
			rating = $rating,
			komentar = '$komentar'
			WHERE id = '$id'
			";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
		



}

?>