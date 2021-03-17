<?php

$data = $_POST;

// $data = mysqli_fetch_assoc($sql_lahan);

$temp_hasil_akhir = $pusatdata->getCalculate($connect, $data);
$rank = $pusatdata->getRankCalculation($temp_hasil_akhir);

// echo "<pre>". print_r($temp_hasil_akhir, true) ."</pre>";
// die();

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
										<td rowspan="<?= count($rank) + 1 ?>" class="text-center"><?= $data['alamat'] ?></td>
									</tr>

									<?php foreach ($rank as $key => $item): ?>
										<tr>
											<td class="text-center"><?= $item['tanaman'] ?></td>
											<td class="text-center"><?= $item['net'] ?></td>
										</tr>
									<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="3" class="text-center">Data tidak tersedia</td>
									</tr>
								<?php endif; ?>

							</tbody>
						</table>
					</div>
				</div>

				<div class="form-group text-right">
					<a href="?page=home" class="btn btn-info">
						Beranda
					</a>
					<a href="?page=uji" class="btn btn-primary">
						Lakukan Pengujian Lain
					</a>
				</div>

			</div>
		</div>
	</div>
</div>
