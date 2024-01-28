<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body class="mb-5">
  <div class="container">
    <h2 class="text-center mt-4">DATA SKPD KAB.TAPIN</h2>
    <table id="tabel-data" class="table table-bordered mt-4">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">ID</th>
          <th class="text-center">SKPD</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php
        include_once("koneksi.php");

        try {
          $query = mysqli_query($koneksi, "SELECT * FROM dinas ORDER BY id DESC") or die("Terjadi kesalahan: " . mysqli_error($koneksi));

          $no = 1;
          while ($row = mysqli_fetch_array($query)) {
            echo "<tr>
                        <td>" . $no++ . "</td>
                        <td>{$row['ID']}</td>
                        <td>{$row['SKPD']}</td>
                      </tr>";
          }
        } catch (Exception $e) {
          echo "Terjadi kesalahan: " . $e->getMessage();
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>