<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Sistem Kasir - Kelompok Pembayaran</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px;
            background-color: #f0f2f5;
        }

        .container {
            max-width: 450px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .hasil {
            margin-top: 25px;
            padding: 15px;
            border-radius: 8px;
            border-left: 6px solid;
        }

        .sukses {
            background-color: #d4edda;
            color: #155724;
            border-color: #28a745;
        }

        .gagal {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #dc3545;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>💳 Pembayaran Kasir</h2>
        <hr>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <label>Nama Hari Transaksi:</label>
            <input type="text" name="nama_hari" placeholder="Contoh: Senin" required>
            
            <label>Total Tagihan (Rp):</label>
            <input type="number" name="total_tagihan" placeholder="Masukkan total harga" required>

            <label>Jumlah Uang Bayar (Rp):</label>
            <input type="number" name="uang_bayar" placeholder="Masukkan jumlah uang" required>

            <button type="submit" name="SUBMIT">PROSES PEMBAYARAN</button>
        </form>

        <?php
        // Cek apakah tombol submit sudah diklik
        if (isset($_POST['SUBMIT'])) {

            // Mengambil data dari name input
            $hari = $_POST['nama_hari'];
            $total = $_POST['total_tagihan'];
            $bayar = $_POST['uang_bayar'];

            echo "<div class='hasil'>";
            echo "<h3>Ringkasan Transaksi:</h3>";
           
            // Logika IF-ELSE untuk perhitungan pembayaran
            if ($bayar >= $total) {
                $kembalian = $bayar - $total;
                echo "<div class='sukses'>";
                echo "<strong>STATUS: BERHASIL</strong><br>";
                echo "Kembalian Anda: Rp " . number_format($kembalian, 0, ',', '.');
                echo "</div>";
            } else {
                $kurang = $total - $bayar;
                echo "<div class='gagal'>";
                echo "<strong>STATUS: GAGAL</strong><br>";
                echo "Uang tidak cukup. Kurang: Rp " . number_format($kurang, 0, ',', '.');
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>