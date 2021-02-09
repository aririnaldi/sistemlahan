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
							<th style="text-align:center">Alamat</th>
                          <!--  <th style="text-align:center">Nilai Net Flow</th>-->
                            <th style="text-align:center">Jenis Tanaman</th>
							<th colspan="2" style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php
						include "koneksi.php";
						$no=1;
						$sql = mysqli_query($connect,"SELECT * FROM tb_hasil INNER JOIN tb_lahan
						ON tb_lahan.id_alamat=tb_hasil.idalamat ORDER BY id_hasil DESC");
						while($hasil = mysqli_fetch_array($sql))
						{
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $hasil['alamat'];?></td>
							<!--<td><?php echo $hasil['nilai'];?></td>-->
							<td style="text-align: center;"><?php echo $hasil['jenistanaman'];?></td>
							<td>
								<center><a href="?page=hasil&id=<?php echo $hasil['idalamat'];?>"><input type="submit" name="detail" value="DETAIL" class="btn btn-success p-b-10"></center>
							</td>
							<td>
								<form method="post" action='?page=delete-hasil&id_hasil=<?php echo $hasil['id_hasil']; ?>'>
								<input type='hidden' name='id' value="<?php echo $hasil['id_alamat'];?>">
									<center><input type="submit" onClick="return confirm('Yakin akan dihapus?');" name="hapus" value="HAPUS" class="btn btn-danger p-b-10"></center>
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
