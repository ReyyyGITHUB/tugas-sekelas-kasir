<?php

// FUNCTION DISKON
function hitungDiskon($totalHarga, $persenDiskon = 15){

    if($totalHarga > 250000){

        $totalDiskon =
            $totalHarga * ($persenDiskon / 100);

    } else {

        $totalDiskon = 0;
    }

    return $totalDiskon;
}

// VARIABLE
$totalHarga = 0;
$totalDiskon = 0;
$totalBayar = 0;

// PROSES PHP
if(isset($_POST['hitung'])){

    $totalHarga = $_POST['totalHarga'];

    $totalDiskon =
        hitungDiskon($totalHarga);

    $totalBayar =
        $totalHarga - $totalDiskon;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Diskon Caffe</title>

    <style>

        body{
            font-family: Arial;
            background: #f5e6d3;
            margin: 0;
            padding: 0;
        }

        .container{

            width: 450px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2{
            text-align: center;
            color: #6f4e37;
        }

        label{
            font-weight: bold;
            margin-top: 15px;
            display: block;
        }

        input{

            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button{

            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            background: #6f4e37;
            color: white;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover{
            background: #5a3d2b;
        }

        .hasil{

            margin-top: 20px;
            background: #f1f1f1;
            padding: 15px;
            border-radius: 10px;
        }

    </style>

</head>
<body>

<div class="container">

    <h2>Sistem Diskon Caffe</h2>

    <form method="POST">

        <!-- INPUT -->
        <label>Total Harga</label>

        <input
            type="number"
            name="totalHarga"
            id="totalHarga"
            placeholder="Masukkan total harga"
            oninput="hitungRealtime()"
            required
        >

        <!-- PERSEN DISKON -->
        <label>Persen Diskon</label>

        <input
            type="text"
            id="persenDiskon"
            value="15%"
            readonly
        >

        <!-- TOTAL DISKON -->
        <label>Total Diskon</label>

        <input
            type="text"
            id="totalDiskon"
            readonly
        >

        <!-- TOTAL BAYAR -->
        <label>Total Bayar</label>

        <input
            type="text"
            id="totalBayar"
            readonly
        >

        <button type="submit" name="hitung">
            Hitung Diskon
        </button>

    </form>

    <!-- OUTPUT PHP -->
    <?php if(isset($_POST['hitung'])){ ?>

        <div class="hasil">

            <h3>Hasil Perhitungan</h3>

            <p>
                Total Harga :
                Rp <?= number_format($totalHarga,0,',','.') ?>
            </p>

            <p>
                Total Diskon :
                Rp <?= number_format($totalDiskon,0,',','.') ?>
            </p>

            <p>
                Total Bayar :
                Rp <?= number_format($totalBayar,0,',','.') ?>
            </p>

        </div>

    <?php } ?>

</div>

<script>

// REALTIME VALUE
function hitungRealtime(){

    let totalHarga =
        parseInt(document.getElementById("totalHarga").value) || 0;

    let totalDiskon = 0;

    // KONDISI DISKON
    if(totalHarga > 250000){

        totalDiskon =
            totalHarga * 0.15;
    }

    // TOTAL BAYAR
    let totalBayar =
        totalHarga - totalDiskon;

    // OUTPUT REALTIME
    document.getElementById("totalDiskon").value =
        "Rp " + totalDiskon.toLocaleString('id-ID');

    document.getElementById("totalBayar").value =
        "Rp " + totalBayar.toLocaleString('id-ID');
}

</script>

</body>
</html>