<?php
include_once("koneksi.php");

if (isset($_GET["id"])) {
  $id = $_GET["id"];

  try {

    $query = mysqli_query($koneksi, "SELECT * FROM dinas WHERE ID='$id'") or die(mysqli_error($koneksi));
    $row = mysqli_fetch_assoc($query);
  } catch (Exception $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
  }
} else {
  die("Tidak ada id");
}

if (isset($_POST["edit"])) {

  session_start();

  try {

    $id = $_POST["id"];
    $skpd = $_POST["skpd"];
    $query = mysqli_query($koneksi, "UPDATE dinas SET SKPD='$skpd' WHERE ID='$id'");

    if ($query) {
      $_SESSION['sukses'] = 'Berhasil mengedit data!';
    } else {
      $_SESSION['gagal'] = 'Gagal mengedit data!, ' . mysqli_error($koneksi);
    }

    header("Location: index.php");
    die();
  } catch (Exception $e) {
    $_SESSION['gagal'] = 'Gagal mengedit data!, ' . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>

  <link rel="stylesheet" href="vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/sweetalert2/sweetalert2.css">
</head>

<body class="mb-5 bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="card w-75 text-center mt-5">
        <div class="card-header">
          <h2>EDIT DATA SKPD KAB.TAPIN</h2>
        </div>
        <form action="" method="post">
          <div class="card-body text-start">
            <div class="row">
              <div class="col-md-3">
                <div class="mb-3">
                  <label for="id" class="form-label">ID</label>
                  <input type="text" class="form-control" id="id" name="id" readonly value="<?= $row['ID'] ?>">
                </div>
              </div>
              <div class="col-md-9">
                <div class="mb-3">
                  <label for="skpd" class="form-label">SKPD</label>
                  <input type="text" class="form-control" id="skpd" name="skpd" placeholder="nama skpd" required value="<?= $row['SKPD'] ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-body-secondary">
            <div class="d-grid d-md-flex justify-content-md-start">
              <a href="index.php" class="btn btn-primary me-md-2 fw-bold" type="button">
                < Kembali</a>
                  <button name="edit" class="btn btn-success fw-bold" type="submit">Edit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/sweetalert2/sweetalert2.all.min.js"></script>

  <!-- Alert -->
  <?php
  if (isset($_SESSION['gagal'])) { ?>
    <script>
      Swal.fire({
        icon: "error",
        title: "<?= $_SESSION['gagal'] ?>",
        showConfirmButton: false,
        timer: 1500
      });
    </script>;
  <?php
    unset($_SESSION["gagal"]);
  }
  ?>
</body>

</html>