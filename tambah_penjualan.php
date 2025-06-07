<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "datamart");
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$barang_id = $_POST['barang_id'];
$jumlah = $_POST['jumlah'];

// Tambah ke tabel penjualan
$stmt = $conn->prepare("INSERT INTO penjualan (barang_id, jumlah) VALUES (?, ?)");
$stmt->bind_param("ii", $barang_id, $jumlah);

if ($stmt->execute()) {
  echo "✅ Penjualan berhasil ditambahkan.<br>";
  echo "<a href='index.php'>Kembali ke daftar barang</a>";
} else {
  echo "❌ Gagal: " . $stmt->error;
}
?>
