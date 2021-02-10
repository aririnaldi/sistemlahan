<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header font-bold col-teal" style="text-align: center; font-size: 25px">
				REKAP HASIL
			</div>
			<br>


			<div class="body" align="center">
				<table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
					<thead>
						<tr>
							<th width="10px">No</th>
							<th class="text-center">Alamat</th>
                            <th class="text-center">Jenis Tanaman</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						$sql = mysqli_query($connect, "
							SELECT * FROM tb_hasil
								INNER JOIN tb_lahan ON tb_lahan.id_alamat = tb_hasil.idalamat
							ORDER BY id_hasil DESC"
						);

						if (mysqli_num_rows($sql) > 0) {
							while($hasil = mysqli_fetch_array($sql)){

							?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $hasil['alamat'];?></td>
									<td class="text-center"><?php echo $hasil['jenistanaman'];?></td>
									<td class="text-center">
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
