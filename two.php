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


$tampilan = query("SELECT MAX(DISTINCT levels) AS levelmu FROM updates
	WHERE user='$userid'
	");

$tampiltarget = query("SELECT * FROM target
	WHERE user='$userid' ORDER BY id DESC LIMIT 1
	");

$tampilevaluate = query("SELECT * FROM evaluate
	WHERE user='$userid' ORDER BY id DESC LIMIT 1
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
  <a href="menu.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">

	<p> Username : 

		<span style="color: yellow; font-size: 30px;">
		<?php foreach ( $userku as $row ) : ?>
			<?= $row["username"]; ?>,
		<?php endforeach; ?>
		</span>


		<?php foreach ( $tampilpoints as $row ) : ?>
			<?php $totalpoints = $row["pointstotal"]; ?>
		<?php endforeach; ?>

		<span class="heading">Your badges :</span>
		<span class="fa fa-star 

		<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "50") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>
		<span class="fa fa-star 

		<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "200") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>
		<span class="fa fa-star 

		<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "800") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>
		<span class="fa fa-star 

				<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "1800") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>
		<span class="fa fa-star 

				<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "3000") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>

		Your points : <span style="color: yellow; font-size: 30px;"><?php foreach ( $tampilpoints as $row ) : ?><?= $row["pointstotal"]; ?><?php endforeach; ?></span>
		.</p>


<!-- Foto dan motivasi -->
<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge w3-third">
		<?php foreach ( $tampil4 as $row ) : ?>
		<img src="uploadfoto/<?= $row["gambar"]; ?>" class="w3-round w3-hover-sepia" alt="gamfic" width="50%" style="object-fit: cover;" height="100px"> 
		<?php endforeach; ?>
	  </div>
	  <div class="w3-col w3-container w3-xlarge w3-twothird">
			
			  
			  <?php foreach ( $tampil4 as $row ) : ?>
			  	<i class="fa fa-quote-right w3-xxlarge"></i>
			  	<?= $row["motivasi"]; ?>

			<a href="one_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-theme-d3 w3-ripple w3-round-xxlarge"><i class='far fa-trash-alt' style='font-size:24px'></i></a>

			  <?php endforeach; ?>
		
	  </div>
</div>
<!-- End foto dan motivasi -->	



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



	<!-- Informations from teachers -->
	<div class="w3-panel w3-yellow w3-display-container">
	  <span onclick="this.parentElement.style.display='none'"
	  class="w3-button w3-large w3-display-topright">&times;</span>
	  <h1>Setting Target / Goals Belajar :</h1>
	  <p style="font-size: 30px;">

		<?php foreach ( $tampiltarget as $row ) : ?>
	  	<i class='fas fa-angle-right'></i> Target level : <?= $row["target_level"]; ?> level<br>
	  	<i class='fas fa-angle-right'></i> Target waktu belajar : <?= $row["target_waktu"]; ?> menit/hari <br>
	  	<i class='fas fa-angle-right'></i> Target points : <?= $row["target_points"]; ?> points <br>
	  	<i class='fas fa-angle-right'></i> Target review materi : <?= $row["target_reviews"]; ?> review <br>
	  	<?php endforeach; ?>

	  	<?php foreach ( $tampilevaluate as $row ) : ?>
	  	<i class='fas fa-angle-right'></i> Evaluasi target : 
	  	
	  	<?php if ($row["evaluate_reviews"] == null) {
	  		echo "belum";
	  	} else {
	  		echo "sudah";
	  	}
	  	 ?> 
	  	<br>
	  	<?php endforeach; ?>

		<?php foreach ( $tampilan as $row ) : ?>
		<div class="w3-light-grey w3-round-xxlarge">
	  	<div class="w3-container w3-theme-d4 w3-round-xxlarge" style="width:<?= round(($row["levelmu"]/9)*100); ?>%"><?= round(($row["levelmu"]/9)*100); ?>%</div>
	    </div>
		<?php endforeach; ?>

	  	<!--
		<?php foreach ( $info as $row ) : ?>
			<i class='fas fa-angle-right'></i> <?= $row["informasi"]; ?><br>
		<?php endforeach; ?>
	    -->

	  </p>

	  <p>
		<div class="w3-row">
			<div class="w3-col w3-container">
			<a href="two_target.php" class="w3-button w3-large w3-theme-d3 w3-round-xxlarge">Setting target <i class='fas fa-calendar-alt'></i></a>
			<a href="two_reflect.php" class="w3-button w3-large w3-theme-d3 w3-round-xxlarge">Refleksi per level <i class='fas fa-check-circle'></i></a>
			<a href="two_evaluate.php" class="w3-button w3-large w3-theme-d3 w3-round-xxlarge">Evaluasi target <i class='fas fa-calendar-check'></i></a>
		

			<?php foreach ( $tampilpoints as $row ) : ?>
				<?php $totalpoints = $row["pointstotal"]; ?>
			<?php endforeach; ?>

			<?php
			$t = $GLOBALS['totalpoints'];

			if ($t > "3500") { 
			  echo "<a href='certificate.php' target='_blank' class='w3-button w3-large w3-theme-d3 w3-round-xxlarge'>Cetak sertifikat <i class='fas fa-award'></i></a>";
			} else {
			  echo "<a class='w3-button w3-large w3-theme-d3 w3-round-xxlarge'><del>Cetak sertifikat </del><i class='fas fa-award'></i></i></a>";
			}
			?>

		    </div>
		</div>
	  </p>
	  
	  <ol><b>Catatan :</b>
	  <li>Silakan isi setting target untuk rencana pembelajaran.</li>
	  <li>Pastikan mengisi form refleksi setelah melakukan pembelajaran setiap level.</li>
	  <li>Evaluasi target silakan diisi setelah anda melakukan pembelajaran selama 3 hari.</li>
	  <li>Sertifikat bisa di cetak apabila telah melewati 3500 points.</li>
	  </ol>

	</div>
	<!-- End information -->



	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_1a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 1 </a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">CSS Introduction</a></h1></div>
	</div>
	<div class="w3-row w3-theme-d1">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_2a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 2</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">CSS Syntax</a></h1></div>
	</div>
	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_3a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 3</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">CSS Selectors</a></h1></div>
	</div>
	<div class="w3-row w3-theme-d1">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_4a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 4</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">How To Add CSS</a></h1></div>
	</div>
	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_5a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 5</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">CSS Comments</a></h1></div>
	</div>
	<div class="w3-row w3-theme-d1">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_6a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 6</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">CSS Colors</a></h1></div>
	</div>
	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_7a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 7</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">CSS Backgrounds</a></h1></div>
	</div>
	<div class="w3-row w3-theme-d1">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_8a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 8</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">CSS Borders</a></h1></div>
	</div>
	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="level_9a.php" class="w3-button w3-section w3-theme-d4 w3-ripple w3-round-xxlarge" style="width:100%">Level 9</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><h1><a class="w3-button w3-section" style="width:100%">CSS Margins</a></h1></div>
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

