<!doctype html>
<html lang="en">

<?php
include 'components/head.php';
?>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <?php
    include 'components/sidebar.php';
    ?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <?php
      include 'components/navbar.php';
      ?>

      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-sticky-note"></i><a href="kriteria.php"> Kriteria</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT HITUNG-->
          <script>
            function fungsiku() {
              var a = (document.getElementById("peringkat_param").value).substring(0, 1);
              var b = (document.getElementById("ukuran_param").value).substring(0, 1);
              var c = (document.getElementById("unduhan_param").value).substring(0, 1);
              var d = (document.getElementById("aktif_param").value).substring(0, 1);
              var e = (document.getElementById("manfaat_param").value).substring(0, 1);
              var f = (document.getElementById("kelebihan_param").value).substring(0, 1);
              var total = Number(a) + Number(b) + Number(c) + Number(d) + Number(e) + Number(f);
              document.getElementById("peringkat").value = (Number(a) / total).toFixed(2);
              document.getElementById("ukuran").value = (Number(b) / total).toFixed(2);
              document.getElementById("unduhan").value = (Number(c) / total).toFixed(2);
              document.getElementById("aktif").value = (Number(d) / total).toFixed(2);
              document.getElementById("manfaat").value = (Number(e) / total).toFixed(2);
              document.getElementById("kelebihan").value = (Number(f) / total).toFixed(2);
            }
          </script>
          <!--END SCRIPT HITUNG-->


          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $peringkat = $_POST['peringkat'];
            $ukuran = $_POST['ukuran'];
            $unduhan = $_POST['unduhan'];
            $aktif = $_POST['aktif'];
            $manfaat = $_POST['manfaat'];
            $kelebihan = $_POST['kelebihan'];
            if (($peringkat == "") or
              ($ukuran == "") or
              ($unduhan == "") or
              ($aktif == "") or
              ($manfaat == "") or
              ($kelebihan == "")
            ) {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT * FROM saw_kriteria";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                echo "<script>
                alert('Hapus Bobot Lama untuk Membuat Bobot Baru');
                </script>";
              } else {
                $sql = "INSERT INTO saw_kriteria(
                  peringkat,ukuran,unduhan,aktif,manfaat,kelebihan)
                  values ('" . $peringkat . "',
                  '" . $ukuran . "',
                  '" . $unduhan . "',
                  '" . $aktif . "',
                  '" . $manfaat . "',
                  '" . $kelebihan . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Bobot Berhasil di Inputkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->


          <!--start inputan-->
          <form class="form-validate form-horizontal" id="register_form" method="post" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"><b>Kriteria</b></label>
              <div class="col-sm-3">
                <label><b>Bobot</b></label>
              </div>
              <div class="col-sm-2">
                <label><b>Perbaikan Bobot</b></label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Peringkat & Ulasan</label>
              <div class="col-sm-3">
                <select class="form-control" name="peringkat_param" id="peringkat_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="peringkat" id="peringkat">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Ukuran</label>
              <div class="col-sm-3">
                <select class="form-control" name="ukuran_param" id="ukuran_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="ukuran" id="ukuran">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Unduhan</label>
              <div class="col-sm-3">
                <select class="form-control" name="unduhan_param" id="unduhan_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="unduhan" id="unduhan">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Pengguna Aktif</label>
              <div class="col-sm-3">
                <select class="form-control" name="aktif_param" id="aktif_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="aktif" id="aktif">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Manfaat</label>
              <div class="col-sm-3">
                <select class="form-control" name="manfaat_param" id="manfaat_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="manfaat" id="manfaat">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Kelebihan</label>
              <div class="col-sm-3">
                <select class="form-control" name="kelebihan_param" id="kelebihan_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="kelebihan" id="kelebihan">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-outline-success" type="button" id="hitung" onclick="fungsiku()" name="hitung"><i class="fa fa-calculator"></i> Hitung</button>
              </div>
            </div>
            <div class="mb-4">
              <button class="btn btn-outline-primary" type="submit" name="submit"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> Peringkat & Ulasan</th>
                <th><i class="fa fa-arrow-down"></i> Ukuran</th>
                <th><i class="fa fa-arrow-down"></i> Unduhan</th>
                <th><i class="fa fa-arrow-down"></i> Pengguna Aktif</th>
                <th><i class="fa fa-arrow-down"></i> Manfaat</th>
                <th><i class="fa fa-arrow-down"></i> Kelebihan</th>
                <th><i class="fa fa-cogs"></i> Aksi</th>
              </tr>
            </thead>
            <?php
            $b = 0;
            $sql = "SELECT * FROM saw_kriteria";
            $hasil = $conn->query($sql);
            $rows = $hasil->num_rows;
            if ($rows > 0) {
              while ($row = $hasil->fetch_row()) {
            ?>
                <tr>
                  <td Align="center"><?= $row[1] ?></td>
                  <td Align="center"><?= $row[2] ?></td>
                  <td Align="center"><?= $row[3] ?></td>
                  <td Align="center"><?= $row[4] ?></td>
                  <td Align="center"><?= $row[5] ?></td>
                  <td Align="center"><?= $row[6] ?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-danger" href="kriteria_hapus.php?id=<?= $row[0] ?>"><i class="fa fa-close"></i></a>
                    </div>
                  </td>
                </tr>
            <?php }
            } else {
              echo "<tr>
                  <td>Data Tidak Ada</td>
              <tr>";
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