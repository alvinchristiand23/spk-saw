<!doctype html>
<html lang="en">

<head>
  <title>Pemilihan Aplikasi Editor's Choice di PlayStore</title>
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
        <li class="active">
          <a href="index.php"><span class="fa fa-user"></span> Alternatif</a>
        </li>
        <li>
          <a href="kriteria.php"><span class="fa fa-sticky-note"></span> Kriteria</a>
        </li>
        <li>
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

          <h5 class="nav"> SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN APLIKASI EDITOR'S CHOICE DI PLAY STORE |<b>| METODE SAW</b></h5>
        </div>
      </nav>

      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-user"></i><a href="index.php"> Alternatif</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT INSERT-->
          <?php
          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $pengembang = $_POST['pengembang'];
            $kategori = $_POST['kategori'];
            if (($nama == "") or ($pengembang == "")) {
              echo "<script>alert('Tolong Lengkapi Data yang Ada!');</script>";
            } else {
              $sql = "SELECT * FROM saw_aplikasi WHERE nama='$nama'";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                $row = $hasil->fetch_row();
                echo "<script>alert('Aplikasi $nama Sudah Ada!');</script>";
              } else {
                $sql = "INSERT INTO saw_aplikasi(nama,pengembang,kategori)
                values ('" . $nama . "','" . $pengembang . "','" . $kategori . "')";
                $hasil = $conn->query($sql);
                echo "<script>alert('Data Barhasil diTambahkan!');</script>";
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
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Pengembang Aplikasi</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="pengembang">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Kategori Aplikasi</label>
              <div class="col-sm-5">
                <select class="form-control" name="kategori">
                  <option>Pendidikan</option>
                  <option>Kesehatan</option>
                  <option>Hiburan</option>
                  <option>Permainan</option>
                  <option>Olahraga</option>
                  <option>Sosial</option>
                  <option>Lainnya</option>
                </select>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
            <br><br>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Aplikasi</th>
                <th scope="col">Pengembang Aplikasi</th>
                <th scope="col">Kategori Aplikasi</th>
                <th><i class="icon_cogs"></i> Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $b = 0;
              $sql = "SELECT*FROM saw_aplikasi ORDER BY nama ASC";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                while ($row = $hasil->fetch_row()) {
              ?>
                  <tr>
                    <td><?php echo $b = $b + 1; ?></td>
                    <td><?= $row[0] ?></td>
                    <td><?= $row[1] ?></td>
                    <td><?= $row[2] ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" href="alt_ubah.php?nama=<?= $row[0] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="alt_hapus.php?nama=<?= $row[0] ?>"><i class="fa fa-close"></i></a>
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