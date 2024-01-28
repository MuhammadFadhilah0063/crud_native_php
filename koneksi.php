<?php

try {
  $koneksi = mysqli_connect("localhost", "u708144562_dhilah", "F4dhil01", "u708144562_db_test") or die("Gagal terhubung ke basisdata: " . mysqli_error($koneksi));
} catch (Exception $e) {
  echo "Gagal terhubung: " . $e->getMessage();
}
