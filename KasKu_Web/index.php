<!DOCTYPE html>
<html>
<head>
	<title>Kasku</title>
  <link rel="shortcut icon" href="logo.JPG">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  
</head>
<body style="font-family: 'Open Sans', sans-serif;">
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0866c6; box-shadow: 0 3px 3px rgba(0, 0, 0, 0.05);">
    <a class="navbar-brand text-white ml-2" href="#">KasKu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars" style="color: white;"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="ml-auto text-white">Fikri Haekal | <i class="fas fa-sign-out-alt ml-1" style="color: white;" data-toggle="tooltip" title="Logout"></i></div>
    </div>
  </nav>
  <nav class="row no-gutters mt-5">
    <div class="col-md-2" style="border: none; background-color: #1F2837;">
      <ul class="nav flex-column pt-2">
        <li class="nav-item">
          <a class="nav-link mt-4 pt-3 pb-3 disabled" href="index.php" style="background-color: #EDEDED; color: #0866c6;">
            <table class="ml-2">
              <tr>
                <td width="30px"><i class="fas fa-tachometer-alt"></i></td>
                <td>Dashboard</td>
              </tr>
            </table>
            </a>
            <div class="garis"></div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white pt-3 pb-3" href="statistik.php">
            <table class="ml-2">
              <tr>
                <td width="30px"><i class="fas fa-chart-pie"></i></td>
                <td>Statistik</td>
              </tr>
            </table>
            </a>
            <div class="garis"></div>
        </li>
      </ul>
    </div>

    <div class="col-md-10 mt-2 pt-4 pl-4 pr-4" style="background-color: #EDEDED;">
      <h1>Dashboard</h1><br>
      <?php
        if(isset($_GET['pesan'])){
          $pesan = $_GET['pesan'];
          if($pesan == "update"){
            ?><div class="alert alert-success alert-dismissable fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data berhasil diperbarui</strong>
              </div> <?php
          }
          if($pesan == "delete"){
            ?><div class="alert alert-danger alert-dismissable fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Data berhasil dihapus</strong>
              </div> <?php
          }
        }

        function rupiah($angka){
          $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
          return $hasil_rupiah;
        }

        include "connect.php";
        $masuktmp1 = mysqli_query($koneksi,"SELECT SUM(nominal) AS masuk FROM penyimpanan WHERE jenis='Pemasukan'");
        $masuktmp2 = mysqli_fetch_assoc($masuktmp1);
        $masuk = $masuktmp2["masuk"];

        $keluartmp1 = mysqli_query($koneksi,"SELECT SUM(nominal) AS keluar FROM penyimpanan WHERE jenis='Pengeluaran'");
        $keluartmp2 = mysqli_fetch_assoc($keluartmp1);
        $keluar = $keluartmp2["keluar"];

        $jumlah = $masuk+(-1*$keluar);
      ?>
      <div class="row mr-auto ml-auto">
        <div class="col card" style="width: 18rem;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="far fa-plus-square"></i>
            </div>
            <h5 class="card-title">Pemasukan</h5>
            <h2 class="text-success"><b><?php echo rupiah($masuk); ?></b></h2>
          </div>
        </div>
        <div class="col ml-3 card" style="width: 18rem;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="far fa-minus-square"></i>
            </div>
            <h5 class="card-title">Pengeluaran</h5>
            <h2 class="text-danger"><b><?php echo rupiah($keluar); ?></b></h2>
          </div>
        </div>
        <div class="col ml-3 card" style="width: 18rem;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-wallet"></i>
            </div>
            <h5 class="card-title">Total</h5>
            <h2><b><?php echo rupiah($jumlah); ?></b></h2>
          </div>
        </div>
      </div>

      <div class="halaman pt-4 pl-4 pr-4 pb-4 mt-4">
        <div class="row mb-2 no-gutters">
          <div class="col-md-10">
            Data lengkap
          </div>
          <div class="col-md-2 pl-5">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#tambahdata">
              Tambah
            </button>

            <!-- Modal -->
            <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="add.php" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-5">
                          <label for="inputState">Jenis</label>
                          <select id="inputState" class="form-control" name="jenis">
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                          </select>
                        </div>
                        <div class="form-group col-md-7">
                          <label for="inputPassword4">Nominal</label>
                          <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                          </div>
                          <input type="number" class="form-control" name="nominal" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Tanggal</label>
                        <input type="date" class="form-control" id="inputAddress" name="tanggal">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="catatan"></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                  </div>
                </div>
              </div>            
            </div>

          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
            <tr>
              <th class="text-center" width="10%">NO</th>
              <th width="15%">Jenis</th>
              <th width="15%">Nominal</th>
              <th width="15%">Tanggal</th>
              <th>Catatan</th>
              <th class="text-center" width="107px">Opsi</th>
            </tr>
            </thead>
              <?php
              // Include / load file koneksi.php
              include "connect.php";
              
              // Cek apakah terdapat data page pada URL
              $page = (isset($_GET['page']))? $_GET['page'] : 1;
              
              $limit = 6; // Jumlah data per halamannya
              
              // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
              $limit_start = ($page - 1) * $limit;
              
              // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
              $sql = mysqli_query($koneksi,"SELECT * FROM penyimpanan ORDER BY tanggal DESC LIMIT ".$limit_start.",".$limit);
              
              $no = $limit_start + 1; // Untuk penomoran tabel
              foreach ($sql as $data) {
                ?>
                <tr>
                  <th scope="row" class="align-middle text-center"><?php echo $no++; ?></th>
                  <td class="align-middle"><?php echo $data['jenis']; ?></td>
                  <td class="align-middle">
                    <?php if($data['jenis'] == "Pemasukan"){
                      ?><p class="text-success"><?php echo rupiah($data['nominal']); ?></p><?php
                    } else {
                      ?><p class="text-danger"><?php echo rupiah($data['nominal']); ?></p><?php
                    } ?>
                  </td>
                  <td class="align-middle"><?php echo $data['tanggal']; ?></td>
                  <td class="align-middle"><?php echo $data['catatan']; ?></td>
                  <td class="align-middle text-center">
                    <a href='#editdata' class='btn btn-outline-primary btn-sm' id='id' data-toggle='modal' data-id="<?php echo $data['id']; ?>">
                      <i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i>
                    </a>
                    <!-- Button trigger modal
                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editdata">
                      <i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i>
                    </button> -->

                    <!-- Button trigger modal -->
                    <a href="#hapusdata" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-id="<?php echo $data['id']; ?>">
                      <i class="fas fa-trash-alt" data-toggle="tooltip" title="Hapus"></i>
                    </a>
                  </td>
                </tr>
              <?php
              }
              ?>
              
                <!-- Modal -->
                <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body fetched-data">
                      </div>
                    </div>
                  </div>
                </div>
              <script type="text/javascript">
                $(document).ready(function(){
                    $('#editdata').on('show.bs.modal', function (e) {
                        var rowid = $(e.relatedTarget).data('id');
                        //menggunakan fungsi ajax untuk pengambilan data
                        $.ajax({
                            type : 'post',
                            url : 'editdata.php',
                            data :  'rowid='+ rowid,
                            success : function(data){
                            $('.fetched-data').html(data);//menampilkan data ke dalam modal
                            }
                        });
                     });
                });
              </script>

              <div id="hapusdata" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-body align-middle text-center">
                      
                    </div>
                  </div>
                </div>
              </div>
              <script type="text/javascript">
                $(document).ready(function(){
                    $('#hapusdata').on('show.bs.modal', function (e) {
                        var rowid = $(e.relatedTarget).data('id');
                        //menggunakan fungsi ajax untuk pengambilan data
                        $.ajax({
                            type : 'post',
                            url : 'hapusdata.php',
                            data :  'rowid='+ rowid,
                            success : function(data){
                            $('.modal-body').html(data);//menampilkan data ke dalam modal
                            }
                        });
                     });
                });
              </script>
              <!--while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql-->
              
            </table>
          </div>
          
          <!--
          -- Buat Paginationnya
          -- Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang bagus tentunya
          -->
          <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <!-- LINK FIRST AND PREV -->
            <?php
            if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
            ?>
              <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
              <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <?php
            }else{ // Jika page bukan page ke 1
              $link_prev = ($page > 1)? $page - 1 : 1;
            ?>
              <li class="page-item"><a class="page-link" href="index.php?page=1">First</a></li>
              <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>
            
            <!-- LINK NUMBER -->
            <?php
            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM penyimpanan");
            $tmp = mysqli_fetch_assoc($sql2);
            $get_jumlah = $tmp["jumlah"];
            
            $jumlah_page = ceil($get_jumlah / $limit); // Hitung jumlah halamannya
            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
            $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
            
            for($i = $start_number; $i <= $end_number; $i++){
              $link_active = ($page == $i)? 'active' : '';
            ?>
              <li class="page-item <?php echo $link_active; ?>"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>
            
            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir 
            if($page == $jumlah_page){ // Jika page terakhir
            ?>
              <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
              <li class="page-item disabled"><a class="page-link" href="#">Last</a></li>
            <?php
            }else{ // Jika Bukan page terakhir
              $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
            ?>
              <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
              <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
            </nav>

        </div>
        <br><br><br><br><br><br><br>
    </div>
    

  <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <!--<script defer src="fontawesome/svg-with-js/js/fontawesome-all.min.js"></script>-->
  <script src="https://kit.fontawesome.com/943305e699.js" crossorigin="anonymous"></script>
  
</body>
</html>
