
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
                        include 'koneksi.php';
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
                                <td>
                                    <center>
										<a href="?page=hasil&id=<?php echo $hasil['id_alamat']; ?>" method="post" type="submit">
											<button class="btn btn-xs btn-primary">Proses</button>
										</a>
									</center>
								</td>
								<td>
									<center>
                                        <form method="post" action='?page=edit-lahan&id=<?php echo $hasil['id_alamat']; ?>'>
											<input type='hidden' name='id' value="<?php echo $hasil['id_alamat'];?>">
											<input type="submit" name="edit" value="EDIT" class="btn btn-warning btn-xs">
											<input type="submit" onClick="return confirm('Yakin akan dihapus?');" name="hapus" value="HAPUS" class="btn btn-danger btn-xs">
										</form>
                                        <br>
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
