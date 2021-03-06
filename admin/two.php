<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"];
$username = query("SELECT * FROM user ORDER BY username ASC");
// Perbaikan yang ini :  $username = query("SELECT * FROM user WHERE id != $userid  ORDER BY username ASC");


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
<link rel="stylesheet" href="../style/warna.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166295527-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166295527-1');
</script>


<body class="w3-text-white warna-back">


<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-theme-d3 w3-xxlarge" style="width:70px">
  <a href="menu.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  <a href="one.php" class="w3-bar-item w3-button"><i class="fas fa-user-astronaut"></i></a> 
  <a href="two.php" class="w3-bar-item w3-button"><i class="fa fa-book"></i></a> 
  <a href="three.php" class="w3-bar-item w3-button"><i class="fas fa-satellite-dish"></i></a>
  <a href="four.php" class="w3-bar-item w3-button"><i class="fa fa-history"></i></a>
  <a href="chat.php" class="w3-bar-item w3-button"><i class="fa fa-comments"></i></a>
  <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a> 
</div>

<div style="margin-left:70px">
<!-- Last Sidebar -->




<div class="w3-content w3-display-container" style="max-width:900px">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">
	
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Check the results of Gamfic</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>You can see and download the results (excel file .xls). Download all files <a href="two_excelall.php" class="w3-button w3-large w3-theme-d4 w3-round-xxlarge">download</a></p></div>
	</div>

<!-- Looping for the div table -->
<?php $i = 1; ?>	
<?php foreach ( $username as $row ) : ?>
		<!-- Looping for change colour div -->
		<?php if ( $i % 2 == 0 ) : ?>
			<div class="w3-row w3-theme-l1">
			<?php else : ?>
			<div class="w3-row w3-theme-l3">	
		<?php endif; ?>
		<!-- End div -->
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1><?= $i; ?> . <i class='fa fa-book'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1><?= $row["username"]; ?></h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="two_detail.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-theme-d1 w3-ripple"><i class='far fa-file-alt' style='font-size:24px'></i></a><a href="two_excel.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-theme-d1 w3-ripple"><i class='fa fa-cloud-download' style='font-size:24px'></i></a></div>
	</div>

<?php $i++; ?>
<?php endforeach; ?>	
<!-- End looping for the div table -->

	<div class="w3-row">
		<div class="w3-col w3-container">
		<!-- <a href="phase_3_1_peerlist.php" class="w3-button w3-section w3-green w3-ripple">Edit suggestion</a>-->&nbsp<a href="menu.php" class="w3-button w3-section w3-theme-d3 w3-ripple w3-round-xxlarge"><i class='fas fa-undo'></i></a></div>
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