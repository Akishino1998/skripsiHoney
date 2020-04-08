<?php
session_start();
include('config.php');
if(isset($_POST['submit'])){
    $query = "select * from user_akun where username = '".$_POST['username']."'";
    $hasil = mysqli_query($link, $query);
    // var_dump(mysqli_num_rows($hasil));
    if(mysqli_num_rows($hasil) > 0){
        while($data = mysqli_fetch_assoc($hasil) ){
            if($_POST['password'] == $data['password']){
                $query2 = "select * from user_biodata where username = '".$_POST['username']."'";
                $hasil2 = mysqli_query($link, $query2);               
                if (mysqli_num_rows($hasil2) > 0) {
                    while ($data2 = mysqli_fetch_assoc($hasil2)) {
                        $_SESSION["username"] = $data2['username'];
                        $_SESSION["nama_user"] = $data2['namaUser'];
                        header("location: index.php");
                    }
                }              
            }else{
                echo 'Password Salah!';
                header("location: login.php?q=1");
            }
        }
    }else{
        echo "Tidak Terdaftar!";
        header("location: login.php?q=2");
    }
}
?>