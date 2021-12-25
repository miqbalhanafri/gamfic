<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php'; 
// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
	// var_dump($_POST); untuk nge-test

	// cek apakah data berhasil ditambahkan atau tidak
	if ( tambahevaluate($_POST) > 0 ) {
		echo "
			<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'two.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'two_evaluate.php';
			</script>
		";
	}

}
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


<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-theme-d3 w3-xxlarge" style="width:70px">
  <a href="menu.php" class="w3-bar-item w3-button"><abbr title="Home"><i class="fa fa-home"></i></abbr></a> 
  <a href="one.php" class="w3-bar-item w3-button"><abbr title="Leaderboard"><i class="fa fa-users"></i></abbr></a> 
  <a href="two.php" class="w3-bar-item w3-button"><abbr title="Add Checklist"><i class="fas fa-tasks"></i></abbr></a> 
  <a href="three.php" class="w3-bar-item w3-button"><abbr title="Chatting"><i class="fa fa-comments"></i></abbr></a>
  <a href="logout.php" class="w3-bar-item w3-button"><abbr title="Log Out"><i class="fa fa-power-off"></i></abbr></a> 
</div>

<div style="margin-left:70px">
<!-- Last Sidebar -->



<div class="w3-content w3-display-container" style="max-width:900px;">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-mobile">

	<form action="" method="POST" enctype="multipart/form-data" class="w3-container w3-large w3-theme-d4">

	<h1>Silakan sahabat melakukan evaluasi belajar</h1>

	<p style="font-size: 25px;">1. Apakah target level tercapai?</p>
	<p>
		<input type="radio" class="w3-radio w3-round-xxlarge" name="evaluate_level" value="Ya" required> Ya, tercapai
		<input type="radio" class="w3-radio w3-round-xxlarge" name="evaluate_level" value="Tidak" required> Tidak tercapai
	</p>

	<p style="font-size: 25px;">2. Apakah target waktu belajar tercapai?</p>
	<p>
		<input type="radio" class="w3-radio w3-round-xxlarge" name="evaluate_waktu" value="Ya" required> Ya, tercapai
		<input type="radio" class="w3-radio w3-round-xxlarge" name="evaluate_waktu" value="Tidak" required> Tidak tercapai
	</p>

	<p style="font-size: 25px;">3. Apakah target points tercapai?</p>
	<p>
		<input type="radio" class="w3-radio w3-round-xxlarge" name="evaluate_points" value="Ya" required> Ya, tercapai
		<input type="radio" class="w3-radio w3-round-xxlarge" name="evaluate_points" value="Tidak" required> Tidak tercapai
	</p>

	<p style="font-size: 25px;">4. Apakah target review pelajaran dan pemahaman tercapai?</p>
	<p>
		<input type="radio" class="w3-radio w3-round-xxlarge" name="evaluate_reviews" value="Ya" required> Ya, tercapai
		<input type="radio" class="w3-radio w3-round-xxlarge" name="evaluate_reviews" value="Tidak" required> Tidak tercapai
	</p>

	<p style="font-size: 25px;">5. Masukkan evaluasi belajar anda? Apa yang menjadi motivasi dan apa saja yang menjadi kendala?</p>
	<p>
		<textarea class="textinput w3-round-xxlarge" rows="10" style="margin-top: 15px; width: 100%; height: 150px; border:none; padding: 10px;" placeholder="Silakan jelaskan secara detail terkait pencapaian belajar" name="evaluate_detail" required></textarea>
	</p>

	<p>Catatan : Silakan anda isi setelah melakukan pembelajaran hingga 3 hari, sesuai jadwal yang sudah ditentukan.</p>

	<p>
	<button type="submit" name="submit" class="w3-button w3-section w3-theme-d2 w3-ripple w3-round-xxlarge"> Save</button> <a href="two.php" class="w3-button w3-section w3-theme-d2 w3-ripple w3-round-xxlarge"><i class='fas fa-undo'></i></a>
	</p>

	</form>

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

