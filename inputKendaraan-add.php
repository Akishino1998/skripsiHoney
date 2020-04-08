 <?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $kt = $_POST['kt1']." ".$_POST['kt2']." ".$_POST['kt3'];

 include 'config.php';
 $imageFileType = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
 $target_dir = "uploads/";
 $target_file = $target_dir . rand(0,9999999999).".".$imageFileType;
 $uploadOk = 1;

$username = $_SESSION['username'];
echo $username;
 echo $imageFileType;
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $query = "INSERT INTO kendaraan(username,noRegistrasi,namaPemilik,alamat,merk_type,jenis,model,warna,foto,tahunPembuatan) VALUES ('".$username."','".$kt."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['merk']."','".$_POST['jenis']."','".$_POST['model']."','".$_POST['warna']."','".$target_file."','".$_POST['tahun']."')";
        echo  $query;
        mysqli_query($link, $query);
        header("location: kendaraan.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>