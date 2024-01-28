<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/DataTables/datatables.min.css">
  <link rel="stylesheet" href="vendor/sweetalert2/sweetalert2.css">
</head>

<body class="mb-5 bg-light">
  <div class="container">
    <div class="card text-center mt-5">
      <div class="card-header">
        <h2>DATA SKPD KAB.TAPIN</h2>
      </div>
      <div class="card-body text-start">
        <table id="tabel-data" class="table table-striped table-hover table-bordered mt-4">
          <thead class="table-dark">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">ID</th>
              <th class="text-center">SKPD</th>
              <th class="text-center">AKSI</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            include_once("koneksi.php");

            try {
              $query = mysqli_query($koneksi, "SELECT * FROM dinas ORDER BY id DESC") or die("Terjadi kesalahan: " . mysqli_error($koneksi));

              while ($row = mysqli_fetch_array($query)) {
                echo "<tr>
                        <td>1</td>
                        <td>{$row['ID']}</td>
                        <td>{$row['SKPD']}</td>
                        <td></td>
                      </tr>";
              }
            } catch (Exception $e) {
              echo "Terjadi kesalahan: " . $e->getMessage();
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-body-secondary">
        <div class="d-grid d-md-flex justify-content-md-start">
          <a href="tambah.php" class="btn btn-success me-md-2 fw-bold" type="button">+ Tambah</a>
          <a href="cetak.php" target="_blank" class="btn btn-warning fw-bold" type="button">Cetak</a>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jQuery-3.7.0/jquery-3.7.0.min.js"></script>
  <script src="vendor/DataTables/datatables.min.js"></script>
  <script src="vendor/DataTables/DataTables-1.13.8/js/dataTables.bootstrap5.min.js"></script>
  <script src="vendor/sweetalert2/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(() => {
      $('#tabel-data').DataTable({
        "columnDefs": [{
            "targets": 0,
            "searchable": false,
            "render": function(data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            "targets": 3,
            "searchable": false,
            "render": function(data, type, row, meta) {
              return "<a href='edit.php?id=" + row[1] + "' class='btn btn-warning fw-bold'>Edit</a> <a href='hapus.php?id=" + row[1] + "' class='btn btn-danger fw-bold' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>";
            }
          }
        ],
      });
    });
  </script>

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
  } else if (isset($_SESSION["sukses"])) { ?>
    <script>
      Swal.fire({
        icon: "success",
        title: "<?= $_SESSION['sukses'] ?>",
        showConfirmButton: false,
        timer: 1500
      });
    </script>;
  <?php
    unset($_SESSION["sukses"]);
  }
  ?>

</body>

</html>