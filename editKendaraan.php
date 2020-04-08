<?php
session_start();
include('config.php');
include('layouts/header.php');
$id = $_GET['q'];
?>
<br><br>
<br><br>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2>Form Edit Kendaraan</h2>
            <?php
                $query = "select * from user_kendaraan where username = '".$_SESSION['username']."' AND id_kendaraan='".$id."'";
                $hasil = mysqli_query($link, $query);
                if(mysqli_num_rows($hasil) > 0){
                    while($data = mysqli_fetch_assoc($hasil) ){
                        $kt = explode(" ", $data['noRegistrasi']);
                        ?>
                            <form action="editKendaraan-update.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                                <div class="form-group">
                                    <label for="nama">No. Register </label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" id="nama" class="form-control" placeholder="" name="kt1" value="<?php echo $kt[0] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="nama" class="form-control" placeholder="" name="kt2" value="<?php echo $kt[1] ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="nama" class="form-control" placeholder="" name="kt3" value="<?php echo $kt[2] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Merk/Type</label>
                                    <input type="text" id="nama" class="form-control" placeholder="Merk/Type...." name="merk" value="<?php echo $data['merk_type'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select id="jenis" class="form-control" name="jenis">
                                        <option value="1">Motor</option>
                                        <option value="2">Mobil</option>
                                        <option value="3">Truk</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Model</label>
                                    <input type="text" id="nama" class="form-control" placeholder="Model...." name="model" value="<?php echo $data['model'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Warna</label>
                                    <input type="text" id="nama" class="form-control" placeholder="Warna...." name="warna" value="<?php echo $data['warna'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="umur">Tahun Pembuatan</label>
                                    <input type="number" id="umur" class="form-control" placeholder="Tahun Pembuatan...." name="tahun" value="<?php echo $data['tahunPembuatan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" class="form-control" placeholder="Nama...." name="nama" value="<?php echo $data['namaPemilik'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat...." name="alamat"><?php echo $data['alamat'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo $data['foto'] ?>" alt="" width="300">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="fileToUpload">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
<br><br><br>
<?php 
include('layouts/footer.php');
?>
<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>