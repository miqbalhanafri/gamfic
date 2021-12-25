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
$info = query("SELECT informasi FROM info_admin");

$tampil = query("SELECT progress.user, SUM(marketing.points) AS totalpoints
	FROM marketing 
	LEFT JOIN progress ON progress.opsi = marketing.id 
	WHERE progress.user = '$userid'
	GROUP BY user
	ORDER BY SUM(marketing.points) DESC 
	");

$tampil2 = query("SELECT progress.user, SUM(marketing.points) AS total2, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	");

$tampil4 = query("SELECT * FROM uploadfoto WHERE user='$userid' ");

$tampil3 = query("SELECT COUNT(id) FROM progress WHERE user='$userid' ");

$tampil5 = query("SELECT progress.user, SUM(marketing.points) AS total5, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	GROUP BY user 
	HAVING SUM(marketing.points) 
	ORDER BY SUM(marketing.points) DESC LIMIT 10
	");

$tampilpoints = query("SELECT SUM(DISTINCT points) AS pointstotal FROM updates
	WHERE user='$userid' 
	");


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

<style>

.checked {
  color: orange;
}

</style>

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


<div class="w3-content w3-display-container" style="max-width:900px">

<header class="w3-container w3-center w3-animate-left">
  <!--<a href="menu.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>-->
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">



<!-- Mendapatkan nilai total -->
<?php $i = 1; ?>	
<?php foreach ( $tampil2 as $row2 ) : ?>
	
	<?php $totalpoints = $row2["total2"]; ?>

<?php $i++; ?>
<?php endforeach; ?>
<!-- End mendapatkan nilai total -->

<!-- Mendapatkan variabel pointsku -->
<?php foreach ( $tampil as $row ) : ?>

	<?php $pointsku = $row["totalpoints"]; ?>

<?php endforeach; ?>
<!-- End mendapatkan variabel pointsku -->

	<div class="w3-row w3-theme-d1">
	  <div class="w3-col w3-container w3-xxlarge s2"><h1><a href="two.php" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%"><i class='fas fa-angle-left'></i></a></h1></div>
	  <div class="w3-col w3-container w3-xxlarge s8"><h1><a class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%">Level 8 : CSS Borders</a></h1></div>
	  <div class="w3-col w3-container w3-xxlarge s2"><h1><a href="level_8b.php" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%"><i class='fas fa-angle-right'></i></a></h1></div>
	</div>

	<!-- Konten materi course -->
	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container">

	  	<h1>CSS Border Properties</h1>
		<p>Properti CSS Border memungkinkan Anda menentukan gaya, lebar, dan warna border/batas elemen.</p>

<div class="w3-container w3-border w3-border-black w3-margin-top">
<p>Paragaf ini memiliki border di semua sisi.</p>
</div>
<br>
<div class="w3-container w3-border-bottom w3-border-red">
<p>Paragraf ini memiliki border merah di bawah.</p>
</div>
<br>
<div class="w3-container w3-border w3-round-xlarge w3-border-white">
<p>Paragraf ini memiliki border yang sudutnya melingkar/rounded.</p>
</div>
<br>
<div class="w3-container w3-pale-blue w3-leftbar w3-border-blue">
<p>Paragraf ini memiliki border kiri berwarna biru.</p>
</div>
<hr>

		<h1>CSS Border Style</h1>
		<p>Properti <code class="w3-codespan" class="w3-codespan">border-style</code> menentukan jenis border yang akan ditampilkan.</p>
		<p>Berikut adalah jenis-jenis properti border style:</p>

<ul>
<li><code class="w3-codespan" class="w3-codespan">dotted</code> - Border titik-titik.</li>
<li><code class="w3-codespan" class="w3-codespan">dashed</code> - Border garis putus-putus</li>
<li><code class="w3-codespan" class="w3-codespan">solid</code> - Border garis solid</li>
<li><code class="w3-codespan" class="w3-codespan">double</code> - Border garis double</li>
<li><code class="w3-codespan" class="w3-codespan">groove</code> - Border 3D Groove. Efek tergantung pemilihan nilai border-color.</li>
<li><code class="w3-codespan" class="w3-codespan">ridge</code> - Border 3D ridged. Efek tergantung pemilihan nilai border-color.</li>
<li><code class="w3-codespan" class="w3-codespan">inset</code> - Border 3D inset. Efek tergantung pemilihan nilai border-color.</li>
<li><code class="w3-codespan" class="w3-codespan">outset</code> - Border 3D outset. Efek tergantung pemilihan nilai border-color.</li>
<li><code class="w3-codespan" class="w3-codespan">none</code> - Tidak ada border</li>
<li><code class="w3-codespan" class="w3-codespan">hidden</code> - Border tidak tampil/hidden.</li>
</ul>

		<p>Properti <code class="w3-codespan" class="w3-codespan">border-style</code> dapat memiliki satu hingga empat nilai (untuk border atas, border kanan, border bawah, dan border kiri).</p>

		<h3>Contoh :</h3>
		<p>Border style dengan jenis yang berbeda:</p>

<!-- Kode CSS -->
<div class="w3-panel w3-border w3-light-grey w3-round-large">
<xmp>p.dotted {border-style: dotted;}
p.dashed {border-style: dashed;}
p.solid {border-style: solid;}
p.double {border-style: double;}
p.groove {border-style: groove;}
p.ridge {border-style: ridge;}
p.inset {border-style: inset;}
p.outset {border-style: outset;}
p.none {border-style: none;}
p.hidden {border-style: hidden;}
p.mix {border-style: dotted dashed solid double;}
</xmp>
</div>
<!-- End Kode CSS -->

		<p>Hasilnya : </p>

<div class="w3-white w3-padding notranslate">
<p style="border-style: dotted;padding:2px 4px;">Border titik-titik.</p>
<p style="border-style: dashed;padding:2px 4px;">Border garis putus-putus.</p>
<p style="border-style: solid;padding:2px 4px;">Border garis solid.</p>
<p style="border-style: double;padding:2px 4px;">Border garis double.</p>
<p style="border-style: groove;padding:2px 4px;">Border 3D Groove. Efek tergantung pemilihan nilai border-color.</p>
<p style="border-style: ridge;padding:2px 4px;">Border 3D ridged. Efek tergantung pemilihan nilai border-color.</p>
<p style="border-style: inset;padding:2px 4px;">Border 3D inset. Efek tergantung pemilihan nilai border-color.</p>
<p style="border-style: outset;padding:2px 4px;">Border 3D outset. Efek tergantung pemilihan nilai border-color.</p>
<p style="border-style: none;padding:2px 4px;">Tidak ada border.</p>
<p style="border-style: hidden;padding:2px 4px;">Border tidak tampil/hidden.</p>
<p style="border-style: dotted dashed solid double;padding:2px 4px;">Border kombinasi/campuran.</p>
</div>

      <div class="w3-panel">
	  <a href="level_8a_coba.php" class="w3-button w3-large w3-theme-d3 w3-round-xxlarge" target="_blank">Coba Koding <i class='fas fa-code'></i></a>
	  </div>





	  </div>
	</div>
	<!-- Akhir konten materi course -->

	<div class="w3-row w3-theme-d1">
	  <div class="w3-col w3-container w3-xxlarge s4"><h1><a class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%"><?php foreach ( $tampilpoints as $row ) : ?><?= $row["pointstotal"]; ?><?php endforeach; ?> points</a></h1></div>
	  <div class="w3-col w3-container w3-xxlarge s4"><h1><center><img src="images/gamfic logo.png" width="60%"></center></h1></div>
	  <div class="w3-col w3-container w3-xxlarge s4"><h1><a href="testing.php" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%" target="_blank"><i class='far fa-keyboard'></i></a></h1></div>
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
