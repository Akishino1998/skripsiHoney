<?php
session_start();
include('config.php');
include('layouts/header.php');
?>
<style>

main {
  
  height: 85vh;
  margin:45px 0px 0px 240px;
 
}
main .helper {
  background: rgba(0, 0, 0, 0.2);
  color: #ffea92;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate3d(-50%, -50%, 0);
  padding: 1.2em 2em;
  text-align: center;
  border-radius: 20px;
  font-size: 2em;
  font-weight: bold;
}
main .helper span {
  color: rgba(0, 0, 0, 0.2);
  font-size: 0.4em;
  display: block;
}
.menu {
    overflow-y: scroll;
    background: #5bc995;
    height: 100vh;
    width: 240px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 5;
    outline: none;
    margin-top:80px;
}
.menu .avatar {
  background: rgba(0, 0, 0, 0.1);
  padding: 2em 0.5em;
  text-align: center;
}
.menu .avatar img {
  width: 100px;
  border-radius: 50%;
  overflow: hidden;
  border: 4px solid #ffea92;
  box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.2);
}
.menu .avatar h2 {
  font-weight: normal;
  margin-bottom: 0;
}
.menu ul {
  list-style: none;
  padding:  0px;
  margin: 0;
}
.menu ul li {
  padding: 0.5em 1em 0.5em 3em;
  font-size: 0.95em;
  font-weight: regular;
  background-repeat: no-repeat;
  background-position: left 15px center;
  background-size: auto 20px;
  transition: all 0.15s linear;
  cursor: pointer;
}
.menu ul li.icon-dashboard {
  background-image: url("http://www.entypo.com/images//gauge.svg");
}
.menu ul li.icon-customers {
  background-image: url("http://www.entypo.com/images//briefcase.svg");
}
.menu ul li.icon-users {
  background-image: url("http://www.entypo.com/images//users.svg");
}
.menu ul li.icon-settings {
  background-image: url("http://www.entypo.com/images//tools.svg");
}
.menu ul li:hover {
  background-color: rgba(0, 0, 0, 0.1);
}
.menu ul li:focus {
  outline: none;
}
@media screen and (max-width: 900px) and (min-width: 400px) {
  body {
    padding-left: 90px;
  }
  .menu {
    width: 90px;
  }
  .menu .avatar {
    padding: 0.5em;
    position: relative;
  }
  .menu .avatar img {
    width: 60px;
  }
  .menu .avatar h2 {
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 100px;
    margin: 0;
    min-width: 200px;
    border-radius: 4px;
    background: rgba(0, 0, 0, 0.4);
    transform: translate3d(-20px, -50%, 0);
    transition: all 0.15s ease-in-out;
  }
  .menu .avatar:hover h2 {
    opacity: 1;
    transform: translate3d(0px, -50%, 0);
  }
  .menu ul li {
    height: 60px;
    background-position: center center;
    background-size: 30px auto;
    position: relative;
  }
  .menu ul li span {
    opacity: 0;
    position: absolute;
    background: rgba(0, 0, 0, 0.5);
    padding: 0.2em 0.5em;
    border-radius: 4px;
    top: 50%;
    left: 80px;
    transform: translate3d(-15px, -50%, 0);
    transition: all 0.15s ease-in-out;
  }
  .menu ul li span:before {
    content: '';
    width: 0;
    height: 0;
    position: absolute;
    top: 50%;
    left: -5px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    border-right: 5px solid rgba(0, 0, 0, 0.5);
    transform: translateY(-50%);
  }
  .menu ul li:hover span {
    opacity: 1;
    transform: translate3d(0px, -50%, 0);
  }
}
.card{
    text-decoration: none;
}
</style>    


