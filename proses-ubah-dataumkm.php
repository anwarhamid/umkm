<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data ID yang dikirim oleh modal_edit_delete_dkrt.php melalui URL
$id = $_GET['id'];
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

// Proses ubah data ke Database
$sql = $pdo->prepare("UPDATE umkm SET id_sektor='$id_sektor', nama=:nama, sektor=:sektor, lokasi=:lokasi, pendapatan=:pendapatan, pemilik=:pemilik WHERE id_umkm=:id");
$sql->bindParam(':nama', $nama);
$sql->bindParam(':sektor', $sektor);
$sql->bindParam(':lokasi', $lokasi);
$sql->bindParam(':pendapatan', $pendapatan);
$sql->bindParam(':pemilik', $pemilik);
$sql->bindParam(':id', $id);
$execute = $sql->execute(); // Eksekusi / Jalankan query
if ($execute) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: data-umkm.php"); // Redirect ke halaman index.php
} else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='data_kriteria'>Kembali Ke Form</a>";
}
