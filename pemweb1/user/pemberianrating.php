<?php
session_start();

require '../funcions.php';

$id = $_GET["id"];

$data = query("SELECT * FROM rating WHERE id = $id")[0];


if (isset($_POST["rat"])) {
	if (pemberi_rating($_POST)>0) {
		echo "
  			<script>
  			alert('Terimakasih');
  			document.location.href = 'index.php';
  			</script>
  		";
  	
	}
	else{
		echo "Gagal";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

  <link rel="stylesheet" type="text/css" href="../style.css">
    

  <style type="text/css">

  body{
    background-position: 50% 50%;
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
      margin-top: 0;
      font-family: monospace;
      font-size: 40px;
      font-style: bold;
      color: #f2f2f2;
      text-transform: uppercase;
      font-style: Smoolthan;
    }

    .kotak_login{
      border-radius: 15px;
      background-color: transparent;
      width: 350px;
      /*meletakkan form ke tengah*/
      margin: 200px auto;
      padding: 30px 20px;
      border: 2px solid white;
      
    }
    .tombol_login{
      border-radius: 10px;
      margin-left:  0px;
      background: #31708F;
      color: white;
      font-size: 11pt;
      width: 100%;
      border: none;
      padding: 10px 20px;
    }

    img.b{
      width: 50px;
    }
    textarea{
      border-radius: 15px;
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
  <center><h1>RATING</h1></center>
<form action="" method="post">
	<input type="hidden" name="id" value="<?= $data["id"]; ?>">
	<input type="hidden" name="niknumber" value="<?= $data["niknumber"]; ?>">
	<input type="hidden" name="userid" value="<?= $data["userid"]; ?>">
	<input type="hidden" name="bis" value="<?= $data["bis"]; ?>">

  <table border="0">
  <tr>
  <th><img class="b" src="../css/b1.png"></th>
  <th><img class="b" src="../css/b2.png"></th>
  <th><img class="b" src="../css/b3.png"></th>
  <th><img class="b" src="../css/b4.png"></th>
  <th><img class="b" src="../css/b5.png"></th>
  </tr>

  <tr>
  <th><input type="radio" name="rating" value="1"></th>
  <th><input type="radio" name="rating" value="2"></th>
  <th><input type="radio" name="rating" value="3"></th>
  <th><input type="radio" name="rating" value="4"></th>
  <th><input type="radio" name="rating" value="5"></th>

  </tr>
  <tr>
     <th colspan="5"><textarea name="komentar" cols="45" rows="10"> </textarea></th>
  </tr>
  </table>
  <button type="submit" name="rat" class="tombol_login">Submit</button>
  </form>

  </div>
</body>
</html>