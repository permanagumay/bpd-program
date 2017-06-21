<!DOCTYPE html>
<html lang="en">
<head>
    <title>BPD-Program</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>


        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 450px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
        }

        body {
            background-image: url("assets/img/texture-2150588_960_720.jpg");
            background-size: cover;

        }
    </style>
    <script type="text/javascript" language="JavaScript">
        window.onload = function () {
            document.getElementById("tiring").style.display = 'none';

        }
        function validAngka(a) {
            if (!/^[0-9.]+$/.test(a.value)) {
                a.value = a.value.substring(0, a.value.length - 1000);
            }
        }


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

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left">
            <h1><small>Calculator Program Blokir</small></h1>
            <h1><b>Tabungan Agris..</b></h1>
            <hr>
            <div class="container">
                <form action="" id="uploadForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Jenis Tabungan</label>
                        </div>
                        <div class="col-sm-5">
                            <select name="jns_tab" id="jns_tab" class="form-control" onchange="show()">
                                <option value="1">Tabungan Agris</option>
                                <option value="2">Tabungan Agris Plus</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="tiring">
                        <div class="col-sm-4">
                            <label class="control-label">Nilai Tiring</label>
                        </div>
                        <div class="col-sm-5">
                            <select name="nilaiTiring" id="nilaiTiring" class="form-control">
                                <option value="1">4.25%</option>
                                <option value="2">4.75%</option>
                                <option value="3">5.25%</option>
                                <option value="4">5.75%</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Masa Tenor</label>
                        </div>
                        <div class="col-sm-5">
                            <select name="tenor" id="tenor" class="form-control">
                                <option value="1">01 Bulan</option>
                                <option value="2">03 Bulan</option>
                                <option value="3">06 Bulan</option>
                                <option value="4">01 Tahun</option>
                                <option value="5">02 Tahun</option>
                                <option value="6">03 Tahun</option>
                                <option value="7">04 Tahun</option>
                                <option value="8">05 Tahun</option>
                                <option value="9">06 Tahun</option>
                                <option value="10">07 Tahun</option>
                                <option value="11">08 Tahun</option>
                                <option value="12">09 Tahun</option>
                                <option value="13">10 Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label class="control-label">Nilai Hadiah</label>
                        </div>
                        <div class="col-sm-5">
                            <input name="hadiah" id="hadiah" class="form-control"
                                   placeholder="Nilai Hadiah Belum Termasuk Pajak" onkeyup="validAngka(this)"  data-id="100" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-5">
                            <a href="#"  class="edit-record" title="Kalkulasi"><button class="btn btn-info btn-sm" id="btnSubmit">Kalkulasi <i class="fa  fa-calculator"></i></button></a>
                        </div>
                    </div>
                </form>
            </div> <!-- container -->
        </div> <!-- col-sm-8 -->
        <div class="col-sm-2 sidenav">
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" >
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="background-image: url('assets/img/texture-2150588_960_720.jpg')">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><b>Hasil Perhitungan</b></h4>
                    </div>
                    <div class="modal-body" >
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- content -->
</div>
<script>
    $(function(){
        $(document).on('click','.edit-record',function(e){

            var tabungan = $('#jns_tab').val();
            var tiringnya = $('#nilaiTiring').val();
            var tenornya = $('#tenor').val();
            var hadiahnya = $('#hadiah').val();
            console.log(tabungan);
            console.log(tiringnya);
            console.log(tenornya);
            console.log(hadiahnya);
            e.preventDefault();
            $("#myModal").modal('show');
            $.ajax({
                url:"result.php",
                type:"POST",
                data:"jns_tab="+tabungan+"&nilaiTiring="+tiringnya+"&tenor="+tenornya+"&hadiah="+hadiahnya,
                success:(function (html) {
                    $(".modal-body").html(html);
                })
            });
        });
    });


</script>
</body>
</html>
