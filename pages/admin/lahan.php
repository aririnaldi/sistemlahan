<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Selamat Datang | Standar Akreditasi</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>
    <body>

           <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header font-bold col-teal" style="text-align:center;font-size: 25px">
        					DATA LAHAN
                        </div>
                        <div class="body" align="center">
                            <p align="left"><a href="?page=tambah-lahan" class="btn btn-success p-b-10 p-r-15 font-bold">
                                TAMBAH DATA LAHAN
                            </a></p>
                            <br>
                                <div class="row clearfix" >
                                    <form action="" method="post" class="col-md-3" >
                                        <input type="text" class="form-control" id="keyword" placeholder="Masukan Pencarian" name="keyword">
                                    </form>
                                </div>
                                <div id="container">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th style="text-align:center">Alamat</th>
                                        <th style="text-align:center">Tekstur</th>
                                        <th style="text-align:center">pH</th>
                                        <th style="text-align:center">Drainase</th>
                                        <th style="text-align:center">Suhu</th>
                                        <th style="text-align:center">Ketinggian</th>
                                        <th style="text-align:center">Lereng</th>
                                        <th style="text-align:center">Curah Hujan</th>
                                        <th style="text-align:center" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                 $no=1;
                                 $sql = mysqli_query($connect,"select * from tb_lahan order by id_alamat desc");
                                while($hasil = mysqli_fetch_array($sql)){
                                    ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $hasil['alamat'];?></td>
                                        <td><?php echo $hasil['tekstur'];?></td>
                                        <td><?php echo $hasil['ph'];?></td>
                                        <td><?php echo $hasil['drainase'];?></td>
                                        <td><?php echo $hasil['suhu'];?></td>
                                        <td><?php echo $hasil['ketinggian'];?></td>
                                        <td><?php echo $hasil['lereng'];?></td>
                                        <td><?php echo $hasil['curah_hujan'];?></td>
                                        <td class="text-center">
                                            <a href="?page=hasil&id=<?php echo $hasil['id_alamat']; ?>"class="btn btn-xs btn-primary m-b-5 m-r-5">
                                                Proses
                                            </a>

                                            <a href="?page=edit-lahan&id=<?php echo $hasil['id_alamat']; ?>"class="btn btn-warning btn-xs m-b-5 m-r-5">
                                                Edit
                                            </a>

                                            <form method="post" action="?page=edit-lahan&id=<?php echo $hasil['id_alamat']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $hasil['id_alamat'];?>">
                                                <input type="submit" onClick="return confirm('Yakin akan dihapus?');" name="hapus" value="Hapus" class="btn btn-danger btn-xs m-b-5 m-r-5">
                                            </form>
        								</td>
        							</tr>
                                 <?php
                                $no++;
                                }
                                ?>
        					</tbody>
        				</table>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>

    </body>
    
<!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>
                     <!-- Jquery DataTable Plugin Js -->
 <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../js/demo.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../js/script.js"></script>
</html>