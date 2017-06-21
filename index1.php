<?php
ini_set('display_errors', 'Off');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gadget Program</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" language="JavaScript">
        window.onload = function () {
            document.getElementById("tiring").style.display = 'none';

        }
        function validAngka(a) {
            if (!/^[0-9.]+$/.test(a.value)) {
                a.value = a.value.substring(0, a.value.length - 1000);
            }
        }

        /*function show() {
         var tab = document.getElementById("jns_tab").value;
         if (tab == "1") {
         document.getElementById("tiring").style.display = 'none';
         } else {
         document.getElementById("tiring").style.display = '';
         }
         }*/

        function show() {
            var tab = document.getElementById("jns_tab").value;
            if (tab == "1") {
                document.getElementById("tiring").style.display = 'none';
            } else {
                document.getElementById("tiring").style.display = '';
            }

            if (tab == "2") {
                document.getElementById("tiringsebulan").style.display = 'none';
            } else {
                document.getElementById("tiringsebulan").style.display = '';
            }
        }


    </script>
    <link rel="shortcut icon" href="favicon.ico">
</head>
<body>
<?php
function buat($angka)
{
    $rp = "Rp. " . number_format($angka, 2, ',', '.');
    return $rp;
}

?>

<div class="container" >
    <div class="col-md-8">
        <h2 class="section-title"><span>BPD Program</span></h2>
        <form action="" method="post" name="bpd">
            <b>Jenis Tabungan : </b>
            <select name="jns_tab" id="jns_tab" class="form-control" onchange="show()">
                <option value="1">Tabungan Agris</option>
                <option value="2">Tabungan Agris Plus</option>
            </select>
            <div id="tiring" name="tiring">
                <b>Nilai Tiring : </b>
                <select name="nilaiTiring" id="nilaiTiring" class="form-control">
                    <option value="1">4.25%</option>
                    <option value="2">4.75%</option>
                    <option value="3">5.25%</option>
                    <option value="4">5.75%</option>
                </select>
            </div>
            <!--<div id="tiringsebulan">
                <b>Nilai Tiring Sebulan : </b>
                <select name="nilaiTiringSebulan" id="nilaiTiringSebulan" class="form-control">
                    <option value="1">1.50%</option>
                </select>
            </div>-->
            <b>Masa Tenor : </b>
            <select name="tenor" id="tenor" class="form-control">
                <option value="13">01 Bulan</option>
                <option value="1">03 Bulan</option>
                <option value="2">06 Bulan</option>
                <option value="3">01 Tahun</option>
                <option value="4">02 Tahun</option>
                <option value="5">03 Tahun</option>
                <option value="6">04 Tahun</option>
                <option value="7">05 Tahun</option>
                <option value="8">06 Tahun</option>
                <option value="9">07 Tahun</option>
                <option value="10">08 Tahun</option>
                <option value="11">09 Tahun</option>
                <option value="12">10 Tahun</option>
            </select>
            <b>Nilai Hadiah : </b>
            <input name="hadiah" id="hadiah" class="form-control" placeholder="Nilai Hadiah Sudah Termasuk Pajak"
                   value="<?php echo $hadiah; ?>" onkeyup="validAngka(this)" required/>
            <input type="submit" name="submit" class="btn btn-primary" value="Kalkulasi">
        </form>
        <hr>

        <?php
        if (isset($_POST['submit'])) {
            $hadiah = $_POST['hadiah'];
            $jns_tab = $_POST['jns_tab'];
            $tenor = $_POST['tenor'];
            $bungaMax = 6;
            $bungaPP = 1.5;
            $tax = 0.8;

            $tiring = $_POST['nilaiTiring'];
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

            // mencari jenis tabungan
            if ($jns_tab == 1) {
                $tabungan = 'Tabungan Agris';
                if ($tenor == 1) {
                    $lama = '3 Bulan';
                    $bulan = (1.5 / 12) * 3;
                    $pajak = ($hadiah/$tax)-$hadiah;
                    $hadiahKenaPajak = $hadiah/$tax;
                    /*$saldoBlokir = $hadiah / ((($bungaMax / 100) * (3 / 12)) - (($bungaPP / 100) * (3 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);*/
                    $saldoBlokir = $hadiahKenaPajak / ((($bungaMax / 100) * (3 / 12)) - (($bungaPP / 100) * (3 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiahKenaPajak) . "</b> <br>";
                    echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";

                } elseif ($tenor == 2) {
                    $lama = '6 Bulan';
                    $bulan = 0.75;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (6 / 12)) - (($bungaPP / 100) * (6 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);
                    $totalhadiah = $hadiah + $nilaiEndap;

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 3) {
                    $lama = '1 Tahun';
                    $bulan = 1.50;
                    $saldoBlokir = $hadiah / (($bungaMax / 100) - ($bungaPP / 100));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 4) {
                    $lama = '2 Tahun';
                    $bulan = 3.00;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (24 / 12)) - (($bungaPP / 100) * (24 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 5) {
                    $lama = '3 Tahun';
                    $bulan = 4.50;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (36 / 12)) - (($bungaPP / 100) * (36 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 6) {
                    $lama = '4 Tahun';
                    $bulan = 6.00;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (48 / 12)) - (($bungaPP / 100) * (48 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 7) {
                    $lama = '5 Tahun';
                    $bulan = 7.50;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (60 / 12)) - (($bungaPP / 100) * (60 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 8) {
                    $lama = '6 Tahun';
                    $bulan = 9.00;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (72 / 12)) - (($bungaPP / 100) * (72 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 9) {
                    $lama = '7 Tahun';
                    $bulan = 10.50;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (84 / 12)) - (($bungaPP / 100) * (84 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 10) {
                    $lama = '8 Tahun';
                    $bulan = 12.00;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (96 / 12)) - (($bungaPP / 100) * (96 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 11) {
                    $lama = '9 Tahun';
                    $bulan = 13.50;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (108 / 12)) - (($bungaPP / 100) * (108 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 12) {
                    $lama = '10 Tahun';
                    $bulan = 15.00;
                    $a = $bungaMax / 100;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (120 / 12)) - (($bungaPP / 100) * (120 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";
                } elseif ($tenor == 13) {
                    $lama = '01 Bulan';
                    $bulan = (1.5 / 12) * 1;
                    $saldoBlokir = $hadiah / ((($bungaMax / 100) * (1 / 12)) - (($bungaPP / 100) * (1 / 12)));
                    $nilaiEndap = $saldoBlokir * ($bulan / 100);

                    echo "<pre>";
                    echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                    echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                    echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                    echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                    echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                    echo "</pre>";

                }

            } elseif ($jns_tab == 2) {
                $tabungan = 'Tabungan Agris Plus';
                if ($tenor == 1) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 2150000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Bulan 
                             <h4>Maximal Nilai Hadiah 2150000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 3125000) || ($nilaiTiring == 0.475 && $hadiah < 1562501)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Bulan
                             <h4>Maximal Nilai Hadiah 3125000 atau Minimal Nilai Hadiah 1562501</h4>
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 4687500) || ($nilaiTiring == 0.0525 && $hadiah < 1875001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Bulan 
                             <h4>Maximal Nilai Hadiah 4687500 atau Minimal Nilai Hadiah 1875001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 1562501) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Bulan 
                             <h4>Minimal Nilai Hadiah 1562501</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '3 Bulan';
                        $bulan = ($tiringBalik / 12) * 3;

                        $pajak = ($hadiah/$tax)-$hadiah;
                        $hadiahKenaPajak = $hadiah/$tax;

                        /*$saldoBlokir = $hadiah / ((($bungaMax / 100) * (3 / 12)) - (($nilaiTiring) * (3 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);*/
                        $saldoBlokir = $hadiahKenaPajak / ((($bungaMax / 100) * (3 / 12)) - (($nilaiTiring) * (3 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiahKenaPajak) . "</b> <br>";
                        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 13) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 728750) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Bulan 
                             <h4>Maximal Nilai Hadiah 728750</h4>        
                        </div>";
                        echo $ps;

                    } elseif ($nilaiTiring == 0.0475 && $hadiah > 1037500 || ($nilaiTiring == 0.0475 && $hadiah < 521000)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Bulan 
                             <h4>Maximal Nilai Hadiah 1037500  atau Minimal Nilai Hadiah 521000 </h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 1562500) || ($nilaiTiring == 0.0525 && $hadiah < 625001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Bulan 
                             <h4>Maximal Nilai Hadiah 1562500 atau Minimal Nilai Hadiah 625001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 520890) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Bulan 
                             <h4>Minimal Nilai Hadiah 520890</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '01 Bulan';
                        $bulan = ($tiringBalik / 12) * 1;

                        $pajak = ($hadiah/$tax)-$hadiah;
                        $hadiahKenaPajak = $hadiah/$tax;

                       /* $saldoBlokir = $hadiah / ((($bungaMax / 100) * (1 / 12)) - (($nilaiTiring) * (1 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);*/
                        $saldoBlokir = $hadiahKenaPajak / ((($bungaMax / 100) * (1 / 12)) - (($nilaiTiring) * (1 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiahKenaPajak) . "</b> <br>";
                        echo "Pajak                          = " . "<b>" . buat($pajak) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }

                } elseif ($tenor == 2) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 4350000) {
                        $ps = "
                    <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                         <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Bulan 
                         <h4>Maximal Nilai Hadiah 4350000</h4>        
                    </div>
                    ";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 6250000) || ($nilaiTiring == 0.0475 && $hadiah < 3125001)) {
                        $ps = "
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                     <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Bulan
                     <h4>Maximal Nilai Hadiah 6250000 atau Minimal Nilai Hadiah 3125001</h4>
                </div>
                ";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 9375000) || ($nilaiTiring == 0.0525 && $hadiah < 3750001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Bulan 
                             <h4>Maximal Nilai Hadiah 9375000 atau Minimal Nilai Hadiah 3750001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 3125001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Bulan 
                             <h4>Minimal Nilai Hadiah 3125001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '6 Bulan';
                        $tiringBalik = $nilaiTiring * 100;
                        $bulan = ($tiringBalik / 12) * 6;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (6 / 12)) - (($nilaiTiring) * (6 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }

                } elseif ($tenor == 3) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 8700000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Tahun 
                             <h4>Maximal Nilai Hadiah 8700000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 12500000) || ($nilaiTiring == 0.0475 && $hadiah < 6250001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Tahun 
                             <h4>Maximal Nilai Hadiah 12500000 atau Minimal Nilai Hadiah 6250001</h4>        
                        </div>";
                        echo $ps;

                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 18750000) || ($nilaiTiring == 0.0525 && $hadiah < 7500001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Tahun 
                             <h4>Maximal Nilai Hadiah 18750000 atau Minimal Nilai Hadiah 7500001</h4>        
                        </div>";
                        echo $ps;

                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 6250001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 1 Tahun 
                             <h4>Minimal Nilai Hadiah 6250001</h4>        
                        </div>";
                        echo $ps;

                    } else {
                        $lama = '1 Tahun';
                        $saldoBlokir = $hadiah / (($bungaMax / 100) - $nilaiTiring);
                        $nilaiEndap = $saldoBlokir * $nilaiTiring;

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $tiringBalik . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }

                } elseif ($tenor == 4) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 17500000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 2 Tahun 
                             <h4>Maximal Nilai Hadiah 17500000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 25000000) || ($nilaiTiring == 0.0475 && $hadiah < 12500001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 2 Tahun 
                             <h4>Maximal Nilai Hadiah 25000000 atau Minimal Nilai Hadiah 12500001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 37500000) || ($nilaiTiring == 0.0525 && $hadiah < 15000001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 2 Tahun 
                             <h4>Maximal Nilai Hadiah 37500000 atau Minimal Nilai Hadiah 15000001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 12500001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 2 Tahun 
                             <h4>Minimal Nilai Hadiah 12500001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '2 Tahun';
                        $bulan = ($tiringBalik / 12) * 24;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (24 / 12)) - (($nilaiTiring) * (24 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 5) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 26000000) {
                        $ps = "
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                     <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Tahun 
                     <h4>Maximal Nilai Hadiah 26000000</h4>        
                </div>
                ";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 37500000) || ($nilaiTiring == 0.0475 && $hadiah < 18750001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Tahun 
                             <h4>Maximal Nilai Hadiah 37500000 atau Minimal Nilai Hadiah 18750001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 56250000) || ($nilaiTiring == 0.0525 && $hadiah < 22500000)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Tahun 
                             <h4>Maximal Nilai Hadiah 56250000 atau Minimal Nilai Hadiah 22500000</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 18750001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 3 Tahun 
                             <h4>Minimal Nilai Hadiah 18750001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '3 Tahun';
                        $bulan = ($tiringBalik / 12) * 36;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (36 / 12)) - (($nilaiTiring) * (36 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 6) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 35000000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 4 Tahun 
                             <h4>Maximal Nilai Hadiah 35000000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 50000000) || ($nilaiTiring == 0.0475 && $hadiah < 25000001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 4 Tahun 
                             <h4>Maximal Nilai Hadiah 50000000 atau Minimal Nilai Hadiah 25000001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 75000000) || ($nilaiTiring == 0.0525 && $hadiah < 30000001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 4 Tahun 
                             <h4>Maximal Nilai Hadiah 75000000 atau Minimal Nilai Hadiah 30000001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 25000001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah   Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 4 Tahun 
                             <h4>Minimal Nilai Hadiah 25000001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '4 Tahun';
                        $bulan = ($tiringBalik / 12) * 48;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (48 / 12)) - (($nilaiTiring) * (48 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 7) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 43500000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 5 Tahun 
                             <h4>Maximal Nilai Hadiah 43500000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 62500000) || ($nilaiTiring == 0.0475 && $hadiah < 31250001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 5 Tahun 
                             <h4>Maximal Nilai Hadiah 62500000 atau Minimal Nilai Hadiah 31250001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 93750000) || ($nilaiTiring == 0.05252 && $hadiah < 37500001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 5 Tahun 
                             <h4>Maximal Nilai Hadiah 93750000 atau Minimal Nilai Hadiah 37500001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 31250001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 5 Tahun 
                             <h4>Minimal Nilai Hadiah 31250001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '5 Tahun';
                        $bulan = ($tiringBalik / 12) * 60;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (60 / 12)) - (($nilaiTiring) * (60 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 8) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 52500000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Tahun 
                             <h4>Maximal Nilai Hadiah 52500000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 75000000) || ($nilaiTiring == 0.0475 && $hadiah < 37500001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Tahun 
                             <h4>Maximal Nilai Hadiah 75000000 atau Minimal Nilai Hadiah 37500001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 112500000) || ($nilaiTiring == 0.0525 && $hadiah < 45000001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Tahun 
                             <h4>Maximal Nilai Hadiah 112500000 atau Minimal Nilai Hadiah 45000001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0575 && $hadiah < 37500001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 6 Tahun 
                             <h4>Minimal Nilai Hadiah 37500001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '6 Tahun';
                        $bulan = ($tiringBalik / 12) * 72;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (72 / 12)) - (($nilaiTiring) * (72 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 9) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 61000000) {
                        $ps = "
                <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                     <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 7 Tahun 
                     <h4>Maximal Nilai Hadiah 61000000</h4>        
                </div>
                ";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 87500000) || ($nilaiTiring == 0.0475 && $hadiah < 43750001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 7 Tahun 
                             <h4>Maximal Nilai Hadiah 87500000 atau Minimal Nilai Hadiah 43750001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 131250000) || ($nilaiTiring == 0.0525 && $hadiah < 52500001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 7 Tahun 
                             <h4>Maximal Nilai Hadiah 131250000 atau Minimal Nilai Hadiah 52500001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0525 && $hadiah < 43750001) {
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
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (84 / 12)) - (($nilaiTiring) * (84 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 10) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 70000000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 8 Tahun 
                             <h4>Maximal Nilai Hadiah 70000000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 100000000) || ($nilaiTiring == 0.0475 && $hadiah < 50000001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 8 Tahun 
                             <h4>Maximal Nilai Hadiah 100000000 atau Minimal Nilai Hadiah 50000001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 150000000) || ($nilaiTiring == 0.0525 && $hadiah < 60000001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 8 Tahun 
                             <h4>Maximal Nilai Hadiah 150000000 atau Minimal Nilai Hadiah 60000001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0525 && $hadiah < 50000001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 8 Tahun 
                             <h4>Minimal Nilai Hadiah 50000001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '8 Tahun';
                        $bulan = ($tiringBalik / 12) * 96;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (96 / 12)) - (($nilaiTiring) * (96 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 11) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 78500000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 9 Tahun 
                             <h4>Maximal Nilai Hadiah 78500000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 112500000) || ($nilaiTiring == 0.0475 && $hadiah < 56250001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 9 Tahun 
                             <h4>Maximal Nilai Hadiah 112500000 atau Minimal Nilai Hadiah 56250001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 168750000) || ($nilaiTiring == 0.0525 && $hadiah < 67500001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 9 Tahun 
                             <h4>Maximal Nilai Hadiah 168750000 atau Minimal Nilai Hadiah 67500001</h4>        
                        </div>";
                        echo $ps;

                    } elseif ($nilaiTiring == 0.0525 && $hadiah < 56250001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 9 Tahun 
                             <h4>Minimal Nilai Hadiah 56250001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '9 Tahun';
                        $bulan = ($tiringBalik / 12) * 108;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (108 / 12)) - (($nilaiTiring) * (108 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                } elseif ($tenor == 12) {
                    if ($nilaiTiring == 0.0425 && $hadiah > 87500000) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar Dengan Tiring  $tiringBalik % dan Dengan Tenor 10 Tahun 
                             <h4>Maximal Nilai Hadiah 87500000</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0475 && $hadiah > 125000000) || ($nilaiTiring == 0.0475 && $hadiah < 62500001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 10 Tahun 
                             <h4>Maximal Nilai Hadiah 125000000 atau Minimal Nilai Hadiah 62500001</h4>        
                        </div>";
                        echo $ps;
                    } elseif (($nilaiTiring == 0.0525 && $hadiah > 187500000) || ($nilaiTiring == 0.0525 && $hadiah < 75000001)) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Besar atau Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 10 Tahun 
                             <h4>Maximal Nilai Hadiah 187500000 atau Minimal Nilai Hadiah 75000001</h4>        
                        </div>";
                        echo $ps;
                    } elseif ($nilaiTiring == 0.0525 && $hadiah < 62500001) {
                        $ps = "
                        <div class='alert alert-warning alert-dismissable' style='margin-top:20px'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                             <h4><i class='icon glyphicon glyphicon-remove'></i> Wrong !</h4> Nilai Hadiah $hadiah  Terlalu Kecil Dengan Tiring  $tiringBalik % dan Dengan Tenor 10 Tahun 
                             <h4>Minimal Nilai Hadiah 62500001</h4>        
                        </div>";
                        echo $ps;
                    } else {
                        $lama = '10 Tahun';
                        $bulan = ($tiringBalik / 12) * 120;
                        $saldoBlokir = $hadiah / ((($bungaMax / 100) * (120 / 12)) - (($nilaiTiring) * (120 / 12)));
                        $nilaiEndap = $saldoBlokir * ($bulan / 100);

                        echo "<pre>";
                        echo "Tabungan                       = " . "<b>" . $tabungan . "</b> <br>";
                        echo "Tenor                          = " . "<b>" . $lama . "</b> <br>";
                        echo "Tiring Selama Pengendapan      = " . "<b>" . $bulan . "% </b> <br>";
                        echo "Hadiah Senilai                 = " . "<b>" . buat($hadiah) . "</b> <br>";
                        echo "Bunga Selama Pengendapan Dana  = " . "<b>" . buat($nilaiEndap) . "</b> <br>";
                        echo "Saldo Blokir                   = " . "<b>" . buat($saldoBlokir) . "</b> <br>";
                        echo "</pre>";
                    }
                }
            }
        }
        ?>

    </div>

</div>
</body>
</html>