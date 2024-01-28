<?php
include_once("koneksi.php");

if (isset($_GET["id"])) {

  session_start();

  try {

    $id = $_GET["id"];
    $query = mysqli_query($koneksi, "DELETE FROM dinas WHERE ID='$id'");

    if ($query && mysqli_affected_rows($koneksi) == 1) {
      $_SESSION['sukses'] = 'Berhasil menghapus data!';
    } else {
      $_SESSION['gagal'] = 'Gagal menghapus data!, ' . mysqli_error($koneksi);
    }

    header("Location: index.php");
    die();
  } catch (Exception $e) {
    $_SESSION['gagal'] = 'Gagal menghapus data!, ' . $e->getMessage();
    header("Location: index.php");
  }
}
