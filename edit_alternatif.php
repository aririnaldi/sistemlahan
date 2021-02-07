<?php
include "koneksi.php";

@$update = $_POST['update'];
@$hapus = $_POST['hapus'];

$id = $_GET['id'];
	
$query = mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE kode = '$id'");
while ($hasil = mysqli_fetch_array($query))
	{
?>
<section class="content">
	<div class="row clearfix">
		<div class="col-lg-2">
			&nbsp;
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<div class="card">
				
				<div class="header font-bold col-teal" style="text-align: center; font-size: 25px">
					EDIT ALTERNATIF TANAMAN
				</div>
				
				<div class="body">
					<form method="post">
						<input type="hidden" id="kode" class="form-control" name="kode" value="<?php echo $hasil['kode']; ?>">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama_tanaman">Nama Tanaman</label>
								<div class="form-line">
									<input type="text" id="nama_tanaman" class="form-control" name="nama_tanaman" value="<?php echo $hasil['nama_tanaman']; ?>">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="tekstur">Tekstur Tanah</label>
								<div class="form-line">
									<input type="text" id="tekstur" class="form-control" name="tekstur" value="<?php echo $hasil['tekstur']; ?>">
								</div>
							</div>
						</div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="ph_min">pH Minimum</label>
                                    <div class="form-line">
                                        <input type="text" id="ph_min" class="form-control" name="ph_min"  value="<?php echo $hasil['ph_min']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="ph_max">pH Maksimum</label>
                                    <div class="form-line">
                                        <input type="text" id="ph_max" class="form-control" name="ph_max" value="<?php echo $hasil['ph_max']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="form-group">
                                 <label for="drainase">Drainase</label>
                                     <div class="form-line">
                                        <input type="text" id="drainase" class="form-control" name="drainase" value="<?php echo $hasil['drainase']; ?>">
                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="suhu_min">Suhu Minimum</label>
                                    <div class="form-line">
                                        <input type="number" id="suhu_min" class="form-control" name="suhu_min" value="<?php echo $hasil['suhu_min']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="suhu_max">Suhu Maksimum</label>
                                    <div class="form-line">
                                        <input type="number" id="suhu_max" class="form-control" name="suhu_max" value="<?php echo $hasil['suhu_max']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="ketinggian_min">Ketinggian Minimum</label>
                                    <div class="form-line">
                                        <input type="number" id="ketinggian_min" class="form-control" name="ketinggian_min" value="<?php echo $hasil['ketinggian_min']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="ketinggian_max">Ketinggian Maksimum</label>
                                    <div class="form-line">
                                        <input type="number" id="ketinggian_max" class="form-control" name="ketinggian_max" value="<?php echo $hasil['ketinggian_max']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="lereng_min">Lereng Minimum</label>
                                    <div class="form-line">
                                        <input type="number" id="lereng_min" class="form-control" name="lereng_min" value="<?php echo $hasil['lereng_min']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="lereng_max">Lereng Maksimum</label>
                                    <div class="form-line">
                                        <input type="number" id="lereng_max" class="form-control" name="lereng_max" value="<?php echo $hasil['lereng_max']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="ch_min">Curah Hujan Minimum</label>
                                <div class="form-line">
                                    <input type="number" id="ch_min" class="form-control" name="ch_min" value="<?php echo $hasil['ch_min']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="ch_max">Curah Hujan Maksimum</label>
                                <div class="form-line">
                                    <input type="number" id="ch_max" class="form-control" name="ch_max" value="<?php echo $hasil['ch_max']; ?>">
                                </div>
                            </div>
                        </div>
                            <br>
                            <input type="submit" class="btn btn-primary m-t-3 btn-lg waves-effect font-bold" name="update_alternatif" value="UPDATE"/>
                            <a href="?page=alternatif" class="btn btn-danger m-t-3 btn-lg waves-effect font-bold">CANCEL</a>
					</form>
				</div>
			</div>
			<div class="col-lg-2">
				&nbsp;
			</div>
		</div>
	</div>
</section>
    <?php
	}
		if(isset($_POST['update_alternatif']))
		{
			$kode = $_POST['kode'];
			$nama_tanaman = $_POST['nama_tanaman'];
            $tekstur = $_POST['tekstur'];
            $ph_min = $_POST['ph_min'];
            $ph_max = $_POST['ph_max'];
            $drainase = $_POST['drainase'];
            $suhu_min = $_POST['suhu_min'];
            $suhu_max = $_POST['suhu_max'];
            $ketinggian_min = $_POST['ketinggian_min'];
            $ketinggian_max = $_POST['ketinggian_max'];
            $lereng_min = $_POST['lereng_min'];
            $lereng_max = $_POST['lereng_max'];
            $ch_min = $_POST['ch_min'];
            $ch_max = $_POST['ch_max'];

			$update = mysqli_query($connect,"UPDATE tb_alternatif SET 
			kode='$kode', 
			nama_tanaman='$nama_tanaman', 
            tekstur='$tekstur', 
            ph_min='$ph_min',
            ph_max= '$ph_max',
            drainase='$drainase',
            suhu_min='$suhu_min',
            suhu_max='$suhu_max',
            ketinggian_min='$ketinggian_min',
            ketinggian_max='$ketinggian_max',
            lereng_min='$lereng_min',
            lereng_max='$lereng_max',
            ch_min='$ch_min',
            ch_max='$ch_max'
			WHERE kode= '$kode'");
                       
            if($update)
			{
				echo "<script> alert('Update Alternatif Berhasil ...'); document.location='?page=alternatif' </script>";
			}
			else
			{
				echo "<script> alert('Update Alternatif Gagal ...'); </script>";
			}
		}
		else if(isset($hapus))
		{
			$delete = mysqli_query($connect,"DELETE FROM tb_alternatif WHERE kode = '$id'") or die(mysqli_error());
			if($delete)
			{
				echo "<script> alert('Delete Alternatif Berhasil ...'); document.location='?page=alternatif' </script>";
			}
			else
			{
				echo "<script> alert('Delete Alternatif Gagal ...'); </script>";
			}
		}
	?>