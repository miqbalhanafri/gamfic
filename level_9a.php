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
	  <div class="w3-col w3-container w3-xxlarge s8"><h1><a class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%">Level 9 : CSS Margins</a></h1></div>
	  <div class="w3-col w3-container w3-xxlarge s2"><h1><a href="level_9b.php" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%"><i class='fas fa-angle-right'></i></a></h1></div>
	</div>

	<!-- Konten materi course -->
	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container">


<div class="w3-theme-border" style="border-width:1px;border-style:solid;margin:70px;padding:5px;">
Elemen ini memiliki margin 70px.
</div>

			<h3>Contoh :</h3>

	  <div class="w3-panel">
	  <a href="level_9a_coba.php" class="w3-button w3-large w3-theme-d3 w3-round-xxlarge" target="_blank">Coba Koding <i class='fas fa-code'></i></a>
	  </div>

	  <hr>

	  	<h1>CSS Margins</h1>
		<p>Properti <code class="w3-codespan">margin</code> CSS digunakan untuk membuat ruang/jarak di sekitar elemen, di luar batas/border yang ditentukan.</p>
		<p>Dengan CSS, Anda mengatur margin. Ada properti untuk mengatur margin untuk setiap sisi elemen (atas, kanan, bawah, dan kiri).</p>

		<hr>

		<h1>Margin - Individual Sides</h1>
		<p>CSS memiliki properti untuk menentukan margin pada setiap sisi elemen:</p>
		<ul>
			<li><code class="w3-codespan">margin-top</code></li>
			<li><code class="w3-codespan">margin-right</code></li>
			<li><code class="w3-codespan">margin-bottom</code></li>
			<li><code class="w3-codespan">margin-left</code></li>

		</ul>

		<p>Semua properti margin dapat memiliki nilai berikut:</p>
		<ul>
			<li>auto - browser akan menyesuaikan margin</li>
			<li>length - menentukan margin dalam px, pt, cm, dll.</li>
			<li>% - menentukan margin dalam % dari lebar elemen</li>
			<li>inherit - menentukan margin adalah turunan dari elemen utama</li>
		</ul>

		<p><b>Tips:</b> Margin bisa bernilai negatif.</p>

		<h3>Contoh :</h3>
		<p>Tetapkan margin yang berbeda untuk keempat sisi elemen &lt;p&gt;:</p>

<!-- Kode CSS -->
<div class="w3-panel w3-border w3-light-grey w3-round-large">
<xmp>p {
  margin-top: 100px;
  margin-bottom: 100px;
  margin-right: 150px;
  margin-left: 80px;
}
</xmp>
</div>
<!-- End Kode CSS -->

      <div class="w3-panel">
	  <a href="level_9a_coba2.php" class="w3-button w3-large w3-theme-d3 w3-round-xxlarge" target="_blank">Coba Koding <i class='fas fa-code'></i></a>
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

