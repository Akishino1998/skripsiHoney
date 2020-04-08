<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTER</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <style>
    .form{
        border:20px solid rgba(0,0,0,.5);
        width: 400px;
        height: 200px;
        background: rgb(160, 38, 123);
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -140px;
        margin-left: -240px;
        /* text-align: center; */
        padding:40px;
        display: table;
    }
    .formRegister{
        background:orange;
        display: table-cell;
        /* text-align: center; */
        border:50px solid rgba(0,0,0,.2);
    }

input {
  font-family: "Asap", sans-serif;
  display: block;
  border-radius: 5px;
  font-size: 16px;
  background: white;
  width: 100%;
  border: 0;
  padding: 10px 10px;
  margin: 10px 0px;
}
.buttom-submit{
  font-family: "Asap", sans-serif;
  cursor: pointer;
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  width: 150px;
  border: 0;
  padding: 10px 10px;
  margin-top: 20px;
  background-color: #dd9af1;
}
.text-desc{
    font-size: 20px;
    font-family: 'Oswald', sans-serif;
}
table{
    margin-left: 0px;
}
a{
    text-decoration: none;
    color:pink;

}
    </style>
</head>
<body>
    <div class="form">
        <form action="register.php" method="POST" id="formRegister"">
            <table>
                <tr class="tr">
                    <td width="100" class="text-desc">
                        Username
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <td class="text-desc">
                        Password
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <td class="text-desc">
                        Retype Password
                    </td>
                    <td>
                        <input type="password" name="repassword" placeholder="Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><input type="submit" name="submit" value="REGISTER" class="buttom-submit"></center>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
<?php
if(isset($_POST['submit'])){
    $query = "select * from user_akun where username = '".$_POST['username']."'";
    $hasil = mysqli_query($link, $query);
    if(mysqli_num_rows($hasil) > 0){
        echo 'swal("Username Telah Digunakan!", "Username yang anda masukan sudah digunakan!", "error");';
    }else{
        if($_POST['password'] != $_POST['repassword']){
            echo 'swal("Password Tidak Sama!", "Password Yang Anda Masukkan Tidak Sama!", "error");';
        }else{
            echo "alert(1)";
            $query = "INSERT INTO user_akun(username,password) VALUES ('".$_POST['username']."','".$_POST['password']."')";
            $hasil =  mysqli_query($link, $query);
            echo $hasil;
        }
    }

    
}
?>
</script>