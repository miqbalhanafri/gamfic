<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapusprogress($id) > 0 ) {
	echo "
			<script>
			alert('The data has been deleted!');
			document.location.href = 'two.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The data can't be deleted!');
			document.location.href = 'two.php';
			</script>
		";
}




 ?>