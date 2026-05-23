<?php


function hitungPajak($totalHarga, $persenPajak) {

    $pajak = ($persenPajak / 100) * $totalHarga;

    $totalPajak = $totalHarga + $pajak;

    return [
        "pajak" => $pajak,
        "totalPajak" => $totalPajak
    ];
}


$totalHarga = "";
$persenPajak = 0;
$pajak = "";
$totalPajak = "";
$hasil = null;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $totalHarga = $_POST["total_harga"] ?? 0;

    $ppn = $_POST["ppn"] ?? 0;
    $penjualan = $_POST["penjualan"] ?? 0;
    $layanan = $_POST["layanan"] ?? 0;
    $pengiriman = $_POST["pengiriman"] ?? 0;

    
    $persenPajak =
        $ppn +
        $penjualan +
        $layanan +
        $pengiriman;

    
    $hasil = hitungPajak($totalHarga, $persenPajak);

    
    $pajak = $hasil["pajak"];
    $totalPajak = $hasil["totalPajak"];
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Form Pajak Interaktif</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            padding: 40px;
        }

        .container {
            background-color: white;
            width: 450px;
            margin: auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4285F4;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #3367d6;
        }

        .hasil {
            background-color: #eef3ff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .pajak-box {
            background-color: #f8f8f8;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

    </style>

</head>
<body>

<div class="container">

    <h2>Form Pajak</h2>

    <form method="POST">

        
        <label>Total Harga</label>

        <input type="number"
               name="total_harga"
               placeholder="Masukkan total harga"
               required
               value="<?php echo $totalHarga; ?>">

        
        <div class="pajak-box">

            <label>PPN (%)</label>

            <input type="number"
                   name="ppn"
                   value="<?php echo $_POST['ppn'] ?? 11; ?>"
                   oninput="hitungTotalPajak()">

        </div>

        
        <div class="pajak-box">

            <label>Pajak Penjualan (%)</label>

            <input type="number"
                   name="penjualan"
                   value="<?php echo $_POST['penjualan'] ?? 10; ?>"
                   oninput="hitungTotalPajak()">

        </div>

        
        <div class="pajak-box">

            <label>Pajak Layanan (%)</label>

            <input type="number"
                   name="layanan"
                   value="<?php echo $_POST['layanan'] ?? 2; ?>"
                   oninput="hitungTotalPajak()">

        </div>

        
        <div class="pajak-box">

            <label>Biaya Pengiriman (%)</label>

            <input type="number"
                   name="pengiriman"
                   value="<?php echo $_POST['pengiriman'] ?? 5; ?>"
                   oninput="hitungTotalPajak()">

        </div>

        
        <label>Total Persen Pajak (%)</label>

        <input type="number"
               name="persen_pajak"
               id="persen_pajak"
               readonly
               value="<?php echo $persenPajak; ?>">

        
        <button type="submit">
            Hitung Pajak
        </button>

    </form>

    
    <?php if ($hasil != null) { ?>

        <div class="hasil">

            <h3>Hasil Perhitungan</h3>

            <p>
                <b>Total Harga:</b>
                Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?>
            </p>

            <p>
                <b>Total Persen Pajak:</b>
                <?php echo $persenPajak; ?>%
            </p>

            <p>
                <b>Nilai Pajak:</b>
                Rp <?php echo number_format($pajak, 0, ',', '.'); ?>
            </p>

            <p>
                <b>Total Setelah Pajak:</b>
                Rp <?php echo number_format($totalPajak, 0, ',', '.'); ?>
            </p>

        </div>

    <?php } ?>

</div>

</body>
</html>