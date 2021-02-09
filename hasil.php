<?php
include "koneksi.php";
if(isset($_POST['input'])){
	echo "<pre>". print_r($_POST) ."</pre>";
	die();

	$idalamat = (int) $_POST['idalamat'];
	$nilai = $_POST['nilai'];
	$jenis_tanaman = addslashes($_POST['jenistanaman']);

	$input = mysqli_query($connect, "
		INSERT INTO tb_hasil VALUES(
			'',
			'$idalamat',
			'$nilai',
			'$jenis_tanaman'
		)
	");

	if($input){
		echo "
			<script>
				alert('Data perhitungan berhasil disimpan ...');
				document.location='?page=rekap'
			</script>
		";
	}else{
		echo "<script>alert('Gagal ...'); </script>";
	}
}

// contoh
$id = (int) $_GET['id'];
$sql_lahan = mysqli_query($connect,"SELECT * FROM tb_lahan WHERE id_alamat='$id' " );
$data = mysqli_fetch_assoc($sql_lahan);
$alamat = $data['alamat'];
$idalamat = $data['id_alamat'];

// echo "<pre>". print_r($data, true) ."</pre>";
// die();

?>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header font-bold col-teal">
				PERHITUNGAN DAN HASIL KEPUTUSAN
			</div>
			<div class="body">
				<p class="text-center"><label style="font-size: 23px">HASIL</label></p>
				<hr>
				<p><label style="font-size:20px">Alamat Lahan : <?php echo $alamat;?></label></p>

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
							<td><?php  echo $data['tekstur']; ?></td>
							<td><?php  echo $data['ph']; ?></td>
							<td><?php  echo $data['drainase']; ?></td>
							<td><?php  echo $data['suhu']; ?></td>
							<td><?php  echo $data['ketinggian']; ?></td>
							<td><?php  echo $data['lereng']; ?></td>
							<td><?php  echo $data['curah_hujan']; ?></td>
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

					$no = 1;
					$sql = mysqli_query($connect, "SELECT * FROM tb_tanaman");
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
				<?php

				$temp_hasil_lengkap = [];
				$temp_hasil_angka = [];
				$temp_hasil_akhir = [];
				$rank = [];
				$max_net_flow = 0;
				$sql = mysqli_query($connect, "SELECT * FROM tb_tanaman");
				while ($item = mysqli_fetch_assoc($sql)) {
					$tanaman_id = (int) $item['id'];
					$query = "
						SELECT
							t.id, t.nama, COALESCE(bt.bobot, 0) AS bobot_tekstur,
							COALESCE(bp.bobot, 0) AS bobot_ph,
							COALESCE(bs.bobot, 0) AS bobot_suhu,
							COALESCE(bd.bobot, 0) AS bobot_drainase,
							COALESCE(bl.bobot, 0) AS bobot_lereng,
							COALESCE(btl.bobot, 0) AS bobot_tinggi_lahan,
							COALESCE(bch.bobot, 0) AS bobot_curah_hujan
						FROM tb_tanaman AS t
							LEFT JOIN (
								SELECT MIN(bt.id), bt.tanaman_id, bt.nama, bt.bobot
								FROM tb_bobot_tekstur AS bt
									INNER JOIN tb_tanaman AS t ON t.id = bt.tanaman_id AND t.id = {$tanaman_id}
								WHERE bt.nama = '". $data['tekstur'] ."'
								GROUP BY bt.tanaman_id, bt.nama, bt.bobot
							) AS bt ON bt.tanaman_id = t.id
							LEFT JOIN (
								SELECT MIN(bs.id), bs.tanaman_id, bs.min_suhu, bs.maks_suhu, bs.bobot
								FROM tb_bobot_suhu AS bs
									INNER JOIN tb_tanaman AS t ON t.id = bs.tanaman_id AND t.id = {$tanaman_id}
								WHERE ". $data['suhu'] ." BETWEEN bs.min_suhu AND bs.maks_suhu
								GROUP BY bs.tanaman_id, bs.min_suhu, bs.maks_suhu, bs.bobot
							) AS bs ON bs.tanaman_id = t.id
							LEFT JOIN (
								SELECT MIN(bp.id), bp.tanaman_id, bp.min_ph, bp.maks_ph, bp.bobot
								FROM tb_bobot_ph AS bp
									INNER JOIN tb_tanaman AS t ON t.id = bp.tanaman_id AND t.id = {$tanaman_id}
								WHERE ". $data['ph'] ." BETWEEN bp.min_ph AND bp.maks_ph
								GROUP BY bp.tanaman_id, bp.min_ph, bp.maks_ph, bp.bobot
							) AS bp ON bp.tanaman_id = t.id
							LEFT JOIN (
								SELECT MIN(bd.id), bd.tanaman_id, bd.nama, bd.bobot
								FROM tb_bobot_drainase AS bd
									INNER JOIN tb_tanaman AS t ON t.id = bd.tanaman_id AND t.id = {$tanaman_id}
								WHERE bd.nama = '". $data['drainase'] ."'
								GROUP BY bd.tanaman_id, bd.nama, bd.bobot
							) AS bd ON bd.tanaman_id = t.id
							LEFT JOIN (
								SELECT MIN(btl.id), btl.tanaman_id, btl.min_tinggi, btl.maks_tinggi, btl.bobot
								FROM tb_bobot_tinggi_lahan AS btl
									INNER JOIN tb_tanaman AS t ON t.id = btl.tanaman_id AND t.id = {$tanaman_id}
								WHERE ". $data['ketinggian'] ." BETWEEN btl.min_tinggi AND btl.maks_tinggi
								GROUP BY btl.tanaman_id, btl.min_tinggi, btl.maks_tinggi, btl.bobot
							) AS btl ON btl.tanaman_id = t.id
							LEFT JOIN (
								SELECT MIN(bl.id), bl.tanaman_id, bl.min_lereng, bl.maks_lereng, bl.bobot
								FROM tb_bobot_lereng AS bl
									INNER JOIN tb_tanaman AS t ON t.id = bl.tanaman_id AND t.id = {$tanaman_id}
								WHERE ". $data['lereng'] ." BETWEEN bl.min_lereng AND bl.maks_lereng
								GROUP BY bl.tanaman_id, bl.min_lereng, bl.maks_lereng, bl.bobot
							) AS bl ON bl.tanaman_id = t.id
							LEFT JOIN (
								SELECT MIN(bch.id), bch.tanaman_id, bch.min_curah, bch.maks_curah, bch.bobot
								FROM tb_bobot_curah_hujan AS bch
									INNER JOIN tb_tanaman AS t ON t.id = bch.tanaman_id AND t.id = {$tanaman_id}
								WHERE ". $data['curah_hujan'] ." BETWEEN bch.min_curah AND bch.maks_curah
								GROUP BY bch.tanaman_id, bch.min_curah, bch.maks_curah, bch.bobot
							) AS bch ON bch.tanaman_id = t.id
					";

					$temp_query = mysqli_query($connect, $query);
					$temp_hasil = mysqli_fetch_assoc($temp_query);
					$temp_hasil_lengkap[] = $temp_hasil;
					$temp_hasil_angka[] = [
						$temp_hasil['bobot_tekstur'],
						$temp_hasil['bobot_ph'],
						$temp_hasil['bobot_suhu'],
						$temp_hasil['bobot_drainase'],
						$temp_hasil['bobot_lereng'],
						$temp_hasil['bobot_tinggi_lahan'],
						$temp_hasil['bobot_curah_hujan'],
					];
				}

				$temp_hasil_akhir = [];
				if (! empty($temp_hasil_angka)) {
					$temp_calculate = [];
					foreach ($temp_hasil_angka as $key => $item) {
						// echo "<pre>". print_r($item, true) ."</pre>";
						// die();

						// calculate leaving
						$temp_flow = [];
						foreach ($item as $l_1 => $v_1) {
							$temp_ = [];
							foreach ($item as $l_2 => $v_2) {
								if ($l_1 != $l_2) {
									$temp_[] = ($v_1 - $v_2) < 0 ? 0 : $v_1 - $v_2;
									// $temp_[] = $l_1 . " - " . $l_2;
								}
							}

							$temp_flow[$l_1] = array_sum($temp_);
						}

						$temp_calculate[] = $temp_flow;

						// $temp_hasil_akhir[$key]['leaving'] = round(array_sum($temp_leaving) / (count($temp_leaving) - 1), 2);

						// echo "<pre>". print_r($temp_leaving, true) ."</pre>";
						// die();
					}

					foreach ($temp_calculate as $key => $item) {
						$temp_hasil_akhir[$key]['id'] = $temp_hasil_lengkap[$key]['id'];
						$temp_hasil_akhir[$key]['tanaman'] = $temp_hasil_lengkap[$key]['nama'];
						$temp_hasil_akhir[$key]['leaving'] = round(array_sum($item) / (count($item) - 1), 2);
						$temp_hasil_akhir[$key]['entering'] = round(array_sum(array_column($temp_calculate, $key)) / (count($item) - 1), 2);
						$temp_hasil_akhir[$key]['net'] = $temp_hasil_akhir[$key]['leaving'] - $temp_hasil_akhir[$key]['entering'];
					}
				}

				?>

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
								<?php foreach ($temp_hasil_akhir as $key => $item): ?>
									<?php
									if ((int) $item['net'] >= $max_net_flow) {
										$max_net_flow = (int) $item['net'];
										$rank[] = $item;
									}

									?>

									<tr data-id="<?= $item['id'] ?>">
										<td><?= $item['tanaman'] ?></td>
										<td><?= $item['leaving'] ?></td>
										<td><?= $item['entering'] ?></td>
										<td><?= $item['net'] ?></td>
									</tr>
								<?php endforeach; ?>
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
								<tr>
									<td rowspan="<?= count($rank) + 1 ?>"><?= $alamat ?></td>
								</tr>

								<?php foreach ($rank as $key => $item): ?>
									<tr>
										<td><?= $item['tanaman'] ?></td>
										<td><?= $item['net'] ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<br><br>
		</div>
	</div>
</div>
