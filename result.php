<?php
ini_set('display_errors', 'Off');

function buat($angka)
{
    $rp = "Rp. " . number_format($angka);
    return $rp;
}

?>
<?php

$tabungan = $_POST['jns_tab'];
$tiring = $_POST['nilaiTiring'];
$tenor = $_POST['tenor'];
$hadiah = $_POST['hadiah'];
$bungaMax = 6;
$bungaPP = 1.5;
$tax = 0.8;

$nilaiTiring = 0;

if ($tiring == 1) {
    $nilaiTiring = 0.0425;
} elseif ($tiring == 2) {
    $nilaiTiring = 0.0475;
} elseif ($tiring == 3) {
    $nilaiTiring = 0.0525;
} elseif ($tiring == 4) {
    $nilaiTiring = 0.0575;
}

$tiringBalik = $nilaiTiring * 100;

if ($tabungan == 1) {
    $jenis = 'Tabungan Agris';
    if ($tenor == 1) {
        $lama = '1 Bulan';
        $bulan = (1.5 / 12) * 1;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (1 / 12)) - (($bungaPP / 100) * (1 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 2) {
        $lama = '3 Bulan';
        $bulan = (1.5 / 12) * 3;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (3 / 12)) - (($bungaPP / 100) * (3 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 3) {
        $lama = '6 Bulan';
        $bulan = (1.5 / 12) * 6;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (6 / 12)) - (($bungaPP / 100) * (6 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 4) {
        $lama = '1 Tahun';
        $bulan = 1.50;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / (($bungaMax / 100) - ($bungaPP / 100));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 5) {
        $lama = '2 Tahun';
        $bulan = 3.00;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (24 / 12)) - (($bungaPP / 100) * (24 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 6) {
        $lama = '3 Tahun';
        $bulan = 4.50;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (36 / 12)) - (($bungaPP / 100) * (36 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 7) {
        $lama = '4 Tahun';
        $bulan = 6.00;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (48 / 12)) - (($bungaPP / 100) * (48 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 8) {
        $lama = '5 Tahun';
        $bulan = 7.50;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (60 / 12)) - (($bungaPP / 100) * (60 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 9) {
        $lama = '6 Tahun';
        $bulan = 9.00;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (72 / 12)) - (($bungaPP / 100) * (72 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 10) {
        $lama = '7 Tahun';
        $bulan = 10.50;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (84 / 12)) - (($bungaPP / 100) * (84 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 11) {
        $lama = '8 Tahun';
        $bulan = 12.00;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (96 / 12)) - (($bungaPP / 100) * (96 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 12) {
        $lama = '9 Tahun';
        $bulan = 13.50;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (108 / 12)) - (($bungaPP / 100) * (108 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } else if ($tenor == 13) {
        $lama = '10 Tahun';
        $bulan = 15.00;
        $hadiahPlusPajak = ($hadiah * 100) / 80;
        $pajak = $hadiahPlusPajak - $hadiah;
        $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (120 / 12)) - (($bungaPP / 100) * (120 / 12)));
        $nilaiEndap = $saldoBlokir * ($bulan / 100);
        echo "<pre style='text-align: left'>";
        echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
        echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
        echo "</pre>";
    } // end of Tabungan Agris

} else if ($tabungan == 2) {
    $jenis = 'Tabungan Agris Plus';
    if ($tenor == 1) {
        if ($nilaiTiring == 0.0425 && $hadiah > 583000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Bulan 
                             <h4>Maximal Nilai Hadiah 583000</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0475 && $hadiah > 830000 || ($nilaiTiring == 0.0475 && $hadiah < 416800)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Bulan 
                             <h4>Maximal Nilai Hadiah 830000  atau Minimal Nilai Hadiah 416800 </h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 1250000) || ($nilaiTiring == 0.0525 && $hadiah < 500000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Bulan 
                             <h4>Maximal Nilai Hadiah 1250000 atau Minimal Nilai Hadiah 500000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0575 && $hadiah < 416712) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Bulan 
                             <h4>Minimal Nilai Hadiah 416712</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '1 Bulan';
            $bulan = ($tiringBalik / 12) * 1;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (1 / 12)) - (($nilaiTiring) * (1 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }

    } else if ($tenor == 2) {
        if ($nilaiTiring == 0.0425 && $hadiah > 1720000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Bulan 
                             <h4>Maximal Nilai Hadiah 1720000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 2500000) || ($nilaiTiring == 0.475 && $hadiah < 1250001)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Bulan
                             <h4>Maximal Nilai Hadiah 2500000 atau Minimal Nilai Hadiah 1250001</h4>
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 3750000) || ($nilaiTiring == 0.0525 && $hadiah < 1500001)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Bulan 
                             <h4>Maximal Nilai Hadiah 3750000 atau Minimal Nilai Hadiah 1500001</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0575 && $hadiah < 1250001) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Bulan 
                             <h4>Minimal Nilai Hadiah 1250001</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '3 Bulan';
            $bulan = ($tiringBalik / 12) * 3;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (3 / 12)) - (($nilaiTiring) * (3 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    } elseif ($tenor == 3) {
        if ($nilaiTiring == 0.0425 && $hadiah > 3480000) {
            $ps = "
                    <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                         <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Bulan 
                         <h4>Maximal Nilai Hadiah 3480000</h4>        
                    </div>
                    ";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 5000000) || ($nilaiTiring == 0.0475 && $hadiah < 2500000.8)) {
            $ps = "
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                     <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Bulan
                     <h4>Maximal Nilai Hadiah 5000000 atau Minimal Nilai Hadiah 2500000.8</h4>
                </div>
                ";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 7500000) || ($nilaiTiring == 0.0525 && $hadiah < 3000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Bulan 
                             <h4>Maximal Nilai Hadiah 7500000 atau Minimal Nilai Hadiah 3000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0575 && $hadiah < 2500000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Bulan 
                             <h4>Minimal Nilai Hadiah 2500000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '6 Bulan';
            $bulan = ($tiringBalik / 12) * 6;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (6 / 12)) - (($nilaiTiring) * (6 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }

    } elseif ($tenor == 4) {
        if ($nilaiTiring == 0.0425 && $hadiah > 6960000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Tahun 
                             <h4>Maximal Nilai Hadiah 6960000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 10000000) || ($nilaiTiring == 0.0475 && $hadiah < 5000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Tahun 
                             <h4>Maximal Nilai Hadiah 10000000 atau Minimal Nilai Hadiah 5000000.8</h4>        
                        </div>";
            echo $ps;

        } elseif (($nilaiTiring == 0.0525 && $hadiah > 15000000) || ($nilaiTiring == 0.0525 && $hadiah < 6000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Tahun 
                             <h4>Maximal Nilai Hadiah 15000000 atau Minimal Nilai Hadiah 6000000.8</h4>        
                        </div>";
            echo $ps;

        } elseif ($nilaiTiring == 0.0575 && $hadiah < 5000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Tahun 
                             <h4>Minimal Nilai Hadiah 5000000.8</h4>        
                        </div>";
            echo $ps;

        } else {
            $lama = '1 Tahun';
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / (($bungaMax / 100) - $nilaiTiring);
            $nilaiEndap = $saldoBlokir * $nilaiTiring;
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $tiringBalik . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    } elseif ($tenor == 5) {
        if ($nilaiTiring == 0.0425 && $hadiah > 14000000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 2 Tahun 
                             <h4>Maximal Nilai Hadiah 14000000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 20000000) || ($nilaiTiring == 0.0475 && $hadiah < 10000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 2 Tahun 
                             <h4>Maximal Nilai Hadiah 20000000 atau Minimal Nilai Hadiah 10000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 30000000) || ($nilaiTiring == 0.0525 && $hadiah < 12000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 2 Tahun 
                             <h4>Maximal Nilai Hadiah 30000000 atau Minimal Nilai Hadiah 12000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0575 && $hadiah < 10000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 2 Tahun 
                             <h4>Minimal Nilai Hadiah 10000000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '2 Tahun';
            $bulan = ($tiringBalik / 12) * 24;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (24 / 12)) - (($nilaiTiring) * (24 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    } elseif ($tenor == 6) {
        if ($nilaiTiring == 0.0425 && $hadiah > 20800000) {
            $ps = "
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                     <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Tahun 
                     <h4>Maximal Nilai Hadiah 20800000</h4>        
                </div>
                ";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 30000000) || ($nilaiTiring == 0.0475 && $hadiah < 15000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Tahun 
                             <h4>Maximal Nilai Hadiah 30000000 atau Minimal Nilai Hadiah 15000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 45000000) || ($nilaiTiring == 0.0525 && $hadiah < 18000000)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Tahun 
                             <h4>Maximal Nilai Hadiah 45000000 atau Minimal Nilai Hadiah 18000000</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0575 && $hadiah < 15000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Tahun 
                             <h4>Minimal Nilai Hadiah 15000000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '3 Tahun';
            $bulan = ($tiringBalik / 12) * 36;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (36 / 12)) - (($nilaiTiring) * (36 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    } elseif ($tenor == 7) {
        if ($nilaiTiring == 0.0425 && $hadiah > 28000000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 4 Tahun 
                             <h4>Maximal Nilai Hadiah 28000000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 40000000) || ($nilaiTiring == 0.0475 && $hadiah < 20000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 4 Tahun 
                             <h4>Maximal Nilai Hadiah 40000000 atau Minimal Nilai Hadiah 20000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 60000000) || ($nilaiTiring == 0.0525 && $hadiah < 24000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 4 Tahun 
                             <h4>Maximal Nilai Hadiah 60000000 atau Minimal Nilai Hadiah 24000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0575 && $hadiah < 20000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah   Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 4 Tahun 
                             <h4>Minimal Nilai Hadiah 20000000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '4 Tahun';
            $bulan = ($tiringBalik / 12) * 48;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (48 / 12)) - (($nilaiTiring) * (48 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    } elseif ($tenor == 8) {
        if ($nilaiTiring == 0.0425 && $hadiah > 34800000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 5 Tahun 
                             <h4>Maximal Nilai Hadiah 34800000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 50000000) || ($nilaiTiring == 0.0475 && $hadiah < 25000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 5 Tahun 
                             <h4>Maximal Nilai Hadiah 50000000 atau Minimal Nilai Hadiah 25000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 75000000) || ($nilaiTiring == 0.05252 && $hadiah < 30000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 5 Tahun 
                             <h4>Maximal Nilai Hadiah 75000000 atau Minimal Nilai Hadiah 30000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0575 && $hadiah < 25000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 5 Tahun 
                             <h4>Minimal Nilai Hadiah 25000000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '5 Tahun';
            $bulan = ($tiringBalik / 12) * 60;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (60 / 12)) - (($nilaiTiring) * (60 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    } elseif ($tenor == 9) {
        if ($nilaiTiring == 0.0425 && $hadiah > 42000000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Tahun 
                             <h4>Maximal Nilai Hadiah 42000000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 60000000) || ($nilaiTiring == 0.0475 && $hadiah < 30000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Tahun 
                             <h4>Maximal Nilai Hadiah 60000000 atau Minimal Nilai Hadiah 30000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 90000000) || ($nilaiTiring == 0.0525 && $hadiah < 36000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Tahun 
                             <h4>Maximal Nilai Hadiah 90000000 atau Minimal Nilai Hadiah 36000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0575 && $hadiah < 30000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Tahun 
                             <h4>Minimal Nilai Hadiah 30000000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '6 Tahun';
            $bulan = ($tiringBalik / 12) * 72;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (72 / 12)) - (($nilaiTiring) * (72 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    }elseif ($tenor == 10) {
        if ($nilaiTiring == 0.0425 && $hadiah > 48800000) {
            $ps = "
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                     <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 7 Tahun 
                     <h4>Maximal Nilai Hadiah 48800000</h4>        
                </div>
                ";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 70000000) || ($nilaiTiring == 0.0475 && $hadiah < 35000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 7 Tahun 
                             <h4>Maximal Nilai Hadiah 70000000 atau Minimal Nilai Hadiah 35000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 105000000) || ($nilaiTiring == 0.0525 && $hadiah < 42000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 7 Tahun 
                             <h4>Maximal Nilai Hadiah 105000000 atau Minimal Nilai Hadiah 42000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0525 && $hadiah < 35000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 7 Tahun 
                             <h4>Minimal Nilai Hadiah 43750001</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '7 Tahun';
            $bulan = ($tiringBalik / 12) * 84;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (84 / 12)) - (($nilaiTiring) * (84 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    }elseif ($tenor == 11) {
        if ($nilaiTiring == 0.0425 && $hadiah > 56000000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 8 Tahun 
                             <h4>Maximal Nilai Hadiah 56000000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 80000000) || ($nilaiTiring == 0.0475 && $hadiah < 40000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 8 Tahun 
                             <h4>Maximal Nilai Hadiah 80000000 atau Minimal Nilai Hadiah 40000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 120000000) || ($nilaiTiring == 0.0525 && $hadiah < 48000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 8 Tahun 
                             <h4>Maximal Nilai Hadiah 120000000 atau Minimal Nilai Hadiah 48000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0525 && $hadiah < 40000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 8 Tahun 
                             <h4>Minimal Nilai Hadiah 40000000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '8 Tahun';
            $bulan = ($tiringBalik / 12) * 96;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (96 / 12)) - (($nilaiTiring) * (96 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    } elseif ($tenor == 12) {
        if ($nilaiTiring == 0.0425 && $hadiah > 62800000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 9 Tahun 
                             <h4>Maximal Nilai Hadiah 62800000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 90000000) || ($nilaiTiring == 0.0475 && $hadiah < 45000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 9 Tahun 
                             <h4>Maximal Nilai Hadiah 90000000 atau Minimal Nilai Hadiah 45000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 135000000) || ($nilaiTiring == 0.0525 && $hadiah < 54000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 9 Tahun 
                             <h4>Maximal Nilai Hadiah 135000000 atau Minimal Nilai Hadiah 54000000.8</h4>        
                        </div>";
            echo $ps;

        } elseif ($nilaiTiring == 0.0525 && $hadiah < 45000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 9 Tahun 
                             <h4>Minimal Nilai Hadiah 45000000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '9 Tahun';
            $bulan = ($tiringBalik / 12) * 108;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (108 / 12)) - (($nilaiTiring) * (108 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    }elseif ($tenor == 13) {
        if ($nilaiTiring == 0.0425 && $hadiah > 70000000) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 10 Tahun 
                             <h4>Maximal Nilai Hadiah 70000000</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0475 && $hadiah > 100000000) || ($nilaiTiring == 0.0475 && $hadiah < 50000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 10 Tahun 
                             <h4>Maximal Nilai Hadiah 100000000 atau Minimal Nilai Hadiah 50000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif (($nilaiTiring == 0.0525 && $hadiah > 150000000) || ($nilaiTiring == 0.0525 && $hadiah < 60000000.8)) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 10 Tahun 
                             <h4>Maximal Nilai Hadiah 150000000 atau Minimal Nilai Hadiah 60000000.8</h4>        
                        </div>";
            echo $ps;
        } elseif ($nilaiTiring == 0.0525 && $hadiah < 50000000.8) {
            $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 10 Tahun 
                             <h4>Minimal Nilai Hadiah 50000000.8</h4>        
                        </div>";
            echo $ps;
        } else {
            $lama = '10 Tahun';
            $bulan = ($tiringBalik / 12) * 120;
            $hadiahPlusPajak = ($hadiah * 100) / 80;
            $pajak = $hadiahPlusPajak - $hadiah;
            $saldoBlokir = $hadiahPlusPajak / ((($bungaMax / 100) * (120 / 12)) - (($nilaiTiring) * (120 / 12)));
            $nilaiEndap = $saldoBlokir * ($bulan / 100);
            echo "<pre style='text-align: left'>";
            echo "Tabungan                       = " . "<b>" . $jenis . "</b> <br>";
            echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
            echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
            echo "Total Nilai Hadiah             = " . "<b>" . buat($hadiahPlusPajak) . "</b> <br>";
            echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
            echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
            echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
            echo "</pre>";
        }
    }

}

