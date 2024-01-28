<?php 

try {
  $koneksi = mysqli_connect("localhost","root","","perkim") or die("Gagal terhubung ke basisdata: " . mysqli_error($koneksi));
}catch(Exception $e) {
  echo "Gagal terhubung: ". $e->getMessage();
}