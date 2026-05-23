<?php

function inputKasir($namaProduk, $harga, $jumlahProduk) {

    // Validasi dasar
    if (empty($namaProduk)) {
        return ["error" => "Nama produk tidak boleh kosong"];
    }

    if ($harga <= 0) {
        return ["error" => "Harga harus lebih dari 0"];
    }

    if ($jumlahProduk <= 0) {
        return ["error" => "Jumlah harus lebih dari 0"];
    }

    // Return data (penting untuk integrasi)
    return [
        "nama_produk" => $namaProduk,
        "harga" => $harga,
        "jumlah" => $jumlahProduk,
    ];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir Kafe - Input Manual</title>
</head>
<body>

<h2>Input Data Barang</h2>

<form method="POST" action="">
    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang" required>
    <br><br>

    <label>Harga Barang:</label><br>
    <input type="number" name="harga" min="0" required>
    <br><br>

    <label>Jumlah Barang:</label><br>
    <input type="number" name="jumlah" min="1" required>
    <br><br>

    <button type="submit" name="submit">Hitung</button>
</form>

<hr>

<?php
// Mengecek apakah form sudah di-submit
if (isset($_POST['submit'])) {
    
    // Mengambil data dari form
    $namaBarangInput = $_POST['nama_barang'];
    $hargaInput = $_POST['harga'];
    $jumlahInput = $_POST['jumlah'];

    // Memasukkan data ke dalam fungsi
    $hasil = inputKasir($namaBarangInput, $hargaInput, $jumlahInput);

    // Mengecek apakah ada error dari fungsi
    if (isset($hasil["error"])) {
        echo "<h3 style='color: red;'>" . $hasil["error"] . "</h3>";
    } else {
        // Menghitung total harga jika tidak ada error
        $totalHarga = $hasil["harga"] * $hasil["jumlah"];

        // Menampilkan struk/hasil perhitungan
        echo "<h3>Struk Pembelian:</h3>";
        echo "<ul>";
        echo "<li>Nama Barang: <strong>" . htmlspecialchars($hasil["nama_produk"]) . "</strong></li>";
        echo "<li>Harga Satuan: Rp " . number_format($hasil["harga"], 0, ',', '.') . "</li>";
        echo "<li>Jumlah Beli: " . $hasil["jumlah"] . "</li>";
        echo "<li><strong>Total Harga: Rp " . number_format($totalHarga, 0, ',', '.') . "</strong></li>";
        echo "</ul>";
    }
}
?>

</body>
</html>