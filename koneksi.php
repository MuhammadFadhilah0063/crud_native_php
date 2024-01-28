<?php

try {
  $koneksi = mysqli_connect("localhost", "dhilah", "F4dhil01", "db_test") or die("Gagal terhubung ke basisdata: " . mysqli_error($koneksi));
} catch (Exception $e) {
  echo "Gagal terhubung: " . $e->getMessage();
}
