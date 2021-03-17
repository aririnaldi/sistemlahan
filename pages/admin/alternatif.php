<?php

include "koneksi.php";

?>
<!DOCTYPE html>
<html>
<head>




<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    </head>

<body>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h3 class="text-center font-bold col-teal">ALTERNATIF TANAMAN</h3>
			</div>
			<div class="header">
				<a href="?page=tambah-alternatif" class="btn btn-success p-b-10 p-r-15 font-bold">
					TAMBAH ALTERNATIF
				</a>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
						<thead>
							<tr>
								<th width="10px">No</th>
								<th class="text-center">Nama Tanaman</th>
                                <th class="text-center">Tekstur</th>
                                <th class="text-center">pH</th>
								<th class="text-center">Drainase</th>
								<th class="text-center">Suhu</th>
								<th class="text-center">Ketinggian</th>
								<th class="text-center">Lereng</th>
								<th class="text-center">Curah Hujan</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php

						$no = 1;
						$sql = mysqli_query($connect, "SELECT * FROM tb_tanaman");
						if (mysqli_num_rows($sql) > 0) {
							while ($item = mysqli_fetch_assoc($sql)) {
								?>

								<tr>
									<td><?= $no++ ?></td>
									<td><?= $item['nama'] ?></td>
									<td>
										<?php
										// ambil data tekstur
										$query = mysqli_query($connect, "SELECT * FROM tb_bobot_tekstur WHERE tanaman_id = {$item['id']}");
										while ($tekstur = mysqli_fetch_assoc($query)) {
											echo "<div>". $tekstur['nama'] ." (". $tekstur['bobot'] .")</div>";
										}

										?>
									</td>
									<td>
										<?php
										// ambil data ph
										$query = mysqli_query($connect, "SELECT * FROM tb_bobot_ph WHERE tanaman_id = {$item['id']}");
										while ($ph = mysqli_fetch_assoc($query)) {
											echo "<div>". $ph['min_ph'] ." - ". $ph['maks_ph'] ." (". $ph['bobot'] .")</div>";
										}

										?>
									</td>
									<td>
										<?php
										// ambil data drainase
										$query = mysqli_query($connect, "SELECT * FROM tb_bobot_drainase WHERE tanaman_id = {$item['id']}");
										while ($drainase = mysqli_fetch_assoc($query)) {
											echo "<div>". $drainase['nama'] ." (". $drainase['bobot'] .")</div>";
										}

										?>
									</td>
									<td>
										<?php
										// ambil data suhu
										$query = mysqli_query($connect, "SELECT * FROM tb_bobot_suhu WHERE tanaman_id = {$item['id']}");
										while ($suhu = mysqli_fetch_assoc($query)) {
											echo "<div>". $suhu['min_suhu'] ." - ". $suhu['maks_suhu'] ." (". $suhu['bobot'] .")</div>";
										}

										?>
									</td>
									<td>
										<?php
										// ambil data ketinggian
										$query = mysqli_query($connect, "SELECT * FROM tb_bobot_tinggi_lahan WHERE tanaman_id = {$item['id']}");
										while ($ketinggian = mysqli_fetch_assoc($query)) {
											echo "<div>". $ketinggian['min_tinggi'] ." - ". $ketinggian['maks_tinggi'] ." (". $ketinggian['bobot'] .")</div>";
										}

										?>
									</td>
									<td>
										<?php
										// ambil data lereng
										$query = mysqli_query($connect, "SELECT * FROM tb_bobot_lereng WHERE tanaman_id = {$item['id']}");
										while ($lereng = mysqli_fetch_assoc($query)) {
											echo "<div>". $lereng['min_lereng'] ." - ". $lereng['maks_lereng'] ." (". $lereng['bobot'] .")</div>";
										}

										?>
									</td>
									<td>
										<?php
										// ambil data curah hujan
										$query = mysqli_query($connect, "SELECT * FROM tb_bobot_curah_hujan WHERE tanaman_id = {$item['id']}");
										while ($hujan = mysqli_fetch_assoc($query)) {
											echo "<div>". $hujan['min_curah'] ." - ". $hujan['maks_curah'] ." (". $hujan['bobot'] .")</div>";
										}

										?>
									</td>
									<td>
										<a href="?page=edit-alternatif&id=<?= $item['id'] ?>" class="btn btn-primary m-b-5 m-r-5">Edit</a>
										<form action="?page=hapus-alternatif" method="post" onsubmit="confirm('Yakin akan dihapus?')">
											<input type="hidden" name="id" value="<?= $item['id'] ?>">
											<button type="submit" class="btn btn-danger m-b-5">
												Hapus
											</button>
										</form>
									</td>
								</tr>

								<?php
							}

						}else{
							?>

							<tr>
								<td colspan="10" class="text-center">Data tidak tersedia</td>
							</tr>

							<?php
						}

						?>



						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>
					 <!-- Jquery DataTable Plugin Js -->
 <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/demo.js"></script>
</html>
