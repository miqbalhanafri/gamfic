<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"];


$tampil = query("SELECT progress.user, SUM(marketing.points) AS total, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	GROUP BY user 
	HAVING SUM(marketing.points) 
	ORDER BY SUM(marketing.points) DESC LIMIT 10
	");

$tampil2 = query("SELECT progress.user, SUM(marketing.points) AS total2, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	");


$tampilpoints = query("SELECT SUM(DISTINCT points) AS pointstotal FROM updates
	WHERE user='$userid' ORDER BY SUM(DISTINCT points) DESC
	");

$tampilan = query("SELECT updates.user, SUM(DISTINCT points) AS total, COUNT(updates.levels) AS jmlreview, user.username, uploadfoto.gambar, uploadfoto.motivasi, MAX(DISTINCT updates.levels) AS levelmu
	FROM ((updates
	LEFT JOIN user ON updates.user=user.id)
	LEFT JOIN uploadfoto ON updates.user=uploadfoto.user)
	GROUP BY user 
	HAVING SUM(updates.points) 
	ORDER BY total DESC, jmlreview DESC
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
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">
	
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Leaderboard Learning Web Design</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>Yuk, update terus sahabat. Naikkan levelmu ke ranking terbaik.</p></div>
	</div>

<!-- Looping for the div table -->

	<div class="w3-row w3-theme-l1">	
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1></h1></div>
	  <div class="w3-col w3-container w3-half"><h1>All Ranking</h1></div>
	  <div class="w3-col w3-container w3-quarter"><h1>Points</h1></div>
	</div>	
<!-- End looping for the div table -->


<!-- Mendapatkan nilai total -->
<?php $i = 1; ?>	
<?php foreach ( $tampil2 as $row2 ) : ?>
	
	<?php $totalpoints = $row2["total2"]; ?>

<?php $i++; ?>
<?php endforeach; ?>
<!-- End mendapatkan nilai total -->


<!-- Looping for the div table -->
<?php $i = 1; ?>	
<?php foreach ( $tampilan as $row ) : ?>

		<!-- Looping for change colour div -->
		<?php if ( $i % 2 == 0 ) : ?>
			<div class="w3-row w3-theme-d1">
			<?php else : ?>
			<div class="w3-row w3-theme-l3">	
		<?php endif; ?>
		<!-- End div -->
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1><img src="uploadfoto/<?= $row["gambar"]; ?>" class="w3-round w3-hover-sepia" alt="<?= $row["username"]; ?>" style="object-fit: cover;" width="100%" height="150px"></h1>
	  </div>
	  <div class="w3-col w3-container w3-half"><p style="font-size: 25px;"><?= $i; ?>. <?= $row["username"]; ?></p><p><?= $row["motivasi"]; ?></p><div class="w3-light-grey w3-round-xxlarge">
		 	<div class="w3-container w3-theme-d4 w3-round-xxlarge" style="width:<?= round(($row["levelmu"]/9)*100); ?>%"><?= round(($row["levelmu"]/9)*100); ?>%</div>
		</div></p></div>
	  <div class="w3-col w3-container w3-quarter"><a href="#" class="w3-button w3-section w3-theme-d5 w3-ripple w3-round-large" style="width:100%;"><h1><i class='fas fa-dollar-sign'></i> <?= $row["total"]; ?></h1><p><?= $row["jmlreview"]; ?> Reviews</p></a></div>  
	</div>

<?php $i++; ?>
<?php endforeach; ?><br>	
<!-- End looping for the div table -->


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