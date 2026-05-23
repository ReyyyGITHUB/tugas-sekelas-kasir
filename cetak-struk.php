<?php

$namaBarang = "Mouse";
$harga = 150000;
$diskon = 32000;
$pajak = 5000;
$total = 140000;
$uangBayar = 150000;
$kembalian = 10000;

function cetakStruk($namaBarang, $harga, $total, $diskon, $pajak, $uangBayar, $kembalian)
{
    echo "<h3>--- STRUK KASIR ---</h3>";
    echo "Barang     : " . $namaBarang . "<br>";
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

cetakStruk($namaBarang, $harga, $total, $diskon, $pajak, $uangBayar, $kembalian);

?>