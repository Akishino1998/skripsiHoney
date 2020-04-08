<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
if(!$_SESSION['username']){
    header("location: login.php");
}
$array = ['Motor','Mobil','Truk'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <style>
        .navbar-dark .navbar-nav .nav-link{
            color: black;
            font-size: 1.3vw;
        }
        .navbar-dark .navbar-text a{
            color: black;
        }
        .navbar-dark .navbar-text a:hover{
            background: #d9d9d9;
        }
    </style>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color:#ffcccc">
    <a class="navbar-brand" href="index.php">
        <img src="img/profile.png" width="40" height="40" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="kendaraan.php">Data Kendaraan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lokasiParkir.php">Lokasi Parkir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lacak Kendaraan</a>
            </li>
        </ul>
        <span class="navbar-text">
            <div class="dropdown show">
                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hai, <?php echo(!$_SESSION['nama_user']=="")?$_SESSION["nama_user"]:$_SESSION["username"] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="biodata.php"><i class="fa fa-user" aria-hidden="true"></i> Biodata</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item  text-danger" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </div>
            </div>
        </span>
    </div>
</nav>
    <!-- <div id="header">
        <a href="#" class="title">LOGO</a>
        <img src="" alt="">
        <div id="menu">
            <a href="kendaraan.php"class="title">DATA KENDARAAN</a> 
            <a href="lokasiParkir.php" class="title">LOKASI PARKIR</a>
            <a href="#" class="title">LACAK KENDARAAN</a>
            <div id="menu2">
                <a href="#" class="title action-button">REGISTER</a>
                <a href="#" class="title action-button">LOGIN</a>
            </div>
        </div>
    </div> -->
    
    
