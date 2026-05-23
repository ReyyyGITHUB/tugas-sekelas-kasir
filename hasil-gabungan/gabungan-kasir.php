<?php
function inputKasir($namaProduk, $harga, $jumlahProduk) {
    if (empty($namaProduk)) {
        return ["error" => "Nama produk tidak boleh kosong"];
    }

    if ($harga <= 0) {
        return ["error" => "Harga harus lebih dari 0"];
    }

    if ($jumlahProduk <= 0) {
        return ["error" => "Jumlah harus lebih dari 0"];
    }
    return [
        "nama_produk" => $namaProduk,
        "harga" => $harga,
        "jumlah" => $jumlahProduk,
    ];
}
function hitungDiskon($totalHarga, $persenDiskon = 15){

    if($totalHarga > 250000){

        $totalDiskon =
            $totalHarga * ($persenDiskon / 100);

    } else {

        $totalDiskon = 0;
    }

    return $totalDiskon;
}
function hitungPajak($totalHarga, $persenPajak) {

    $pajak = ($persenPajak / 100) * $totalHarga;

    $totalPajak = $totalHarga + $pajak;

    return [
        "pajak" => $pajak,
        "totalPajak" => $totalPajak
    ];
}
function cetakStruk($namaProduk, $harga, $total, $diskon, $pajak, $uangBayar, $kembalian)
{
    echo "<h3>--- STRUK KASIR ---</h3>";
    echo "Barang     : " . $namaProduk . "<br>";
    echo "Harga      : Rp " . $harga . "<br>";
    echo "Diskon     : Rp " . $diskon . "<br>";
    echo "Pajak      : Rp " . $pajak . "<br>";
    echo "--------------------------<br>";
    echo "<b>Total Bayar: Rp " . $total . "</b><br>";
    echo "Uang Tunai : Rp " . $uangBayar . "<br>";
    echo "Kembalian  : Rp " . $kembalian . "<br>";
    echo "<h4>Terima Kasih!</h4>";
    echo "</div>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Kasir Coffeshop</title>
</head>
<body>

<h2>Sistem Kasir Coffeshop</h2>

<form method="POST">
    Nama Barang:<br>
    <input type="text" name="nama_barang" required><br><br>

    Harga Barang:<br>
    <input type="number" name="harga" required><br><br>

    Jumlah Barang:<br>
    <input type="number" name="jumlah" required><br><br>

    Keterangan Diskon:<br>
    Diskon otomatis 15% jika total harga lebih dari Rp250.000.<br>
    Tidak perlu diisi manual.<br><br>

    PPN (%):<br>
    <input type="number" name="ppn" value="0"><br><br>

    Pajak Penjualan (%):<br>
    <input type="number" name="penjualan" value="0"><br><br>

    Biaya Layanan (%):<br>
    <input type="number" name="layanan" value="0"><br><br>

    Biaya Pengiriman (%):<br>
    <input type="number" name="pengiriman" value="0"><br><br>

    Uang Bayar:<br>
    <input type="number" name="uang_bayar" required><br><br>

    <button type="submit" name="proses">Proses</button>
</form>

<br><hr><br>

<?php

if (isset($_POST['proses'])) {

    $namaProduk = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $ppn = $_POST['ppn'];
    $penjualan = $_POST['penjualan'];
    $layanan = $_POST['layanan'];
    $pengiriman = $_POST['pengiriman'];
    $uangBayar = $_POST['uang_bayar'];

    $dataBarang = inputKasir($namaProduk, $harga, $jumlah);

    if (isset($dataBarang["error"])) {
        echo $dataBarang["error"];
    } else {
        $totalHarga = $dataBarang["harga"] * $dataBarang["jumlah"];

        $diskon = hitungDiskon($totalHarga);
        $totalSetelahDiskon = $totalHarga - $diskon;

        $persenPajak = $ppn + $penjualan + $layanan + $pengiriman;
        $hasilPajak = hitungPajak($totalSetelahDiskon, $persenPajak);

        $pajak = $hasilPajak["pajak"];
        $total = $hasilPajak["totalPajak"];
        if ($uangBayar >= $total) {
            $kembalian = $uangBayar - $total;

            cetakStruk(
                $dataBarang["nama_produk"],
                number_format($dataBarang["harga"], 0, ',', '.'),
                number_format($total, 0, ',', '.'),
                number_format($diskon, 0, ',', '.'),
                number_format($pajak, 0, ',', '.'),
                number_format($uangBayar, 0, ',', '.'),
                number_format($kembalian, 0, ',', '.')
            );
        } else {
            $kurang = $total - $uangBayar;

            echo "<h3>Pembayaran Gagal</h3>";
            echo "Total Bayar: Rp " . number_format($total, 0, ',', '.') . "<br>";
            echo "Uang Tunai: Rp " . number_format($uangBayar, 0, ',', '.') . "<br>";
            echo "Uang Kurang: Rp " . number_format($kurang, 0, ',', '.') . "<br>";
        }
    }
}

?>

</body>
</html>