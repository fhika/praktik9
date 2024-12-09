<?php
include "koneksi.php";
$qkelas = "SELECT * FROM kelas";
$data_kelas = $conn->query($qkelas);
$qmahasiswa = "SELECT * FROM mahasiswa";
$data_mahasiswa = $conn->query($qmahasiswa);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.6">
  <title>Form Mahasiswa</title>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container">
    <div class="py-5 text-center">
      <h2>Form Mahasiswa</h2>
    </div>

    <div class="row">
      <!-- Data Mahasiswa -->
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Data Mahasiswa</span>
          <span class="badge badge-secondary badge-pill"><?php echo $data_mahasiswa->num_rows; ?></span>
        </h4>

        <?php
        foreach ($data_mahasiswa as $index => $value) {
        ?>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $value['nama_lengkap']; ?></h6>
                <small class="text-muted"><?php echo $value['alamat']; ?></small>
              </div>
              <span class="text-muted"><?php echo $value['kelas_id']; ?></span>
            </li>
          </ul>
        <?php
        }
        ?>
      </div>

      <!-- Input Form Mahasiswa -->
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Input Data Mahasiswa</h4>
        <form action="simpan_mahasiswa.php" method="POST">
          <div class="mb-3">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
          </div>

          <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
          </div>

          <div class="mb-3">
            <label for="kelas">Kelas</label>
            <select class="custom-select d-block w-100" id="kelas" name="kelas_id" required>
              <option value="">Pilih...</option>
              <?php
              foreach ($data_kelas as $index => $value) {
              ?>
                <option value="<?php echo $value['kelas_id']; ?>"><?php echo $value['nama']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyAKpF5y7QpZ80e1Qv6p5G8bXkF4Hzgzk6OfpxFg" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-8w8Zm9JkmTS6xY26tRl9jp98gaO3s6t4tk5Z2GVw5ZwFvlJru2sjpd5P4B6yCo4y" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>
