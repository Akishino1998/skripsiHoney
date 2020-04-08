<?php 
include 'config.php';
$sql = "DELETE FROM kendaraan WHERE idKendaraan='".$_GET['q']."'";
mysqli_query($link, $sql);
header("location: kendaraan.php");

?>

