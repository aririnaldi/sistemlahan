<?php
$id = $_GET['id'];
include "koneksi.php";
// contoh
$sql_lahan = mysqli_query($connect,"SELECT * FROM tb_lahan WHERE id_alamat='$id' " );
$data = mysqli_fetch_array($sql_lahan);
$alamat = $data['alamat'];
$idalamat = $data['id_alamat'];
?>


	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header font-bold col-teal">
					PERHITUNGAN DAN HASIL KEPUTUSAN
				</div>
				<div class="body" align="center">
					<p align="center"><label style="font-size: 23px">HASIL</label></p>
					<hr>
					<p align="left"><label style="font-size:20px">Alamat Lahan : <?php echo $alamat;?></label></p>

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
							<?php
							$no=1;
							$sql= mysqli_query($connect,"SELECT * FROM
								tb_lahan INNER JOIN  tb_alternatif
								WHERE id_alamat='$id' " );
							while ( $hasil =mysqli_fetch_array($sql))
							{
								$alamat 		= $hasil['alamat'];
								$tekstur 		= $hasil['tekstur'];
								$drainase 		= $hasil['drainase'];
								$ph				= $hasil['ph'];
								$suhu 			= $hasil['suhu'];
								$ketinggian		= $hasil['ketinggian'];
								$lereng			= $hasil['lereng'];
								$curah_hujan 	= $hasil['curah_hujan'];
								$nama_tanaman 	= $hasil['nama_tanaman'];
								?>
							</thead>
							<tbody>
								<tr>
									<td><?php  echo $no; ?></td>
									<td><?php  echo $nama_tanaman; ?></td>
									<?php //--------- Tekstur --------------------------------
									//Sangat Halus
									if($data['tekstur']=="Sangat Halus")
									{
										if($nama_tanaman=="Lengkuas")
										{
											$tekstur_jadi[$no] = 2;
										}
										else if($nama_tanaman=="Jahe")
										{
											$tekstur_jadi[$no] = 2;
										}
										else if($nama_tanaman=="Kunyit")
										{
											$tekstur_jadi[$no] = 2;
										}
										else if($nama_tanaman=="Kencur")
										{
											$tekstur_jadi[$no] = 2;
										}
										else
										{
											//Jika Temulawak
											$tekstur_jadi[$no] = 2;
										}
									}

									//Halus
									else if($data['tekstur']=="Halus")
									{
										if($nama_tanaman=="Lengkuas")
										{
											$tekstur_jadi[$no] = 3;
										}
										else if($nama_tanaman=="Jahe")
										{
											$tekstur_jadi[$no] = 3;
										}
										else if($nama_tanaman=="Kunyit")
										{
											$tekstur_jadi[$no] = 3;
										}
										else if($nama_tanaman=="Kencur")
										{
											$tekstur_jadi[$no] = 3;
										}
										else
										{
											//Jika Temulawak
											$tekstur_jadi[$no] = 3;
										}
									}

									//Agak Halus
									else if($data['tekstur']=="Agak Halus")
									{
										if($nama_tanaman=="Lengkuas")
										{
											$tekstur_jadi[$no] = 4;
										}
										else if($nama_tanaman=="Jahe")
										{
											$tekstur_jadi[$no] = 3;
										}
										else if($nama_tanaman=="Kunyit")
										{
											$tekstur_jadi[$no] = 4;
										}
										else if($nama_tanaman=="Kencur")
										{
											$tekstur_jadi[$no] = 4;
										}
										else
										{
											//Jika Temulawak
											$tekstur_jadi[$no] = 4;
										}
									}
									//Sedang
									else if($data['tekstur']=="Sedang")
									{
										if($nama_tanaman=="Lengkuas")
										{
											$tekstur_jadi[$no] = 4;
										}
										else if($nama_tanaman=="Jahe")
										{
											$tekstur_jadi[$no] = 4;
										}
										else if($nama_tanaman=="Kunyit")
										{
											$tekstur_jadi[$no] = 4;
										}
										else if($nama_tanaman=="Kencur")
										{
											$tekstur_jadi[$no] = 4;
										}
										else
										{
											//Jika Temulawak
											$tekstur_jadi[$no] = 4;
										}
									}
									//Agak Kasar
									else if($data['tekstur']=="Agak Kasar")
									{
										if($nama_tanaman=="Lengkuas")
										{
											$tekstur_jadi[$no] = 2;
										}
										else if($nama_tanaman=="Jahe")
										{
											$tekstur_jadi[$no] = 4;
										}
										else if($nama_tanaman=="Kunyit")
										{
											$tekstur_jadi[$no] = 2;
										}
										else if($nama_tanaman=="Kencur")
										{
											$tekstur_jadi[$no] = 2;
										}
										else
										{
											//Jika Temulawak
											$tekstur_jadi[$no] = 2;
										}
									}
									else
									{
										//Jika KASAR
										if($nama_tanaman=="Lengkuas")
										{
											$tekstur_jadi[$no] = 1;
										}
										else if($nama_tanaman=="Jahe")
										{
											$tekstur_jadi[$no] = 1;
										}
										else if($nama_tanaman=="Kunyit")
										{
											$tekstur_jadi[$no] = 1;
										}
										else if($nama_tanaman=="Kencur")
										{
											$tekstur_jadi[$no] = 1;
										}
										else
										{
											//Jika Temulawak
											$tekstur_jadi[$no] = 1;
										}
									}
									?>
									<td><?php  echo $tekstur_jadi[$no]; ?></td>

								<?php //--------- PH --------------------------------//
									//PH 1 - 3.9
								if(($ph > 0) AND ($ph <= 3.9 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 1;
									}
								}
									//PH 4 - 5
								else if(($ph > 3.9) AND ($ph <= 5 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 2;
									}
								}
									//PH >5 - 5.8
								else if(($ph > 5) AND ($ph <= 5.8 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 2;
									}
								}
									//PH 5.9 - 6
								else if(($ph > 5.8) AND ($ph <=6 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 3;
									}
								}
									//PH 7
								else if($ph == 7 )
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 3;
									}
								}
									//PH >7 - 7.5
								else if(($ph > 7) AND ($ph <= 7.5 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 4;
									}
								}
									//PH >7.5 - 7.9
								else if(($ph > 7.5) AND ($ph <= 7.9 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 4;
									}
								}
									//PH = 8
								else if($ph == 8)
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 1;
									}
								}
								else
								{
										//Jika > 8
									if($nama_tanaman=="Lengkuas")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ph_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ph_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ph_jadi[$no] = 1;
									}
								}
								?>
								<td><?php  echo $ph_jadi[$no]; ?></td>

								<?php //--------- Drainase --------------------------------//

									//Drainase Baik
								if($data['drainase']=="Baik")
								{
									if($nama_tanaman=="Lengkuas")
									{
										$dr_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$dr_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$dr_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$dr_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$dr_jadi[$no] = 4;
									}
								}

									//Drainase Sedang
								else if($data['drainase']=="Sedang")
								{
									if($nama_tanaman=="Lengkuas")
									{
										$dr_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$dr_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$dr_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$dr_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$dr_jadi[$no] = 3;
									}
								}

									//Agak Terhambat
								else if($data['drainase']=="Agak Terhambat")
								{
									if($nama_tanaman=="Lengkuas")
									{
										$dr_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$dr_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$dr_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$dr_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$dr_jadi[$no] = 2;
									}
								}

									//Terhambat
								else if($data['drainase']=="Terhambat")
								{
									if($nama_tanaman=="Lengkuas")
									{
										$dr_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$dr_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$dr_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$dr_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$dr_jadi[$no] = 1;
									}
								}

									//Sangat Terhambat
								else if($data['drainase']=="Sangat Terhambat")
								{
									if($nama_tanaman=="Lengkuas")
									{
										$dr_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$dr_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$dr_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$dr_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$dr_jadi[$no] = 1;
									}
								}

									//Agak Cepat
								else if($data['drainase']=="Agak Cepat")
								{
									if($nama_tanaman=="Lengkuas")
									{
										$dr_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$dr_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$dr_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$dr_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$dr_jadi[$no] = 1;
									}
								}
								else
								{
										//Jika CEPAT
									if($nama_tanaman=="Lengkuas")
									{
										$dr_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$dr_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$dr_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$dr_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$dr_jadi[$no] = 1;
									}
								}
								?>
								<td><?php  echo $dr_jadi[$no]; ?></td>

								<?php //--------- Suhu --------------------------------//

									//di Suhu 1 - 14
								if(($suhu > 0) AND ($suhu <=14 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 1;
									}
								}

									//di Suhu 15-18
								else if(($suhu > 14) AND ($suhu <=18 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 1;
									}
								}

									//di Suhu 19
								else if($suhu==19)
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 2;
									}
								}

									//di Suhu 20-21
								else if(($suhu > 19) AND ($suhu <=21 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 2;
									}
								}

									//di Suhu 22
								else if($suhu == 22)
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 3;
									}
								}

									//di Suhu 23 & 24
								else if(($suhu > 22) AND ($suhu <=24 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 3;
									}
								}

									//di Suhu 25
								else if(($suhu > 24) AND ($suhu <= 25))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 4;
									}
								}

									//di Suhu 26-27
								else if(($suhu > 25) AND ($suhu <= 27))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 4;
									}
								}

									//di Suhu 28
								else if($suhu == 28)
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 1;
									}
								}

									//di Suhu 29 - 30
								else if(($suhu > 28) AND ($suhu <= 30))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 1;
									}
								}

									//di Suhu 31 - 35
								else if(($suhu > 30) AND ($suhu <= 35))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 1;
									}
								}

									//di Suhu 36 - 40
								else if(($suhu > 35) AND ($suhu <= 40))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 1;
									}
								}

								else
								{
										//Jika > 40
									if($nama_tanaman=="Lengkuas")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$suhu_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$suhu_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$suhu_jadi[$no] = 1;
									}
								}
								?>
								<td><?php  echo $suhu_jadi[$no]; ?></td>

								<?php //--------- Ketinggian --------------------------------//

								//di Ketinggian 1 - 49
								if(($ketinggian > 0) AND ($ketinggian < 50 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 1;
									}
								}

									//di ketinggian 50 - 200
								else if(($ketinggian > 49) AND ($ketinggian <= 200 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 1;
									}
								}

									//di Ketinggian 201 - 240
								else if(($ketinggian > 200) AND ($ketinggian <= 240 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 3;
									}
								}

									//di Ketinggian 241 - 299
								else if(($ketinggian > 240) AND ($ketinggian <= 299 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 3;
									}
								}

									//di Ketinggian 300 - 450
								else if(($ketinggian > 299) AND ($ketinggian <= 450 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 4;
									}
								}

									//di >450 - 469
								else if(($ketinggian > 450) AND ($ketinggian <= 469 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 4;
									}
								}

									//di 470 - 599
								else if(($ketinggian > 469) AND ($ketinggian < 600 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 2;
									}
								}

									//di 600
								else if($ketinggian == 600 )
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 2;
									}
								}

									//di 601 - 700
								else if(($ketinggian > 600) AND ($ketinggian <= 700 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 2;
									}
								}

									//di 701 - 900
								else if(($ketinggian > 700) AND ($ketinggian <= 900 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 1;
									}
								}

									//di 901 - 1500
								else if(($ketinggian > 900) AND ($ketinggian <= 1500 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 1;
									}
								}

								else
								{
										//Jika > 1500
									if($nama_tanaman=="Lengkuas")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ketinggian_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ketinggian_jadi[$no] = 1;
									}
								}
								?>
								<td><?php  echo $ketinggian_jadi[$no]; ?></td>

								<?php //--------- Lereng --------------------------------

									//di Lereng 1 - 2
								if(($lereng > 0) AND ($lereng <= 2 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$lereng_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$lereng_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$lereng_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$lereng_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$lereng_jadi[$no] = 4;
									}
								}

									//di Lereng 3 - 4
								else if(($lereng > 2) AND ($lereng <= 4 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$lereng_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$lereng_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$lereng_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$lereng_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$lereng_jadi[$no] = 4;
									}
								}

									//di Lereng 5 - 8
								else if(($lereng > 4) AND ($lereng <= 8))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$lereng_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$lereng_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$lereng_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$lereng_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$lereng_jadi[$no] = 3;
									}
								}

									//di Lereng 9 - 13
								else if(($lereng > 8) AND ($lereng <= 13 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$lereng_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$lereng_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$lereng_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$lereng_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$lereng_jadi[$no] = 3;
									}
								}

									//di Lereng 14 - 15
								else if(($lereng > 13) AND ($lereng <= 15 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$lereng_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Jahe")
									{
										$lereng_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$lereng_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kencur")
									{
										$lereng_jadi[$no] = 2;
									}
									else
									{
											//Jika Temulawak
										$lereng_jadi[$no] = 2;
									}
								}

									//di Lereng 16 - 45
								else if(($lereng > 15) AND ($lereng <= 45 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$lereng_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$lereng_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$lereng_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$lereng_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$lereng_jadi[$no] = 2;
									}
								}

								else
								{
										//Jika > 45
									if($nama_tanaman=="Lengkuas")
									{
										$lereng_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$lereng_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$lereng_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$lereng_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$lereng_jadi[$no] = 1;
									}
								}
								?>
								<td><?php  echo $lereng_jadi[$no]; ?></td>

								<?php //------------------ Curah Hujan ------------------------

									//di Curah Hujan 1 - 249
								if(($curah_hujan > 0) AND ($curah_hujan <= 249 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 1;
									}
								}

									//di Curah hujan 250 - 1000
								else if(($curah_hujan > 249) AND ($curah_hujan <= 1000 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 3;
									}
								}

									//di Curah Hujan 1001 - 1500
								else if(($curah_hujan > 1000) AND ($curah_hujan <= 1500 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 2;
									}
								}

									//di Curah Huan 1501 - 1799
								else if(($curah_hujan > 1500) AND ($curah_hujan <= 1799 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 3;
									}
								}

									//di Curah Huan 1800 - 2000
								else if(($curah_hujan > 1799) AND ($curah_hujan <= 2000 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 4;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 3;
									}
								}

									//di Curah Huan 2001 - 2500
								else if(($curah_hujan > 2000) AND ($curah_hujan <= 2500 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 3;
									}
								}

									//di Curah Huan 2501 - 3000
								else if(($curah_hujan > 2500) AND ($curah_hujan <= 3000 ))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 4;
									}
								}

									//di Curah Huan 3001 - 3500
								else if(($curah_hujan > 3000) AND ($curah_hujan <= 3500))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 4;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 1;
									}
								}

									//di Curah Huan 3501 - 4000
								else if(($curah_hujan > 3500) AND ($curah_hujan <= 4000))
								{
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 2;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 3;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 3;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 1;
									}
								}

								else
								{
										//Jika > 4000
									if($nama_tanaman=="Lengkuas")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Jahe")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kunyit")
									{
										$ch_jadi[$no] = 1;
									}
									else if($nama_tanaman=="Kencur")
									{
										$ch_jadi[$no] = 1;
									}
									else
									{
											//Jika Temulawak
										$ch_jadi[$no] = 1;
									}
								}
								?>
								<td><?php  echo $ch_jadi[$no]; ?></td>
							</tr>
							<?php
							$no ++;
						}
						?>
					</tbody>
					<tr>
						<td colspan="5" align="center">Keterangan bobot </td>
						<td >Sangat Sesuai : 4 <br></td>
						<td >Sesuai : 3 <br></td>
						<td >Hampir Sesuai : 2 <br></td>
						<td >Tidak Sesuai : 1 <br></td>
					</tr>
				</table>

				<!--Hasil Index Preferensi-->
					<?php //A1-A2 di C1 (Tekstur)
					$a1a2c1 = $tekstur_jadi[1]-$tekstur_jadi[2];
					if ($a1a2c1 <=0)
					{
						$hasila1a2c1 = 0;
					}
					else
					{
						$hasila1a2c1 = 1;
					}

					//A1-A2 di C2 (PH)
					$a1a2c2 = $ph_jadi[1]-$ph_jadi[2];
					if ($a1a2c2 <=0)
					{
						$hasila1a2c2 = 0;
					}
					else
					{
						$hasila1a2c2 = 1;
					}

					//A1-A2 di C3 (Drainase)
					$a1a2c3 = $dr_jadi[1]-$dr_jadi[2];
					if ($a1a2c3 <=0)
					{
						$hasila1a2c3 = 0;
					}
					else
					{
						$hasila1a2c3 = 1;
					}

					//A1-A2 di C4 (Suhu)
					$a1a2c4 = $suhu_jadi[1]-$suhu_jadi[2];
					if ($a1a2c4 <=0)
					{
						$hasila1a2c4 = 0;
					}
					else
					{
						$hasila1a2c4 = 1;
					}

					//A1-A2 di C5 (Ketinggian)
					$a1a2c5 = $ketinggian_jadi[1]-$ketinggian_jadi[2];
					if ($a1a2c5 <=0)
					{
						$hasila1a2c5 = 0;
					}
					else
					{
						$hasila1a2c5 = 1;
					}

					//A1-A2 di C6 (Lereng)
					$a1a2c6 = $lereng_jadi[1]-$lereng_jadi[2];
					if ($a1a2c6 <=0)
					{
						$hasila1a2c6 = 0;
					}
					else
					{
						$hasila1a2c6 = 1;
					}

					//A1-A2 di C7 (Curah Hujan)
					$a1a2c7 = $ch_jadi[1]-$ch_jadi[2];
					if ($a1a2c7 <=0)
					{
						$hasila1a2c7 = 0;
					}
					else
					{
						$hasila1a2c7 = 1;
					}

					//A2-A1 di C1 (Tekstur)
					$a2a1c1 = $tekstur_jadi[2]-$tekstur_jadi[1];
					if ($a2a1c1 <=0)
					{
						$hasila2a1c1 = 0;
					}
					else
					{
						$hasila2a1c1 = 1;
					}

					//A2-A1 C2 PH
					$a2a1c2 = $ph_jadi[2]-$ph_jadi[1];
					if ($a2a1c2 <=0)
					{
						$hasila2a1c2 = 0;
					}
					else
					{
						$hasila2a1c2 = 1;
					}

					//A2-A1 C3 Drainase
					$a2a1c3 = $dr_jadi[2]-$dr_jadi[1];
					if ($a2a1c3 <=0)
					{
						$hasila2a1c3 = 0;
					}
					else
					{
						$hasila2a1c3 = 1;
					}

					//A2-A1 C4 Suhu
					$a2a1c4 = $suhu_jadi[2]-$suhu_jadi[1];
					if ($a2a1c4 <=0)
					{
						$hasila2a1c4 = 0;
					}
					else
					{
						$hasila2a1c4 = 1;
					}

					//A2-A1 C5 Ketinggian
					$a2a1c5 = $ketinggian_jadi[2]-$ketinggian_jadi[1];
					if ($a2a1c5 <=0)
					{
						$hasila2a1c5 = 0;
					}
					else
					{
						$hasila2a1c5 = 1;
					}

					//A2-A1 C6 Lereng
					$a2a1c6 = $lereng_jadi[2]-$lereng_jadi[1];
					if ($a2a1c6 <=0)
					{
						$hasila2a1c6 = 0;
					}
					else
					{
						$hasila2a1c6 = 1;
					}

					//C7 A2-A1 Curah Hujan
					$a2a1c7 = $ch_jadi[2]-$ch_jadi[1];
					if ($a2a1c7 <=0)
					{
						$hasila2a1c7 = 0;
					}
					else
					{
						$hasila2a1c7 = 1;
					}

					//A1-A3 C1 Tekstur
					$a1a3c1 = $tekstur_jadi[1]-$tekstur_jadi[3];
					if ($a1a3c1 <=0)
					{
						$hasila1a3c1 = 0;
					}
					else
					{
						$hasila1a3c1 = 1;
					}

					//A1-A3 C2 PH
					$a1a3c2 = $ph_jadi[1]-$ph_jadi[3];
					if ($a1a3c2 <=0)
					{
						$hasila1a3c2 = 0;
					}
					else
					{
						$hasila1a3c2 = 1;
					}

					//A1-A3 C3 Drainase
					$a1a3c3 = $dr_jadi[1]-$dr_jadi[3];
					if ($a1a3c3 <=0)
					{
						$hasila1a3c3 = 0;
					}
					else
					{
						$hasila1a3c3 = 1;
					}

					//A1-A3 C4 Suhu
					$a1a3c4 = $suhu_jadi[1]-$suhu_jadi[3];
					if ($a1a3c4 <=0)
					{
						$hasila1a3c4 = 0;
					}
					else
					{
						$hasila1a3c4 = 1;
					}

					//A1-A3 C5 Ketinggian
					$a1a3c5 = $ketinggian_jadi[1]-$ketinggian_jadi[3];
					if ($a1a3c5 <=0)
					{
						$hasila1a3c5 = 0;
					}
					else
					{
						$hasila1a3c5 = 1;
					}

					//A1-A3 C6 Lereng
					$a1a3c6 = $lereng_jadi[1]-$lereng_jadi[3];
					if ($a1a3c6 <=0)
					{
						$hasila1a3c6 = 0;
					}
					else
					{
						$hasila1a3c6 = 1;
					}

					//A1-A3 C7 CH
					$a1a3c7 = $ch_jadi[1]-$ch_jadi[3];
					if ($a1a3c7 <=0)
					{
						$hasila1a3c7 = 0;
					}
					else
					{
						$hasila1a3c7 = 1;
					}

					//A3-A1 C1 Tekstur
					$a3a1c1 = $tekstur_jadi[3]-$tekstur_jadi[1];
					if ($a3a1c1 <=0)
					{
						$hasila3a1c1=0;
					}
					else
					{
						$hasila3a1c1=1;
					}

					//A3-A1 C2 PH
					$a3a1c2 = $ph_jadi[3]-$ph_jadi[1];
					if ($a3a1c2 <=0)
					{
						$hasila3a1c2=0;
					}
					else
					{
						$hasila3a1c2=1;
					}

					//A3-A1 C3 Drainase
					$a3a1c3 = $dr_jadi[3]-$dr_jadi[1];
					if ($a3a1c3 <=0)
					{
						$hasila3a1c3=0;
					}
					else
					{
						$hasila3a1c3=1;
					}

					//A3-A1 C4 Suhu
					$a3a1c4 = $suhu_jadi[3]-$suhu_jadi[1];
					if ($a3a1c4 <=0)
					{
						$hasila3a1c4=0;
					}
					else
					{
						$hasila3a1c4=1;
					}

					//A3-A1 C5 Ketinggian
					$a3a1c5 = $ketinggian_jadi[3]-$ketinggian_jadi[1];
					if ($a3a1c5 <=0)
					{
						$hasila3a1c5=0;
					}
					else
					{
						$hasila3a1c5=1;
					}

					//A3-A1 C6 Lereng
					$a3a1c6 = $lereng_jadi[3]-$lereng_jadi[1];
					if ($a3a1c6 <=0)
					{
						$hasila3a1c6=0;
					}
					else
					{
						$hasila3a1c6=1;
					}

					//A3-A1 C7 CH
					$a3a1c7 = $ch_jadi[3]-$ch_jadi[1];
					if ($a3a1c7 <=0)
					{
						$hasila3a1c7=0;
					}
					else
					{
						$hasila3a1c7=1;
					}

					//A1-A4 C1 TEKSTUR
					$a1a4c1 = $tekstur_jadi[1]-$tekstur_jadi[4];
					if ($a1a4c1 <=0)
					{
						$hasila1a4c1=0;
					}
					else
					{
						$hasila1a4c1=1;
					}

					//A1-A4 C2 PH
					$a1a4c2 = $ph_jadi[1]-$ph_jadi[4];
					if ($a1a4c2 <=0)
					{
						$hasila1a4c2=0;
					}
					else
					{
						$hasila1a4c2=1;
					}

					//A1-A4 C3 Drainase
					$a1a4c3 = $dr_jadi[1]-$dr_jadi[4];
					if ($a1a4c3 <=0)
					{
						$hasila1a4c3=0;
					}
					else
					{
						$hasila1a4c3=1;
					}

					//A1-A4 C4 Suhu
					$a1a4c4 = $suhu_jadi[1]-$suhu_jadi[4];
					if ($a1a4c4 <=0)
					{
						$hasila1a4c4=0;
					}
					else
					{
						$hasila1a4c4=1;
					}

					//A1-A4 C5 Ketinggian
					$a1a4c5 = $ketinggian_jadi[1]-$ketinggian_jadi[4];
					if ($a1a4c5 <=0)
					{
						$hasila1a4c5=0;
					}
					else
					{
						$hasila1a4c5=1;
					}

					//C6 Lereng
					$a1a4c6 = $lereng_jadi[1]-$lereng_jadi[4];
					if ($a1a4c6 <=0)
					{
						$hasila1a4c6=0;
					}
					else
					{
						$hasila1a4c6=1;
					}

					//C7 CH
					$a1a4c7 = $ch_jadi[1]-$ch_jadi[4];
					if ($a1a4c7 <=0)
					{

						$hasila1a4c7=0;
					}
					else
					{

						$hasila1a4c7=1;
					}
					?>

					<?php
					$a4a1c1 = $tekstur_jadi[4]-$tekstur_jadi[1];
					if ($a4a1c1 <=0)
					{

						$hasila4a1c1=0;
					}
					else
					{

						$hasila4a1c1=1;
					}

						//C2 PH
					$a4a1c2 = $ph_jadi[4]-$ph_jadi[1];
					if ($a4a1c2 <=0)
					{

						$hasila4a1c2=0;
					}
					else
					{

						$hasila4a1c2=1;
					}

						//C3 Drainase
					$a4a1c3 = $dr_jadi[4]-$dr_jadi[1];
					if ($a4a1c3 <=0)
					{

						$hasila4a1c3=0;
					}
					else
					{

						$hasila4a1c3=1;
					}

						//C4 Suhu
					$a4a1c4 = $suhu_jadi[4]-$suhu_jadi[1];
					if ($a4a1c4 <=0)
					{

						$hasila4a1c4=0;
					}
					else
					{

						$hasila4a1c4=1;
					}

						//C5 Ketinggian
					$a4a1c5 = $ketinggian_jadi[4]-$ketinggian_jadi[1];
					if ($a4a1c5 <=0)
					{

						$hasila4a1c5=0;
					}
					else
					{

						$hasila4a1c5=1;
					}

						//C6 Lereng
					$a4a1c6 = $lereng_jadi[4]-$lereng_jadi[1];
					if ($a4a1c6 <=0)
					{

						$hasila4a1c6=0;
					}
					else
					{

						$hasila4a1c6=1;
					}

						//C7 CH
					$a4a1c7 = $ch_jadi[4]-$ch_jadi[1];
					if ($a4a1c7 <=0)
					{

						$hasila4a1c7=0;
					}
					else
					{

						$hasila4a1c7=1;
					}

						//A1-A5
					$a1a5c1 = $tekstur_jadi[1]-$tekstur_jadi[5];
					if ($a1a5c1 <=0)
					{

						$hasila1a5c1=0;
					}
					else
					{

						$hasila1a5c1=1;
					}

						//C2 PH
					$a1a5c2 = $ph_jadi[1]-$ph_jadi[5];
					if ($a1a5c2 <=0)
					{

						$hasila1a5c2=0;
					}
					else
					{

						$hasila1a5c2=1;
					}

						//C3 Drainase
					$a1a5c3 = $dr_jadi[1]-$dr_jadi[5];
					if ($a1a5c3 <=0)
					{

						$hasila1a5c3=0;
					}
					else
					{

						$hasila1a5c3=1;
					}

						//C4 Suhu
					$a1a5c4 = $suhu_jadi[1]-$suhu_jadi[5];
					if ($a1a5c4 <=0)
					{

						$hasila1a5c4=0;
					}
					else
					{

						$hasila1a5c4=1;
					}

						//C5 Ketinggian
					$a1a5c5 = $ketinggian_jadi[1]-$ketinggian_jadi[5];
					if ($a1a5c5 <=0)
					{

						$hasila1a5c5=0;
					}
					else
					{

						$hasila1a5c5=1;
					}

						//C6 Lereng
					$a1a5c6 = $lereng_jadi[1]-$lereng_jadi[5];
					if ($a1a5c6 <=0)
					{

						$hasila1a5c6=0;
					}
					else
					{

						$hasila1a5c6=1;
					}

						//C7 CH
					$a1a5c7 = $ch_jadi[1]-$ch_jadi[5];
					if ($a1a5c7 <=0)
					{

						$hasila1a5c7=0;
					}
					else
					{

						$hasila1a5c7=1;
					}

						//A5-A1
					$a5a1c1 = $tekstur_jadi[5]-$tekstur_jadi[1];
					if ($a5a1c1 <=0)
					{

						$hasila5a1c1=0;
					}
					else
					{

						$hasila5a1c1=1;
					}

						//C2 PH
					$a5a1c2 = $ph_jadi[5]-$ph_jadi[1];
					if ($a5a1c2 <=0)
					{

						$hasila5a1c2=0;
					}
					else
					{

						$hasila5a1c2=1;
					}

						//C3 Drainase
					$a5a1c3 = $dr_jadi[5]-$dr_jadi[1];
					if ($a5a1c3 <=0)
					{

						$hasila5a1c3=0;
					}
					else
					{

						$hasila5a1c3=1;
					}

						//C4 Suhu
					$a5a1c4 = $suhu_jadi[5]-$suhu_jadi[1];
					if ($a5a1c4 <=0)
					{

						$hasila5a1c4=0;
					}
					else
					{

						$hasila5a1c4=1;
					}

						//C5 Ketinggian
					$a5a1c5 = $ketinggian_jadi[5]-$ketinggian_jadi[1];
					if ($a5a1c5 <=0)
					{

						$hasila5a1c5=0;
					}
					else
					{

						$hasila5a1c5=1;
					}

						//C6 Lereng
					$a5a1c6 = $lereng_jadi[5]-$lereng_jadi[1];
					if ($a5a1c6 <=0)
					{

						$hasila5a1c6=0;
					}
					else
					{

						$hasila5a1c6=1;
					}

						//C7 cH
					$a5a1c7 = $ch_jadi[5]-$ch_jadi[1];
					if ($a5a1c7 <=0)
					{

						$hasila5a1c7=0;
					}
					else
					{

						$hasila5a1c7=1;
					}

						//A2-A3
					$a2a3c1 = $tekstur_jadi[2]-$tekstur_jadi[3];
					if ($a2a3c1 <=0)
					{

						$hasila2a3c1 = 0;
					}
					else
					{

						$hasila2a3c1 = 1;
					}

						//C2 PH
					$a2a3c2 = $ph_jadi[2]-$ph_jadi[3];
					if ($a2a3c2 <=0)
					{

						$hasila2a3c2 = 0;
					}
					else
					{

						$hasila2a3c2 = 1;
					}

						//C3 Drainase
					$a2a3c3 = $dr_jadi[2]-$dr_jadi[3];
					if ($a2a3c3 <=0)
					{

						$hasila2a3c3 = 0;
					}
					else
					{

						$hasila2a3c3 = 1;
					}

						//C4 Suhu
					$a2a3c4 = $suhu_jadi[2]-$suhu_jadi[3];
					if ($a2a3c4 <=0)
					{

						$hasila2a3c4 = 0;
					}
					else
					{

						$hasila2a3c4 = 1;
					}

						//C5 Ketinggian
					$a2a3c5 = $ketinggian_jadi[2]-$ketinggian_jadi[3];
					if ($a2a3c5 <=0)
					{

						$hasila2a3c5 = 0;
					}
					else
					{

						$hasila2a3c5 = 1;
					}

						//C6 Lereng
					$a2a3c6 = $lereng_jadi[2]-$lereng_jadi[3];
					if ($a2a3c6 <=0)
					{

						$hasila2a3c6 = 0;
					}
					else
					{

						$hasila2a3c6 = 1;
					}

						//C7 cH
					$a2a3c7 = $ch_jadi[2]-$ch_jadi[3];
					if ($a2a3c7 <=0)
					{

						$hasila2a3c7 = 0;
					}
					else
					{

						$hasila2a3c7 = 1;
					}

						//A3-A2
					$a3a2c1 = $tekstur_jadi[3]-$tekstur_jadi[2];
					if ($a3a2c1 <=0)
					{

						$hasila3a2c1 = 0;
					}
					else
					{

						$hasila3a2c1 = 1;
					}

						//C2 PH
					$a3a2c2 = $ph_jadi[3]-$ph_jadi[2];
					if ($a3a2c2 <=0)
					{

						$hasila3a2c2 = 0;
					}
					else
					{

						$hasila3a2c2 = 1;
					}

						//C3 Drainase
					$a3a2c3 = $dr_jadi[3]-$dr_jadi[2];
					if ($a3a2c3 <=0)
					{

						$hasila3a2c3 = 0;
					}
					else
					{

						$hasila3a2c3 = 1;
					}

						//C4 Suhu
					$a3a2c4 = $suhu_jadi[3]-$suhu_jadi[2];
					if ($a3a2c4 <=0)
					{

						$hasila3a2c4 = 0;
					}
					else
					{

						$hasila3a2c4 = 1;
					}

						//C5 Ketinggian
					$a3a2c5 = $ketinggian_jadi[3]-$ketinggian_jadi[2];
					if ($a3a2c5 <=0)
					{

						$hasila3a2c5 = 0;
					}
					else
					{

						$hasila3a2c5 = 1;
					}
						//C6 Lereng
					$a3a2c6 = $lereng_jadi[3]-$lereng_jadi[2];
					if ($a3a2c6 <=0)
					{

						$hasila3a2c6 = 0;
					}
					else
					{

						$hasila3a2c6 = 1;
					}

						//C7 cH
					$a3a2c7 = $ch_jadi[3]-$ch_jadi[2];
					if ($a3a2c7 <=0)
					{

						$hasila3a2c7 = 0;
					}
					else
					{

						$hasila3a2c7 = 1;
					}

						//A2-A4
					$a2a4c1 = $tekstur_jadi[2]-$tekstur_jadi[4];
					if ($a2a4c1 <=0)
					{

						$hasila2a4c1 = 0;
					}
					else
					{

						$hasila2a4c1 = 1;
					}

						//C2 PH
					$a2a4c2 = $ph_jadi[2]-$ph_jadi[4];
					if ($a2a4c2 <=0)
					{

						$hasila2a4c2 = 0;
					}
					else
					{

						$hasila2a4c2 = 1;
					}

						//C3 Drainase
					$a2a4c3 = $dr_jadi[2]-$dr_jadi[4];
					if ($a2a4c3 <=0)
					{

						$hasila2a4c3 = 0;
					}
					else
					{

						$hasila2a4c3 = 1;
					}

						//C4 Suhu
					$a2a4c4 = $suhu_jadi[2]-$suhu_jadi[4];
					if ($a2a4c4 <=0)
					{

						$hasila2a4c4 = 0;
					}
					else
					{

						$hasila2a4c4 = 1;
					}

						//C5 Ketinggian
					$a2a4c5 = $ketinggian_jadi[2]-$ketinggian_jadi[4];
					if ($a2a4c5 <=0)
					{

						$hasila2a4c5 = 0;
					}
					else
					{

						$hasila2a4c5 = 1;
					}

						//C6 Lereng
					$a2a4c6 = $lereng_jadi[2]-$lereng_jadi[4];
					if ($a2a4c6 <=0)
					{

						$hasila2a4c6 = 0;
					}
					else
					{

						$hasila2a4c6 = 1;
					}

						//C7 cH
					$a2a4c7 = $ch_jadi[2]-$ch_jadi[4];
					if ($a2a4c7 <=0)
					{

						$hasila2a4c7 = 0;
					}
					else
					{

						$hasila2a4c7 = 1;
					}

						//A4-S1
					$a4a2c1 = $tekstur_jadi[4]-$tekstur_jadi[2];
					if ($a4a2c1 <=0)
					{

						$hasila4a2c1 = 0;
					}
					else
					{

						$hasila4a2c1 = 1;
					}

						//C2 PH
					$a4a2c2 = $ph_jadi[4]-$ph_jadi[2];
					if ($a4a2c2 <=0)
					{

						$hasila4a2c2 = 0;
					}
					else
					{

						$hasila4a2c2 = 1;
					}

						//C3 Drainase
					$a4a2c3 = $dr_jadi[4]-$dr_jadi[2];
					if ($a4a2c3 <=0)
					{

						$hasila4a2c3 = 0;
					}
					else
					{

						$hasila4a2c3 = 1;
					}

						//C4 Suhu
					$a4a2c4 = $suhu_jadi[4]-$suhu_jadi[2];
					if ($a4a2c4 <=0)
					{

						$hasila4a2c4 = 0;
					}
					else
					{

						$hasila4a2c4 = 1;
					}

						//C5 Ketinggian
					$a4a2c5 = $ketinggian_jadi[4]-$ketinggian_jadi[2];
					if ($a4a2c5 <=0)
					{

						$hasila4a2c5 = 0;
					}
					else
					{

						$hasila4a2c5 = 1;
					}

						//C6 Lereng
					$a4a2c6 = $lereng_jadi[4]-$lereng_jadi[2];
					if ($a4a2c6 <=0)
					{

						$hasila4a2c6 = 0;
					}
					else
					{

						$hasila4a2c6 = 1;
					}

						//C7 cH
					$a4a2c7 = $ch_jadi[4]-$ch_jadi[2];
					if ($a4a2c7 <=0)
					{

						$hasila4a2c7 = 0;
					}
					else
					{

						$hasila4a2c7 = 1;
					}

						//A2-A5
					$a2a5c1 = $tekstur_jadi[2]-$tekstur_jadi[5];
					if ($a2a5c1 <=0)
					{

						$hasila2a5c1 = 0;
					}
					else
					{

						$hasila2a5c1 = 1;
					}

						//C2 PH
					$a2a5c2 = $ph_jadi[2]-$ph_jadi[5];
					if ($a2a5c2 <=0)
					{

						$hasila2a5c2 = 0;
					}
					else
					{

						$hasila2a5c2 = 1;
					}

						//C3 Drainase
					$a2a5c3 = $dr_jadi[2]-$dr_jadi[5];
					if ($a2a5c3 <=0)
					{

						$hasila2a5c3 = 0;
					}
					else
					{

						$hasila2a5c3 = 1;
					}

						//C4 Suhu
					$a2a5c4 = $suhu_jadi[2]-$suhu_jadi[5];
					if ($a2a5c4 <=0)
					{

						$hasila2a5c4 = 0;
					}
					else
					{

						$hasila2a5c4 = 1;
					}

						//C5 Ketinggian
					$a2a5c5 = $ketinggian_jadi[2]-$ketinggian_jadi[5];
					if ($a2a5c5 <=0)
					{

						$hasila2a5c5 = 0;
					}
					else
					{

						$hasila2a5c5 = 1;
					}

						//C6 Lereng
					$a2a5c6 = $lereng_jadi[2]-$lereng_jadi[5];
					if ($a2a5c6 <=0)
					{

						$hasila2a5c6 = 0;
					}
					else
					{

						$hasila2a5c6 = 1;
					}

						//C7 cH
					$a2a5c7 = $ch_jadi[2]-$ch_jadi[5];
					if ($a2a5c7 <=0)
					{

						$hasila2a5c7 = 0;
					}
					else
					{

						$hasila2a5c7 = 1;
					}

						//A5-A2
					$a5a2c1 = $tekstur_jadi[5]-$tekstur_jadi[2];
					if ($a5a2c1 <=0)
					{

						$hasila5a2c1 = 0;
					}
					else
					{

						$hasila5a2c1 = 1;
					}

						//C2 PH
					$a5a2c2 = $ph_jadi[5]-$ph_jadi[2];
					if ($a5a2c2 <=0)
					{

						$hasila5a2c2 = 0;
					}
					else
					{

						$hasila5a2c2 = 1;
					}

						//C3 Drainase
					$a5a2c3 = $dr_jadi[5]-$dr_jadi[2];
					if ($a5a2c3 <=0)
					{

						$hasila5a2c3 = 0;
					}
					else
					{

						$hasila5a2c3 = 1;
					}

						//C4 Suhu
					$a5a2c4 = $suhu_jadi[5]-$suhu_jadi[2];
					if ($a5a2c4 <=0)
					{

						$hasila5a2c4 = 0;
					}
					else
					{

						$hasila5a2c4 = 1;
					}

						//C5 Ketinggian
					$a5a2c5 = $ketinggian_jadi[5]-$ketinggian_jadi[2];
					if ($a5a2c5 <=0)
					{

						$hasila5a2c5 = 0;
					}
					else
					{

						$hasila5a2c5 = 1;
					}

						//C6 Lereng
					$a5a2c6 = $lereng_jadi[5]-$lereng_jadi[2];
					if ($a5a2c6 <=0)
					{

						$hasila5a2c6 = 0;
					}
					else
					{

						$hasila5a2c6 = 1;
					}

						//C7 cH
					$a5a2c7 = $ch_jadi[5]-$ch_jadi[2];
					if ($a5a2c7 <=0)
					{

						$hasila5a2c7 = 0;
					}
					else
					{

						$hasila5a2c7 = 1;
					}

						//A3-A4
					$a3a4c1 = $tekstur_jadi[3]-$tekstur_jadi[4];
					if ($a3a4c1 <=0)
					{

						$hasila3a4c1 = 0;
					}
					else
					{

						$hasila3a4c1 = 1;
					}

						//C2 PH
					$a3a4c2 = $ph_jadi[3]-$ph_jadi[4];
					if ($a3a4c2 <=0)
					{

						$hasila3a4c2 = 0;
					}
					else
					{

						$hasila3a4c2 = 1;
					}

						//C3 Drainase
					$a3a4c3 = $dr_jadi[3]-$dr_jadi[4];
					if ($a3a4c3 <=0)
					{

						$hasila3a4c3 = 0;
					}
					else
					{

						$hasila3a4c3 = 1;
					}

						//C4 Suhu
					$a3a4c4 = $suhu_jadi[3]-$suhu_jadi[4];
					if ($a3a4c4 <=0)
					{

						$hasila3a4c4 = 0;
					}
					else
					{

						$hasila3a4c4 = 1;
					}

						//C5 Ketinggian
					$a3a4c5 = $ketinggian_jadi[3]-$ketinggian_jadi[4];
					if ($a3a4c5 <=0)
					{

						$hasila3a4c5 = 0;
					}
					else
					{

						$hasila3a4c5 = 1;
					}

						//C6 Lereng
					$a3a4c6 = $lereng_jadi[3]-$lereng_jadi[4];
					if ($a3a4c6 <=0)
					{

						$hasila3a4c6 = 0;
					}
					else
					{

						$hasila3a4c6 = 1;
					}

						//C7 cH
					$a3a4c7 = $ch_jadi[3]-$ch_jadi[4];
					if ($a3a4c7 <=0)
					{

						$hasila3a4c7 = 0;
					}
					else
					{

						$hasila3a4c7 = 1;
					}

						//A4-A3
					$a4a3c1 = $tekstur_jadi[4]-$tekstur_jadi[3];
					if ($a4a3c1 <=0)
					{
						$hasila4a3c1 = 0;
					}
					else
					{

						$hasila4a3c1 = 1;
					}

						//C2 PH
					$a4a3c2 = $ph_jadi[4]-$ph_jadi[3];
					if ($a4a3c2 <=0)
					{

						$hasila4a3c2 = 0;
					}
					else
					{

						$hasila4a3c2 = 1;
					}

						//C3 Drainase
					$a4a3c3 = $dr_jadi[4]-$dr_jadi[3];
					if ($a4a3c3 <=0)
					{

						$hasila4a3c3 = 0;
					}
					else
					{

						$hasila4a3c3 = 1;
					}

						//C4 Suhu
					$a4a3c4 = $suhu_jadi[4]-$suhu_jadi[3];
					if ($a4a3c4 <=0)
					{

						$hasila4a3c4 = 0;
					}
					else
					{

						$hasila4a3c4 = 1;
					}

						//C5 Ketinggian
					$a4a3c5 = $ketinggian_jadi[4]-$ketinggian_jadi[3];
					if ($a4a3c5 <=0)
					{

						$hasila4a3c5 = 0;
					}
					else
					{

						$hasila4a3c5 = 1;
					}

						//C6 Lereng
					$a4a3c6 = $lereng_jadi[4]-$lereng_jadi[3];
					if ($a4a3c6 <=0)
					{

						$hasila4a3c6 = 0;
					}
					else
					{

						$hasila4a3c6 = 1;
					}

						//C7 cH
					$a4a3c7 = $ch_jadi[4]-$ch_jadi[3];
					if ($a4a3c7 <=0)
					{

						$hasila4a3c7 = 0;
					}
					else
					{

						$hasila4a3c7 = 1;
					}

						//A3-A5
					$a3a5c1 = $tekstur_jadi[3]-$tekstur_jadi[5];
					if ($a3a5c1 <=0)
					{

						$hasila3a5c1 = 0;
					}
					else
					{

						$hasila3a5c1 = 1;
					}

						//C2 PH
					$a3a5c2 = $ph_jadi[3]-$ph_jadi[5];
					if ($a3a5c2 <=0)
					{

						$hasila3a5c2 = 0;
					}
					else
					{

						$hasila3a5c2 = 1;
					}

						//C3 Drainase
					$a3a5c3 = $dr_jadi[3]-$dr_jadi[5];
					if ($a3a5c3 <=0)
					{

						$hasila3a5c3 = 0;
					}
					else
					{

						$hasila3a5c3 = 1;
					}

						//C4 Suhu
					$a3a5c4 = $suhu_jadi[3]-$suhu_jadi[5];
					if ($a3a5c4 <=0)
					{

						$hasila3a5c4 = 0;
					}
					else
					{

						$hasila3a5c4 = 1;
					}

						//C5 Ketinggian
					$a3a5c5 = $ketinggian_jadi[3]-$ketinggian_jadi[5];
					if ($a3a5c5 <=0)
					{

						$hasila3a5c5 = 0;
					}
					else
					{

						$hasila3a5c5 = 1;
					}

						//C6 Lereng
					$a3a5c6 = $lereng_jadi[3]-$lereng_jadi[5];
					if ($a3a5c6 <=0)
					{

						$hasila3a5c6 = 0;
					}
					else
					{

						$hasila3a5c6 = 1;
					}

						//C7 cH
					$a3a5c7 = $ch_jadi[3]-$ch_jadi[5];
					if ($a3a5c7 <=0)
					{

						$hasila3a5c7 = 0;
					}
					else
					{

						$hasila3a5c7 = 1;
					}

						//A5-A3
					$a5a3c1 = $tekstur_jadi[5]-$tekstur_jadi[3];
					if ($a5a3c1 <=0)
					{

						$hasila5a3c1 = 0;
					}
					else
					{

						$hasila5a3c1 = 1;
					}

						//C2 PH
					$a5a3c2 = $ph_jadi[5]-$ph_jadi[3];
					if ($a5a3c2 <=0)
					{

						$hasila5a3c2 = 0;
					}
					else
					{

						$hasila5a3c2 = 1;
					}

						//C3 Drainase
					$a5a3c3 = $dr_jadi[5]-$dr_jadi[3];
					if ($a5a3c3 <=0)
					{

						$hasila5a3c3 = 0;
					}
					else
					{

						$hasila5a3c3 = 1;
					}

						//C4 Suhu
					$a5a3c4 = $suhu_jadi[5]-$suhu_jadi[3];
					if ($a5a3c4 <=0)
					{

						$hasila5a3c4 = 0;
					}
					else
					{

						$hasila5a3c4 = 1;
					}

						//C5 Ketinggian
					$a5a3c5 = $ketinggian_jadi[5]-$ketinggian_jadi[3];
					if ($a5a3c5 <=0)
					{

						$hasila5a3c5 = 0;
					}
					else
					{

						$hasila5a3c5 = 1;
					}

						//C6 Lereng
					$a5a3c6 = $lereng_jadi[5]-$lereng_jadi[3];
					if ($a5a3c6 <=0)
					{

						$hasila5a3c6 = 0;
					}
					else
					{

						$hasila5a3c6 = 1;
					}

						//C7 cH
					$a5a3c7 = $ch_jadi[5]-$ch_jadi[3];
					if ($a5a3c7 <=0)
					{

						$hasila5a3c7 = 0;
					}
					else
					{

						$hasila5a3c7 = 1;
					}

						//A4-A5
					$a4a5c1 = $tekstur_jadi[4]-$tekstur_jadi[5];
					if ($a4a5c1 <=0)
					{

						$hasila4a5c1 = 0;
					}
					else
					{

						$hasila4a5c1 = 1;
					}

						//C2 PH
					$a4a5c2 = $ph_jadi[4]-$ph_jadi[5];
					if ($a4a5c2 <=0)
					{

						$hasila4a5c2 = 0;
					}
					else
					{

						$hasila4a5c2 = 1;
					}

						//C3 Drainase
					$a4a5c3 = $dr_jadi[4]-$dr_jadi[5];
					if ($a4a5c3 <=0)
					{

						$hasila4a5c3 = 0;
					}
					else
					{

						$hasila4a5c3 = 1;
					}

						//C4 Suhu
					$a4a5c4 = $suhu_jadi[4]-$suhu_jadi[5];
					if ($a4a5c4 <=0)
					{

						$hasila4a5c4 = 0;
					}
					else
					{

						$hasila4a5c4 = 1;
					}

						//C5 Ketinggian
					$a4a5c5 = $ketinggian_jadi[4]-$ketinggian_jadi[5];
					if ($a4a5c5 <=0)
					{

						$hasila4a5c5 = 0;
					}
					else
					{

						$hasila4a5c5 = 1;
					}

						//C6 Lereng
					$a4a5c6 = $lereng_jadi[4]-$lereng_jadi[5];
					if ($a4a5c6 <=0)
					{

						$hasila4a5c6 = 0;
					}
					else
					{

						$hasila4a5c6 = 1;
					}

						//C7 cH
					$a4a5c7 = $ch_jadi[4]-$ch_jadi[5];
					if ($a4a5c7 <=0)
					{

						$hasila4a5c7 = 0;
					}
					else
					{

						$hasila4a5c7 = 1;
					}

						//A5-A4
					$a5a4c1 = $tekstur_jadi[5]-$tekstur_jadi[4];
					if ($a5a4c1 <=0)
					{

						$hasila5a4c1 = 0;
					}
					else
					{

						$hasila5a4c1 = 1;
					}

						//C2 PH
					$a5a4c2 = $ph_jadi[5]-$ph_jadi[4];
					if ($a5a4c2 <=0)
					{

						$hasila5a4c2 = 0;
					}
					else
					{

						$hasila5a4c2 = 1;
					}

						//C3 Drainase
					$a5a4c3 = $dr_jadi[5]-$dr_jadi[4];
					if ($a5a4c3 <=0)
					{

						$hasila5a4c3 = 0;
					}
					else
					{

						$hasila5a4c3 = 1;
					}

						//C4 Suhu
					$a5a4c4 = $suhu_jadi[5]-$suhu_jadi[4];
					if ($a5a4c4 <=0)
					{

						$hasila5a4c4 = 0;
					}
					else
					{

						$hasila5a4c4 = 1;
					}

						//C5 Ketinggian
					$a5a4c5 = $ketinggian_jadi[5]-$ketinggian_jadi[4];
					if ($a5a4c5 <=0)
					{

						$hasila5a4c5 = 0;
					}
					else
					{

						$hasila5a4c5 = 1;
					}

						//C6 Lereng
					$a5a4c6 = $lereng_jadi[5]-$lereng_jadi[4];
					if ($a5a4c6 <=0)
					{

						$hasila5a4c6 = 0;
					}
					else
					{

						$hasila5a4c6 = 1;
					}

						//C7 cH
					$a5a4c7 = $ch_jadi[5]-$ch_jadi[4];
					if ($a5a4c7 <=0)
					{

						$hasila5a4c7 = 0;
					}
					else
					{

						$hasila5a4c7 = 1;
					}

					//Menghitung Index Prefensi Multikriteria
					$A12 = ($hasila1a2c1+$hasila1a2c2+$hasila1a2c3+$hasila1a2c4+$hasila1a2c5+$hasila1a2c6+$hasila1a2c7)/7;
					number_format($A12,2);

					$A13 = ($hasila1a3c1+$hasila1a3c2+$hasila1a3c3+$hasila1a3c4+$hasila1a3c5+$hasila1a3c6+$hasila1a3c7)/7;
					number_format($A13,2);

					$A14 = ($hasila1a4c1+$hasila1a4c2+$hasila1a4c3+$hasila1a4c4+$hasila1a4c5+$hasila1a4c6+$hasila1a4c7)/7;
					number_format($A14,2);

					$A15 = ($hasila1a5c1+$hasila1a5c2+$hasila1a5c3+$hasila1a5c4+$hasila1a5c5+$hasila1a5c6+$hasila1a5c7)/7;
					number_format($A15,2);

					$A21 = ($hasila2a1c1+$hasila2a1c2+$hasila2a1c3+$hasila2a1c4+$hasila2a1c5+$hasila2a1c6+$hasila2a1c7)/7;
					number_format($A21,2);

					$A23 = ($hasila2a3c1+$hasila2a3c2+$hasila2a3c3+$hasila2a3c4+$hasila2a3c5+$hasila2a3c6+$hasila2a3c7)/7;
					number_format($A23,2);

					$A24 = ($hasila2a4c1+$hasila2a4c2+$hasila2a4c3+$hasila2a4c4+$hasila2a4c5+$hasila2a4c6+$hasila2a4c7)/7;
					number_format($A24,2);

					$A25 = ($hasila2a5c1+$hasila2a5c2+$hasila2a5c3+$hasila2a5c4+$hasila2a5c5+$hasila2a5c6+$hasila2a5c7)/7;
					number_format($A25,2);

					$A31 = ($hasila3a1c1+$hasila3a1c2+$hasila3a1c3+$hasila3a1c4+$hasila3a1c5+$hasila3a1c6+$hasila3a1c7);
					number_format($A31,2);

					$A32 = ($hasila3a2c1+$hasila3a2c2+$hasila3a2c3+$hasila3a2c4+$hasila3a2c5+$hasila3a2c6+$hasila3a2c7)/7;
					number_format($A32,2);

					$A34 = ($hasila3a4c1+$hasila3a4c2+$hasila3a4c3+$hasila3a4c4+$hasila3a4c5+$hasila3a4c6+$hasila3a4c7)/7;
					number_format($A34,2);

					$A35 = ($hasila3a5c1+$hasila3a5c2+$hasila3a5c3+$hasila3a5c4+$hasila3a5c5+$hasila3a5c6+$hasila3a5c7)/7;
					number_format($A35,2);

					$A41 = ($hasila4a1c1+$hasila4a1c2+$hasila4a1c3+$hasila4a1c4+$hasila4a1c5+$hasila4a1c6+$hasila4a1c7)/7;
					number_format($A41,2);

					$A42 = ($hasila4a2c1+$hasila4a2c2+$hasila4a2c3+$hasila4a2c4+$hasila4a2c5+$hasila4a2c6+$hasila4a2c7)/7;
					number_format($A42,2);

					$A43 = ($hasila4a3c1+$hasila4a3c2+$hasila4a3c3+$hasila4a3c4+$hasila4a3c5+$hasila4a3c6+$hasila4a3c7)/7;
					number_format($A43,2);

					$A45 = ($hasila4a5c1+$hasila4a5c2+$hasila4a5c3+$hasila4a5c4+$hasila4a5c5+$hasila4a5c6+$hasila4a5c7)/7;
					number_format($A45,2);

					$A51 = ($hasila5a1c1+$hasila5a1c2+$hasila5a1c3+$hasila5a1c4+$hasila5a1c5+$hasila5a1c6+$hasila5a1c7)/7;
					number_format($A51,2);

					$A52 = ($hasila5a2c1+$hasila5a2c2+$hasila5a2c3+$hasila5a2c4+$hasila5a2c5+$hasila5a2c6+$hasila5a2c7)/7;
					number_format($A52,2);

					$A53 = ($hasila5a3c1+$hasila5a3c2+$hasila5a3c3+$hasila5a3c4+$hasila5a3c5+$hasila5a3c6+$hasila5a3c7)/7;
					number_format($A53,2);

					$A54 = ($hasila5a4c1+$hasila5a4c2+$hasila5a4c3+$hasila5a4c4+$hasila5a4c5+$hasila5a4c6+$hasila5a4c7)/7;
					number_format($A54,2);
					?>

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

									<?php
								//Leaving Flow
									$AL1 = ($A12+$A13+$A14+$A15)/4;
									$AL2 = ($A21+$A23+$A24+$A25)/4;
									$AL3 = ($A31+$A32+$A34+$A35)/4;
									$AL4 = ($A41+$A42+$A43+$A45)/4;
									$AL5 = ($A51+$A52+$A53+$A54)/4;

								//Entering Flow
									$AE1 = ($A21+$A31+$A41+$A51)/4;
									$AE2 = ($A12+$A32+$A42+$A52)/4;
									$AE3 = ($A13+$A23+$A43+$A53)/4;
									$AE4 = ($A14+$A24+$A34+$A54)/4;
									$AE5 = ($A15+$A25+$A35+$A45)/4;

								//NetFlow
									$AN1 = $AL1 - $AE1;
									$AN2 = $AL2 - $AE2;
									$AN3 = $AL3 - $AE3;
									$AN4 = $AL4 - $AE4;
									$AN5 = $AL5 - $AE5;

									$AL = array($AL1,$AL2,$AL3,$AL4,$AL5);
									$AE = array($AE1,$AE2,$AE3,$AE4,$AE5);
									$AN = array($AN1,$AN2,$AN3,$AN4,$AN5);

									$jumlah=count($AN);
									for($x=0;$x<$jumlah;$x++)
									{
										$leavingflow = $AL[$x];
										$enteringflow = $AE[$x];
										$netflow = $AN[$x];
										?>
										<tr>
											<td>
												<?php
											//echo $tanaman;
												$t = "Tanaman".$x;
												if($t == 'Tanaman0')
												{
													echo "Lengkuas";
												}
												else if($t == 'Tanaman1')
												{
													echo "Jahe";
												}
												else if($t == 'Tanaman2')
												{
													echo "Kunyit";
												}
												else if($t == 'Tanaman3')
												{
													echo "Kencur";
												}
												else
												{
													echo "Temulawak";
												}
												?>
											</td>
											<td> <?php echo number_format($leavingflow,2); ?> </td>
											<td> <?php echo number_format($enteringflow,2); ?> </td>
											<td> <?php echo number_format($netflow,2); ?> </td>
										</tr>
									</tbody>
									<?php
								}
								?>
							</table>
						</div>
						<div class="col-lg-6">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3"><center> HASIL MENURUT NILAI TERTINGGI </center></th>
									</tr>
									<tr>
										<th><center> Alamat </center></th>
										<th><center> Jenis Tanaman </center></th>
										<th><center> Nilai Net Flow </center></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<center> <?php echo $data['alamat'];?> </center>
										</td>
										<td>
											<?php
											$maks = max($AN);

											//$jenis_tanaman=[];
											if($maks<=0)
											{
												$jenis_tanaman []= "-";
											}
											if($maks==$AN1)
											{
												$jenis_tanaman []= "Lengkuas";
											}
											if($maks==$AN2)
											{
												$jenis_tanaman []= "Jahe";
											}
											if($maks==$AN3)
											{
												$jenis_tanaman []= "Kunyit";
											}
											if($maks==$AN4)
											{
												$jenis_tanaman []= "Kencur";
											}
											if($maks==$AN5)
											{
												$jenis_tanaman []= "Temulawak";
											}



											//
											?>
										<!--	<?php foreach ($jenis_tanaman as $key => $AN) {
												echo "<center>".$AN."</center>";
											} ?>-->

											<?php
											for ($i=0; $i < count($jenis_tanaman) ; $i++) {
												//INI ERROR NYA
												echo $jenis_tanaman[$i]."<br>";
												# code...
											}
											?>

										</td>
										<td>
											<center>
												<?php
												echo number_format($maks,2);
												?>
											</center>
										</td>
									</tr>
								</tbody>
							</table>

							<?php
							include "koneksi.php";
							$sql = mysqli_query($connect,"SELECT * FROM tb_hasil WHERE idalamat=$idalamat");
							$hasil = mysqli_fetch_array($sql);
							$id_alamat = $hasil['idalamat'];

							if($id_alamat==$idalamat)
							{
								?>
								<a href="?page=rekap"><input type="button" value="Hasil" class="btn btn-success"></a>
								<a href="?page=lahan"><input type="button" value="Kembali" class="btn btn-warning"></a>
								<?php
							}
							else
							{
								?>
								<form method="post" action="">

									<?php

									//echo $jenis_tanaman[2];

									//JIKA TANAMAN 2

									//JIKA TANAMAN 3
									if(!empty($jenis_tanaman[2])){
										$total_tanaman = $jenis_tanaman[0]."<BR>".$jenis_tanaman[1]."<BR>".$jenis_tanaman[2];
									}
									else if (!empty($jenis_tanaman[1])) {
										$total_tanaman = $jenis_tanaman[0]."<BR>".$jenis_tanaman[1];

									}
									//JIKA TANAMAN 1
									else{
										$total_tanaman = $jenis_tanaman[0];
									}

									echo $total_tanaman."<br>";

									?>

									<input type="hidden" name="idalamat" value="<?php echo $idalamat;?>">
									<input type="hidden" name="nilai" value="<?php echo $maks;?>" readonly>
									<input type="hidden" name="jenistanaman" value="<?php echo $total_tanaman;?>" readonly>
									<input type="submit" value="Input Hasil" class="btn btn-primary" name="input">
									<a href="?page=lahan"><input type="button" value="Kembali" class="btn btn-warning"></a>
								</form>
								<?php
							}
							?>
						</div>
					</div>
				</div> <br><br>
			</div>
		</div>
	</div>
	
<?php
if(isset($_POST['input']))
{
	include "koneksi.php";
	$idalamat = $_POST['idalamat'];
	$nilai = $_POST['nilai'];
	$jenis_tanaman = $_POST['jenistanaman'];

	$input = mysqli_query($connect,"INSERT INTO tb_hasil VALUES(
		'',
		'$idalamat',
		'$nilai',
		'$jenis_tanaman'
	)");

	echo $input;
	//exit();

	if($input)
	{
		echo "<script> alert('Data perhitungan berhasil disimpan ...');
		document.location='?page=rekap' </script>";
	}
	else
	{
		echo "<script> alert('Gagal ...'); </script>";
	}
}
?>
