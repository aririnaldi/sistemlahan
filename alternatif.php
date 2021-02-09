<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">

			<div class="header font-bold col-teal" style="text-align: center; font-size: 25px">
				ALTERNATIF TANAMAN
			</div>

			<div class="body" align="center">

				<p align="left">
					<a href="?page=tambah-alternatif" class="btn btn-success p-b-10 p-r-15 font-bold">
						TAMBAH ALTERNATIF
					</a>
				</p>
				<br>

				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
						<thead>
							<tr>
								<th width="10px">No</th>
								<th class="text-center">Nama Tanaman</th>
                                <th class="text-center">Tekstur</th>
                                <th class="text-center">pH min</th>
								<th class="text-center">pH max</th>
								<th class="text-center">Drainase</th>
								<th class="text-center">Suhu min</th>
								<th class="text-center">Suhu max</th>
								<th class="text-center">Ketinggian min</th>
								<th class="text-center">Ketinggian max</th>
								<th class="text-center">Lereng min</th>
								<th class="text-center">Lereng max</th>
								<th class="text-center">Curah Hujan min</th>
								<th class="text-center">Curah Hujan max</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							include "koneksi.php";
							$no=1;
							$sql = mysqli_query($connect,"select * from tb_alternatif");
							while($hasil = mysqli_fetch_array($sql))
							{
						?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $hasil['nama_tanaman'];?></td>
								<td><?php echo $hasil['tekstur_tanaman'];?></td>
								<td><?php echo $hasil['ph_min'];?></td>
								<td><?php echo $hasil['ph_max'];?></td>
								<td><?php echo $hasil['drainase'];?></td>
								<td><?php echo $hasil['suhu_min'];?></td>
								<td><?php echo $hasil['suhu_max'];?></td>
								<td><?php echo $hasil['ketinggian_min'];?></td>
								<td><?php echo $hasil['ketinggian_max'];?></td>
								<td><?php echo $hasil['lereng_min'];?></td>
								<td><?php echo $hasil['lereng_max'];?></td>
								<td><?php echo $hasil['ch_min'];?></td>
								<td><?php echo $hasil['ch_max'];?></td>
								<td>
									<center>
										<form method="post" action='?page=edit-alternatif&id=<?php echo $hasil['kode']; ?>'>
											<input type='hidden' name='id' value="<?php echo $hasil['kode'];?>">
											<input type="submit" name="edit" value="EDIT" class="btn btn-primary p-b-10 p-r-15 font-bold">
											<input type="submit" onClick="return confirm('Yakin akan dihapus?');" name="hapus" value="HAPUS" class="btn btn-danger p-b-10">
										</form>
									</center>
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
