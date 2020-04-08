<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
$kt = $_POST['kt1']." ".$_POST['kt2']." ".$_POST['kt3'];
include 'config.php';
$username = $_SESSION['username'];

if($_FILES['fileToUpload']['name']==""){
    $query = "UPDATE user_kendaraan SET  noRegistrasi='".$kt."', namaPemilik='".$_POST['nama']."', alamat='".$_POST['alamat']."',merk_type='".$_POST['merk']."', jenis='".$_POST['jenis']."', model='".$_POST['model']."', warna='".$_POST['warna']."',tahunPembuatan='".$_POST['tahun']."' WHERE id_kendaraan='".$_POST['id']."'";
    mysqli_query($link, $query);
    header("location: kendaraan.php");
}else{
    echo 123123;
    $imageFileType = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
    $target_dir = "uploads/";
    $target_file = $target_dir . rand(0,9999999999).".".$imageFileType;
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        $query = "UPDATE user_kendaraan SET  noRegistrasi='".$kt."', namaPemilik='".$_POST['nama']."', alamat='".$_POST['alamat']."',merk_type='".$_POST['merk']."', jenis='".$_POST['jenis']."', model='".$_POST['model']."', warna='".$_POST['warna']."',tahunPembuatan='".$_POST['tahun']."', foto='".$target_file."' WHERE id_kendaraan='".$_POST['id']."'";
        mysqli_query($link, $query);
        header("location: kendaraan.php");
    }
}
?>