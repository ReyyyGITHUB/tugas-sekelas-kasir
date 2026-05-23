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

</body>
</html>