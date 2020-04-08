<?php
session_start();
include('config.php');
include('layouts/header.php');
?>
<style>
th{
    text-align: center;
}
.center{
    text-align:center;
}
</style>
<br><br>
<br><br>
<br><br>
<div class="container">

<h1>Data Kendaraan Anda</h1>
    <a href="inputKendaraan.php"><button type="button" class="btn btn-primary btn-lg">Tambah Kendaraan</button></a>
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th>Nama Pemilik</th>
                        <th>Alamat</th>
                        <th>Merk/Type</th>
                        <th>Jenis</th>
                        <th>Model</th>
                        <th>Warna</th>
                        <th>Tahun Pembuatan</th>
                        <th>Foto</th>     
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "select * from user_kendaraan where username = '".$_SESSION['username']."'";
                $hasil = mysqli_query($link, $query);
                if(mysqli_num_rows($hasil) > 0){
                    while($data = mysqli_fetch_assoc($hasil) ){
                        ?>
                            <tr>
                                <td><?php echo $data['namaPemilik']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['merk_type']; ?></td>
                                <td><?php echo $data['jenis']; ?></td>
                                <td><?php echo $data['model']; ?></td>
                                <td><?php echo $data['warna']; ?></td>
                                <td class="center"><?php echo $data['tahunPembuatan']; ?></td>
                                <td class="center"><button type="button" class="btn btn-primary seePic " data-toggle="modal" data-target="#myModal" foto="<?php echo $data['foto']; ?>">Lihat Foto</button></td>
                                <td class="center">
                                    <a href="editKendaraan.php?q=<?php echo $data['id_kendaraan']; ?>"><button type="button" class="btn btn-success seePic ">Edit</button></a>
                                    <a href="hapusKendaraan-delete.php?q=<?php echo $data['id_kendaraan']; ?>"><button type="button" class="btn btn-danger seePic ">Hapus</button></a>
                                </td>
                               
                            </tr>
                            <?php
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br>
<br><br>
<?php 
include('layouts/footer.php');

?>

<script>
$(document).ready(function() {
    $(".seePic").click(function(){
        $('.foto').attr('src',$(this).attr('foto'));
        $('#myModal').modal('show')
    });

} );

</script>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <img src="" alt="" class="foto" width="100%">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>


