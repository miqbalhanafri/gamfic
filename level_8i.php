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



// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  // var_dump($_POST); untuk nge-test

  // cek apakah data berhasil ditambahkan atau tidak
  if ( tambahpoints($_POST) > 0 ) {
    echo "
      <script>
      
      document.location.href = 'level_8j.php';
      </script>
    ";
  } else {
    echo "
      <script>
      
      document.location.href = 'level_8h.php';
      </script>
    ";
  }

}



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
	  <div class="w3-col w3-container w3-xxlarge s2"><h1><a href="level_8h.php" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%"><i class='fas fa-angle-left'></i></a></h1></div>
	  <div class="w3-col w3-container w3-xxlarge s8"><h1><a class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%">Level 8 : Quiz Answer</a></h1></div>
	  <div class="w3-col w3-container w3-xxlarge s2"><h1><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%"><i class='fas fa-exclamation'></i></button></h1></div>
	</div>


	<!-- Konten materi course --> 
	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container">

	  	<center><h1><?php
            
            $answer1 = $_POST['question-1-answers'];
            //$answer2 = $_POST['question-2-answers'];
            //$answer3 = $_POST['question-3-answers'];
            //$answer4 = $_POST['question-4-answers'];
            //$answer5 = $_POST['question-5-answers'];
        
            $totalCorrect = 0;
            
            if ($answer1 == "D") { $totalCorrect++; }
            //if ($answer2 == "D") { $totalCorrect++; }
            //if ($answer3 == "A") { $totalCorrect++; }
            //if ($answer4 == "B") { $totalCorrect++; }
            //if ($answer5 == "D") { $totalCorrect++; }
            
            if ($totalCorrect == 1) {            
            	echo "<i class='fas fa-medal w3-animate-fading' style='font-size:80px; color:#854078;'></i><br>";
            	echo "Selamat anda benar<br>";
echo "
<form action='' enctype='multipart/form-data' method='POST'>
<input type='hidden' name='levels' value='8'>
<input type='hidden' name='points' value='230'>
<input type='hidden' name='quiz' value='8C'>
<button class='w3-button w3-section w3-ripple w3-theme-d2 w3-round-xxlarge' type='submit' name='submit' style='width:50%'> next <i class='fas fa-chevron-circle-right w3-ripple'></i></button>
</form>";

            } else {
            	echo "<i class='fas fa-exclamation-triangle' style='font-size:80px; color:#854078;'></i><br>";
            	echo "Maaf anda salah<br>";
            	echo "<a href='level_8h.php' style='text-decoration:none;'><span style='color:#854078;'>try again <i class='fas fa-chevron-circle-left w3-ripple'></i></a></span>";
            }
            
            //echo "<div id='results'>$totalCorrect correct</div>";
            
        ?>
        	
        </h1></center>

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


<!-- Notifikasi --> 
  <div id="id01" class="w3-modal w3-large">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-theme-d1"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Information :</h2>
      </header>
      <div class="w3-container" style="color: black;">
        <p>Silakan anda pilih button pada opsi (lanjut / coba kembali).</p>
        <p>Terima kasih.</p>
      </div>
      <footer class="w3-container w3-theme-d1">
        <p>SRL & Gamifications</p>
      </footer>
    </div>
  </div>
<!-- End notifikasi -->


<!-- Footer Website -->
  <div class="w3-container">
    <p class="w3-large"><a href="https://www.gidle.ntust.edu.tw/" target="_blank" style="text-decoration: none;">Graduate Institute of Digital Learning and Education, Taiwan Tech</a></p>
    <p>Created by <a href="https://miqbalhanafri.wordpress.com/" target="_blank" style="text-decoration: none;">Muhammad Iqbal Hanafri</a> & Supervised by <a href="https://shirley1216.weebly.com/" target="_blank" style="text-decoration: none;">Prof. Shirley Chen</a></p>
  </div>
 <!-- End Footer Website -->

</body>
</html>

