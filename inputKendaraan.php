<?php
session_start();
include('config.php');
include('layouts/header.php');
?>
<br><br>
<br><br>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2>Form Input Kendaraan</h2>
            <form action="input_kendaraan-add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">No. Register</label>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" id="nama" class="form-control" placeholder="" name="kt1">
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="nama" class="form-control" placeholder="" name="kt2">
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="nama" class="form-control" placeholder="" name="kt3">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Merk/Type</label>
                    <input type="text" id="nama" class="form-control" placeholder="Merk/Type...." name="merk">
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select id="jenis" class="form-control" name="jenis">
                        <option value="">- Pilih Pekerjaan</option>
                        <option value="1">SPD-MTR</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Model</label>
                    <input type="text" id="nama" class="form-control" placeholder="Model...." name="model">
                </div>
                <div class="form-group">
                    <label for="nama">Warna</label>
                    <input type="text" id="nama" class="form-control" placeholder="Warna...." name="warna">
                </div>
                <div class="form-group">
                    <label for="umur">Tahun Pembuatan</label>
                    <input type="number" id="umur" class="form-control" placeholder="Tahun Pembuatan...." name="tahun">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" class="form-control" placeholder="Nama...." name="nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat...." name="alamat"></textarea>
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