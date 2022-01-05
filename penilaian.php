<!doctype html>
<html lang="en">

<head>
  <title>Sidebar 07</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
      <h1><a href="index.php" class="logo">AC</a></h1>
      <ul class="list-unstyled components mb-5">
        <li>
          <a href="index.php"><span class="fa fa-user"></span> Alternatif</a>
        </li>
        <li>
          <a href="kriteria.php"><span class="fa fa-sticky-note"></span> Kriteria</a>
        </li>
        <li class="active">
          <a href="penilaian.php"><span class="fa fa-list-ol"></span> Penilaian</a>
        </li>
        <li>
          <a href="hitung.php"><span class="fa fa-cogs"></span> Hitung</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-outline-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>

          <p class="nav"> SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN APLIKASI EDITOR'S CHOICE DI PLAY STORE - METODE SAW </p>
        </div>
      </nav>

      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-list-ol"></i><a href="penilaian.php"> Penilaian</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $peringkat = $_POST['peringkat'];
            $ukuran = substr($_POST['ukuran'], 1, 1);
            $unduhan = substr($_POST['unduhan'], 1, 1);
            $aktif = substr($_POST['aktif'], 1, 1);
            $manfaat = substr($_POST['manfaat'], 1, 1);
            $kelebihan = substr($_POST['kelebihan'], 1, 1);
            if ($peringkat == "" || $ukuran == "" || $unduhan == "" || $aktif == "" || $manfaat == "" || $peringkat == "") {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT*FROM saw_penilaian WHERE nama='$nama'";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                $row = $hasil->fetch_row();
                echo "<script>
                alert('Aplikasi $nama sudah ada!');
                </script>";
              } else {
                //insert name
                $sql = "INSERT INTO saw_penilaian(
                nama,peringkat,ukuran,unduhan,aktif,manfaat,kelebihan)
                values ('" . $nama . "',
                '" . $peringkat . "',
                '" . $ukuran . "',
                '" . $unduhan . "',
                '" . $aktif . "',
                '" . $manfaat . "',
                '" . $kelebihan . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Penilaian Berhasil di Tambahkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->

          <!--start inputan-->
          <form method="POST" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama Aplikasi</label>
              <div class="col-sm-5">
                <select class="form-control" name="nama">
                  <<?php
                    //load nama
                    $sql = "SELECT * FROM saw_aplikasi";
                    $hasil = $conn->query($sql);
                    $rows = $hasil->num_rows;
                    if ($rows > 0) {
                    ?> <?php while ($row = mysqli_fetch_array($hasil)) :; {
                          } ?> <option><?php echo $row[0]; ?></option>
                  <?php endwhile; ?>
                </select>
              <?php } ?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Peringkat & Ulasan</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="peringkat" id="peringkat">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Ukuran Aplikasi</label>
              <div class="col-sm-5">
                <select class=" form-control" name="ukuran">
                  <option>(1) Sangat Ringan</option>
                  <option>(2) Ringan</option>
                  <option>(3) Sedang</option>
                  <option>(4) Berat</option>
                  <option>(5) Sangat Berat</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Jumlah Unduhan</label>
              <div class="col-sm-5">
                <select class=" form-control" name="unduhan">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Jumlah Pengguna Aktif</label>
              <div class="col-sm-5">
                <select class=" form-control" name="aktif">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Manfaat Aplikasi</label>
              <div class="col-sm-5">
                <select class=" form-control" name="manfaat">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Kelebihan Aplikasi</label>
              <div class="col-sm-5">
                <select class=" form-control" name="kelebihan">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
            <br><br>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> No</th>
                <th><i class="icon_id-2_alt"></i> Nama</th>
                <th><i class="fa fa-arrow-down"></i> Peringkat & Ulasan</th>
                <th><i class="fa fa-arrow-down"></i> Ukuran Aplikasi</th>
                <th><i class="fa fa-arrow-down"></i> Jumlah Unduhan</th>
                <th><i class="fa fa-arrow-down"></i> Jumlah Pengguna Aktif</th>
                <th><i class="fa fa-arrow-down"></i> Manfaat</th>
                <th><i class="fa fa-arrow-down"></i> Kelebihan</th>
                <th><i class="icon_cogs"></i> Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $b = 0;
              $sql = "SELECT*FROM saw_penilaian ORDER BY nama ASC";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                while ($row = $hasil->fetch_row()) {
              ?>
                  <tr>
                    <td align="center"><?php echo $b = $b + 1; ?></td>
                    <td><?= $row[0] ?></td>
                    <td align="center"><?= $row[1] ?></td>
                    <td align="center"><?= $row[2] ?></td>
                    <td align="center"><?= $row[3] ?></td>
                    <td align="center"><?= $row[4] ?></td>
                    <td align="center"><?= $row[5] ?></td>
                    <td align="center"><?= $row[6] ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" href="penilaian_hapus.php?nama=<?= $row[0] ?>">
                          <i class="fa fa-close"></i></a>
                      </div>
                    </td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </section>
      </section>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>