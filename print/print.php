<script type="text/javascript">
    window.print();
</script>
<?php
include '../koneksi.php';
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Hasil Keputusan lahan tanaman obat rimpang</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
       <link href="../plugins/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body>
       <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body" align="center">
                <img src="../images/FMIPA.jpg" align="left" style="width: 90px;"><br>
                    <p align="left"><label style="font-size: 18px">&nbsp;&nbsp;PRIORITAS PERBAIKAN STANDAR AKREDITASI<br>&nbsp;&nbsp;PROGRAM STUDI <?php echo $q_prod['nama_prodi']; ?></label></p>
                    <hr>
                    <p align="left"><label style="font-size: 15px">Data Awal</label></p>   
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <p align="justify"><label style="font-size: 13px">Sumber Daya Manusia : <br> - Sangat Berkompeten (bobot 5)<br>- Berkompeten (bobot 4)<br>- Cukup (bobot 3)<br>- Kurang (bobot 2)<br>- Sangat Kurang (bobot 1) </label></p>
                        </div>
                         <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <p align="justify"><label style="font-size: 13px">Ketersediaan Dana : <br> - Sangat Lebih (bobot 5)<br>- Lebih (bobot 4)<br>- Cukup (bobot 3)<br>- Kurang (bobot 2)<br>- Sangat Kurang (bobot 1) </label></p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <p align="justify"><label style="font-size: 13px">Rentang Waktu Perbaikan : <br> - Kurang dari 1 tahun (bobot 5)<br>- 1 hingga 2 tahun (bobot 4)<br>- 2 hingga 3 tahun (bobot 3)<br>- 3 hingga 4 tahun (bobot 2)<br>- 4 hingga 5 tahun (bobot 1) </label></p>
                        </div>
                          <div class="col-lg- col-md-5 col-sm-5 col-xs-5">
                    <p align="justify"><label style="font-size: 13px">Bobot BAN-PT : <br> - Standar 1
(2.63%) (bobot 5) <br>- Standar 2 (26.32%) (bobot 1)<br>- Standar 3 (13.16%) (bobot 3)<br>- Standar 4 (18.42%) (bobot 2)<br>- Standar 5
(7.89%) (bobot 4) <br>- Standar 6 (18.42%) (bobot 2) <br>- Standar 7 (13.16%) (bobot 3)</div>
                    </div>
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center" rowspan="2" width="10px">No</th>
                                    <th style="vertical-align: middle; text-align: center" rowspan="2" width="100px">STANDAR</th>
                                    <th colspan="4" class="text-center">KRITERIA</th>
                                </tr>
                                <tr>
                                <?php
                                $tampil_krit = mysqli_query($connect,"SELECT * FROM tb_kriteria WHERE level='$_SESSION[level]'");
                                while ($rows_krit = mysqli_fetch_array($tampil_krit)) {
                                    # code...
                                    echo "<th style='vertical-align: middle;text-align:center' width='150px'>".strtoupper($rows_krit['kriteria'])."</th>";
                                }
                                ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
                                $no = 1;
                                while ($rows = mysqli_fetch_array($query)) {
                                    $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
                                    $kat1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[2]'"));
                                    $kat2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[3]'"));
                                    $kat3 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[4]'"));
                                    # code...
  
                                    echo "<tr>
                                        <td align=\"center\">".$no++."</td>
                                        <td>".$cekkriteria['alternatif']."</td>
                                        <td style='vertical-align: middle; text-align:center'>".$kat1[3]."</td>
                                        <td style='vertical-align: middle; text-align:center'>".$kat2[3]."</td>
                                        <td style='vertical-align: middle; text-align:center'>".$kat3[3]."</td>
                                        <td style='vertical-align: middle; text-align:center'>".$rows[5]." </td></tr>";
                                }
                                ?>
                            <tr>
                            <td colspan="2" class="font-bold text-center">Bobot</td>
                            <?php
                            $query_bobot = mysqli_query($connect,"SELECT * FROM tb_kriteria WHERE level='$_SESSION[level]'");
                            while ($rows_bobot = mysqli_fetch_array($query_bobot)) {
                                # code...
                                echo "<td align='center'>".($rows_bobot[2]/100)."</td>";
                            }
                            ?>
                            </tr>
                            </tbody>
                        </table>
                    <?php
                    //include 'promethee.php';
                    ?>
                    <hr>
                    <div class="body" align="center">
                    <table class="table table-bordered ">
                    <p align="left"><label style="font-size: 15px">Hasil Ranking</label></p>
                            <?php
                            $no = 1;
                            $query_akhir = mysqli_query($connect,"SELECT * FROM tb_ranking WHERE level='$_SESSION[level]'  ORDER BY nilai_akhir ASC") or die(mysqli_error());
                            echo "<tr>
                            <th class='text-center'>No</th>
                            <th>Standar</th>
                            <th class='text-center'>Hasil Akhir</th>
                            <th class='text-center'>Ranking</th>
                            </tr>";
                            while ($rows_akhir = mysqli_fetch_array($query_akhir)) {
                                # code...
                                $ambil_nil = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE id_penilaian = '$rows_akhir[1]'"));
                                $ambil_alt = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$ambil_nil[1]'"));
                                echo "<tr>
                                    <td class='text-center'>".$no++."</td>
                                    <td>".$ambil_alt[1]."</td>
                                    <td class='text-center'>".number_format($rows_akhir[2],2)."</td>
                                    <td class='text-center font-bold'>".($no-1)."</td>
                                </tr>";
                            }
                            ?>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>
</body>

</html>