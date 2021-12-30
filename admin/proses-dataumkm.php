<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$id = $_POST['id'];
$nama = $_POST['nama'];
$sektor = $_POST['sektor'];
$lokasi = $_POST['lokasi'];
$pendapatan = $_POST['pendapatan'];
$pemilik = $_POST['pemilik'];

$getID = $pdo->prepare("SELECT* FROM sektor WHERE nama='$sektor'");
$getID->execute();

$data = $getID->fetch();
$id_sektor = $data['id_sektor'];
// Proses simpan ke Database

$sql = $pdo->prepare("INSERT INTO umkm(id_umkm, id_sektor, nama, sektor, lokasi, pendapatan, pemilik) 
        VALUES(:id_umkm,:id_sektor,:nama,:sektor,:lokasi,:pendapatan,:pemilik)");
$sql->bindParam(':id_umkm', $id);
$sql->bindParam(':id_sektor', $id_sektor);
$sql->bindParam(':nama', $nama);
$sql->bindParam(':sektor', $sektor);
$sql->bindParam(':lokasi', $lokasi);
$sql->bindParam(':pendapatan', $pendapatan);
$sql->bindParam(':pemilik', $pemilik);
$sql->execute(); // Eksekusi query insert
if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: data-umkm.php");
} else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
