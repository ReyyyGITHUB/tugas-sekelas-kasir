<?php

function hitungDiskon($totalHarga, $persenDiskon = 15){

    if($totalHarga > 250000){
        $totalDiskon = $totalHarga * ($persenDiskon / 100);
    } else{
        $totalDiskon = 0;
    }
    return $totalDiskon;
}
    
?>