<input type="text" value="<?php echo $_GET['q'] ?>" id="id" hidden>
    <br><br>
    <nav class="menu" tabindex="0">
        <ul>
            <?php
                // $kendaraan = $_GET['q'];
                $kendaraan = 1;
                $query = "SELECT * FROM user_kendaraan, tb_parkir_masuk  WHERE user_kendaraan.username = 'ndahsnty_' AND user_kendaraan.id_kendaraan = tb_parkir_masuk.id_kendaraan ";
                 
                $hasil = mysqli_query($link, $query);
                if(mysqli_num_rows($hasil) > 0){
                    while($data = mysqli_fetch_assoc($hasil) ){
                    ?>
                    
                    <input type="text" value="<?php echo $data['latitude']; ?>" id="latitude<?php echo $data['id_kendaraan'] ?>" hidden>
                    <input type="text" value="<?php echo $data['longtitude']; ?>" id="longtitude<?php echo $data['id_kendaraan'] ?>" hidden>
                    <input type="text" value="<?php echo $data['tanggalMasuk']; ?>" id="tglMasuk<?php echo $data['id_kendaraan'] ?>" hidden>
                    <input type="text" value="<?php echo $data['jamMasuk']; ?>" id="jamMasuk<?php echo $data['id_kendaraan'] ?>" hidden>
                    <input type="text" value="<?php echo $data['namaJukir']; ?>" id="namaJukir<?php echo $data['id_kendaraan'] ?>" hidden>
                            
                    

                    <a href="?q=<?php echo $data['id_kendaraan'] ?>">
                        <div class="card" >
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                <img src="<?php echo $data['foto']; ?>" class="card-img" alt="<?php echo $data['foto']; ?>">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $data['noRegistrasi'] ?></h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                </div>
                            </div>
                        </div>
                    </a>
                
                    <?php
                        }
                    }
                ?>
        </ul>
    </nav>

    <div class="map">
      <main id="map">
      </main>
    </div>
        

<?php 
include('layouts/footer.php');
?>

<script>
<?php
if(isset($_GET['q'])){
?>

  var id = $('#id').val();
  var lat = $('#latitude'+id).val();
  var long = $('#longtitude'+id).val();
  var tglMasuk = $('#tglMasuk'+id).val();
  var jamMasuk = $('#jamMasuk'+id).val();
  var namaJukir = $('#namaJukir'+id).val();
          
  function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(lat, long),
          zoom: 16
      });
      var marker=new google.maps.Marker({
          position: new google.maps.LatLng(lat, long),
          map: map
      });
      var infowindow = new google.maps.InfoWindow({
          content: '<b>Data Parkir</b><br>Tanggal Masuk : ' + tglMasuk+
          '<br>Jam Masuk : ' + jamMasuk+
          '<br>Nama Jukir : ' + namaJukir
      });
      marker.addListener('click', function() {
          infowindow.open(marker.get('map'), marker);
      });
      infowindow.open(map,marker);
  }

<?php
}else{
  $kendaraan = 1;
  $query = "SELECT * FROM user_kendaraan, tb_parkir_masuk  WHERE user_kendaraan.username = '1' AND user_kendaraan.id_kendaraan = tb_parkir_masuk.id_kendaraan "; 
  $hasil = mysqli_query($link, $query);
  if (mysqli_num_rows($hasil) > 0) {
    ?>
    var InforObj = [];
    

    function initMap() {
        var infowindow = new google.maps.InfoWindow(); /* SINGLE */
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-0.485419, 117.136238),
            zoom: 14
        });
          <?php
          while ($data = mysqli_fetch_assoc($hasil)) {
            ?>
            var lat = "<?php echo $data['lat'] ?>";
            var long = "<?php echo $data['lng'] ?>";

            var marker<?php echo $data['id_kendaraan'] ?>=new google.maps.Marker({
                position: new google.maps.LatLng(lat, long),
                map: map
            });
            var infowindow<?php echo $data['id_kendaraan'] ?> = new google.maps.InfoWindow({
                content: '<b>Data Parkir</b><br>Tanggal Masuk : '
            });
            marker<?php echo $data['id_kendaraan'] ?>.addListener('click', function() {
                closeOtherInfo();
                infowindow<?php echo $data['id_kendaraan'] ?>.open(marker<?php echo $data['id_kendaraan'] ?>.get('map'), marker<?php echo $data['id_kendaraan'] ?>);
                InforObj[0] = infowindow<?php echo $data['id_kendaraan'] ?>;
            });
            <?php
          }
          ?>
    }
    function closeOtherInfo() {
        if (InforObj.length > 0) {
            InforObj[0].set("marker", null);
            InforObj[0].close();
            InforObj.length = 0;
        }
    }
    
    <?php
  }
}

?>

    </script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuMfmEvT4gnBGN-QDuGH6TTrd3NqsNIsM&callback=initMap">
</script>
