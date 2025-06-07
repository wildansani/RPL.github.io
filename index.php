<?php
$conn = new mysqli("localhost", "root", "", "datamart");
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
$barang = $conn->query("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html>
<head>
  <title>DataMart - Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1 class="mb-4 text-center text-primary">🛒 DataMart - Manajemen Penjualan</h1>

    <div class="card mb-4 shadow">
      <div class="card-header bg-success text-white">
        Daftar Barang
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Barang</th>
              <th>Stok</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $barang->fetch_assoc()): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['stok'] ?></td>
                <td>Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        Tambah Penjualan
      </div>
      <div class="card-body">
        <form method="POST" action="tambah_penjualan.php">
          <div class="mb-3">
            <label class="form-label">ID Barang</label>
            <input type="number" name="barang_id" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success">Tambah Penjualan</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
