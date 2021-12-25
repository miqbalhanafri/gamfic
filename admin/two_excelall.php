<?php  
session_start();
 
if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

// mengirim query ke functions.php
$userid = $_GET["id"]; 
// PHASE 1
$tampil = query("SELECT progress.id, progress.opsi, progress.keterangan, marketing.jobdesk, marketing.points, progress.tanggal, user.username 
	FROM ((progress 
	INNER JOIN marketing ON progress.opsi=marketing.id) 
	INNER JOIN user ON progress.user=user.id)
	WHERE progress.user 
	ORDER BY progress.id DESC");

$tampiluser = query("SELECT username FROM user WHERE id = '$userid' ");

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment; filename=GlooBaL.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>

<!DOCTYPE html>
<html>
<body>	

	<h1>Rekap Laporan GlooBal Marketing Fun (SOSMED)</h1>

<table border="1px" style="width:70%;">

<!-- Looping for the div table -->

	<tr>
		<td>No.</td>
		<td>User</td>		
		<td>Points</td>
		<td>Progress</td>
		<td>Tanggal</td>
		<td>Keterangan</td>
	</tr>

<?php $i = 1; ?>	
<?php foreach ( $tampil as $row ) : ?>

	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["username"]; ?></td>		
		<td><?= $row["points"]; ?></td>
		<td><?= $row["jobdesk"]; ?></td>
		<td><?= $row["tanggal"]; ?></td>
		<td><?= $row["keterangan"]; ?></td>

	</tr>

<?php $i++; ?>
<?php endforeach; ?><br>	
<!-- End looping for the div table -->

</table>


</body>
</html>

