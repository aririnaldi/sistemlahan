<?php
// contoh
$id = (int) $_GET['id'];
$sql_lahan = mysqli_query($connect,"SELECT * FROM tb_lahan WHERE id_alamat='$id' " );
if (mysqli_num_rows($sql_lahan) == 0) {
	echo "
	<script>
	alert('Data tidak tersedia');
	document.location.href='?page=lahan'
	</script>
	";
	die();
}

$data = mysqli_fetch_assoc($sql_lahan);
$temp_hasil_akhir = $pusatdata->getCalculate($connect, $data);
$rank = $pusatdata->getRankCalculation($temp_hasil_akhir);

// echo "<pre>". print_r($temp_hasil_akhir, true) ."</pre>";
// die();

?>

<?php 

if (isset($_POST['submit_input_hasil'])) {

	if(!empty($_POST['inputan_tanaman'][0])) {
		$tanamannya = "";
		foreach ($_POST['inputan_tanaman'] as $isi_tanaman) {
			$tanamannya = $tanamannya.$isi_tanaman.",";
		}
		$tanamannya = substr($tanamannya, 0,-1);
	}else{
		$tanamannya = "";
	}

	if(!empty($_POST['inputan_net'][0])) {
		$netnya = "";
		foreach ($_POST['inputan_net'] as $isi_net) {
			$netnya = $netnya.$isi_net.",";
		}
		$netnya = substr($netnya, 0,-1);
	}else{
		$netnya = "";
	}

	$input_hasil = mysqli_query($connect,"INSERT INTO tb_hasil VALUES('','$_POST[inputan_alamat]','$netnya','$tanamannya')");
	if ($input_hasil) {
		echo "<script> alert('Berhasil menginputkan hasil'); </script>";
	}
}

?>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header font-bold col-teal">
				<h3 class="text-center">PERHITUNGAN DAN HASIL KEPUTUSAN</h3>
			</div>
			<div class="body">
				<p class="text-center font-bold">Alamat Lahan : <?php echo $data['alamat'];?></p>

				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th class="text-center">Tekstur</th>
							<th class="text-center">PH</th>
							<th class="text-center">Drainase</th>
							<th class="text-center">Suhu (c)</th>
							<th class="text-center">Ketinggian</th>
							<th class="text-center">Lereng</th>
							<th class="text-center">Curah Hujan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center"><?php  echo $data['tekstur']; ?></td>
							<td class="text-center"><?php  echo $data['ph']; ?></td>
							<td class="text-center"><?php  echo $data['drainase']; ?></td>
							<td class="text-center"><?php  echo $data['suhu']; ?></td>
							<td class="text-center"><?php  echo $data['ketinggian']; ?></td>
							<td class="text-center"><?php  echo $data['lereng']; ?></td>
							<td class="text-center"><?php  echo $data['curah_hujan']; ?></td>
						</tr>
					</tbody>
				</table>

				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th width="5%" style="vertical-align: middle; text-align: center" rowspan="2">No</th>
							<th width="10%"style="vertical-align: middle; text-align: center" rowspan="2">Alternatif</th>
							<th colspan="7" class="text-center">Kriteria</th>
						</tr>

						<tr>
							<th class="text-center">Tekstur</th>
							<th class="text-center">PH</th>
							<th class="text-center">Drainase</th>
							<th class="text-center">Suhu (c)</th>
							<th class="text-center">Ketinggian</th>
							<th class="text-center">Lereng</th>
							<th class="text-center">Curah Hujan</th>
						</tr>
					</thead>
					
					<tbody>
						<?php 

						foreach ($temp_hasil_akhir as $key => $item) {
							?>

							<tr data-id="<?= $item['id'] ?>">
								<td><?= $key+1 ?></td>
								<td><?= $item['tanaman'] ?></td>
								<td><?= $item['bobot_tekstur'] ?></td>
								<td><?= $item['bobot_ph'] ?></td>
								<td><?= $item['bobot_drainase'] ?></td>
								<td><?= $item['bobot_suhu'] ?></td>
								<td><?= $item['bobot_tinggi_lahan'] ?></td>
								<td><?= $item['bobot_lereng'] ?></td>
								<td><?= $item['bobot_curah_hujan'] ?></td>
							</tr>

							<?php
						}

						?>
					</tbody>
					
					<tfoot>
						<tr>
							<td colspan="5" class="text-center">Keterangan bobot </td>
							<td class="text-center">Sangat Sesuai :<br> 4</td>
							<td class="text-center">Sesuai :<br> 3</td>
							<td class="text-center">Hampir Sesuai :<br> 2</td>
							<td class="text-center">Tidak Sesuai :<br> 1 </td>
						</tr>
					</tfoot>
				</table>

				<br>

				<div class="row clearfix">
					<div class="col-md-6">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th colspan="5"><center>HASIL PERHITUNGAN</center></th>
								</tr>
								<tr>
									<th> Alternatif </th>
									<th> Leaving Flow </th>
									<th> Entering Flow </th>
									<th> Net Flow </th>
								</tr>
							</thead>
							<tbody>
								<?php if (isset($temp_hasil_akhir) && ! empty($temp_hasil_akhir)): ?>
								<?php foreach ($temp_hasil_akhir as $key => $item): ?>
									<tr data-id="<?= $item['id'] ?>">
										<td><?= $item['tanaman'] ?></td>
										<td><?= $item['leaving'] ?></td>
										<td><?= $item['entering'] ?></td>
										<td><?= $item['net'] ?></td>
									</tr>
								<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="4" class="text-center">Data tidak tersedia</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>

					<div class="col-lg-6">

						<form method="POST">
							
							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3" class="text-center">HASIL MENURUT NILAI TERTINGGI</th>
									</tr>
									<tr>
										<th class="text-center">Alamat</th>
										<th class="text-center">Jenis Tanaman</th>
										<th class="text-center">Nilai Net Flow</th>
									</tr>
								</thead>
								<tbody>
									<?php if (isset($rank) && ! empty($rank)): ?>
									<tr>
										<td rowspan="<?= count($rank) + 1 ?>" class="text-center">
											<?= $data['alamat'] ?>
											<input type="hidden" name="inputan_alamat" value="<?= $data['id_alamat'] ?>">
										</td>
									</tr>

									<?php foreach ($rank as $key => $item): ?>
										<tr>
											<td class="text-center">
												<?= $item['tanaman'] ?>
												<input type="hidden" name="inputan_tanaman[]" value="<?= $item['tanaman'] ?>">
											</td>
											<td class="text-center">
												<?= $item['net'] ?>
												<input type="hidden" name="inputan_net[]" value="<?= $item['net'] ?>">
											</td>
										</tr>
									<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="3" class="text-center">Data tidak tersedia</td>
										</tr>
									<?php endif; ?>

								</tbody>
							</table>

							<br>

							<div class="text-center">

								<?php 

								$sql_hasil = mysqli_query($connect,"SELECT * FROM tb_hasil WHERE id_alamat='$data[id_alamat]' " );
								$data_hasil = mysqli_fetch_assoc($sql_hasil);

								if ($data_hasil!="") {
									?>
									<a href="?page=rekap"><button type="button" class="btn btn-warning"> Lihat Hasil </button></a>
									<?php
								}else{
									?>
									<input type="submit" name="submit_input_hasil" class="btn btn-primary" value="Input Hasil">
									<?php
								}
								
								?>

								<a href="?page=lahan" class="btn btn-danger"> Batal </a>

							</div>

						</form>
					</div>

				</div>
			</div>
			<br><br>
		</div>
	</div>
</div>