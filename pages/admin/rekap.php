<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header font-bold col-teal" style="text-align: center; font-size: 25px">
				REKAP HASIL
			</div>
			<br>

			<div class="form-group">
				
			</div>
			<div class="body" align="center">
				<table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Alamat</th>
							<th>Jenis Tanaman</th>
							<th>Nilai</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$sql = mysqli_query($connect, "
							SELECT * FROM tb_hasil
							INNER JOIN tb_lahan ON tb_lahan.id_alamat = tb_hasil.id_alamat
							ORDER BY id_hasil DESC"
						);

						if (mysqli_num_rows($sql) > 0) {
							while($hasil = mysqli_fetch_array($sql)){

								?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $hasil['alamat'];?></td>
									<td>
										<?php 
										$explode_tanaman = explode(",", $hasil['jenistanaman']);
										if (isset($explode_tanaman[0])) {
											echo str_replace(",", "<br>", $hasil['jenistanaman']);
										}else{
											echo $hasil['jenistanaman'];
										}
										?>

									</td>
									<td>
										<?php 
										$explode_nilai = explode(",", $hasil['nilai']);
										if (isset($explode_nilai[0])) {
											echo str_replace(",", "<br>", $hasil['nilai']);
										}else{
											echo $hasil['nilai'];
										}
										?>
									</td>
									<td>
										<form method="post" action="?page=delete-hasil&id_hasil=<?php echo $hasil['id_hasil']; ?>">
											<input type='hidden' name='id' value="<?php echo $hasil['id_alamat'];?>">
											<input type="submit" onClick="return confirm('Yakin akan dihapus?');" name="hapus" value="HAPUS" class="btn btn-danger p-b-10">
										</form>
									</td>
								</tr>

								<?php
								$no++;
							}
						}else{

							?>

							<tr>
								<td colspan="4" class="text-center">Data tidak tersedia</td>
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
