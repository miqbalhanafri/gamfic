<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}


// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"]; 
$userku = query("SELECT username FROM user WHERE id = '$userid' ");


 ?>


<!DOCTYPE html>
<html>
<title>Gamfic - SRL and Gamification</title>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/warna.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-169208659-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-169208659-1');
</script>


<body class="w3-text-white warna-back">

<div class="w3-content w3-display-container" style="max-width:900px;">

<header class="w3-container w3-center w3-animate-left">
  <a onclick="window.print()" style="text-decoration:none;"><br><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>


<div class="w3-container w3-margin-top w3-mobile">

	<div class="w3-container w3-large w3-theme-d4">
	
	<center>

	<h1>Certificate <i class='fas fa-award'></i></h1>
	<p style="color: #e4c6db;"><i>This is to certify that</i></p>
	<h1>

		<?php foreach ( $userku as $row ) : ?>
			<?= $row["username"]; ?>
		<?php endforeach; ?>

	</h1>
	<p style="color: #e4c6db;"><i>Has succesfully completed the</i></p>


	<h3>CSS (Cascading Style Sheets) Basics</h3>

	<p style="color: white;"><i>Researcher</i><br>
	<img src="images/miqbalhanafri.png" width="200px"><br>
	<i>Muhammad Iqbal Hanafri, S.Pi., M.Kom.</i></p>

	</center>
	</div>

</div>

</div>

<!-- Footer Website -->
  <div class="w3-container">
    <p class="w3-large"><a href="https://www.gidle.ntust.edu.tw/" target="_blank" style="text-decoration: none;">Graduate Institute of Digital Learning and Education, Taiwan Tech</a></p>
    <p>Created by <a href="https://miqbalhanafri.wordpress.com/" target="_blank" style="text-decoration: none;">Muhammad Iqbal Hanafri</a> & Supervised by <a href="https://shirley1216.weebly.com/" target="_blank" style="text-decoration: none;">Prof. Shirley Chen</a></p>
  </div>
 <!-- End Footer Website -->
  
</body>
</html>

