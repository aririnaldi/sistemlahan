<?php
include "koneksi.php";

@$update = $_POST['update'];
@$hapus = $_POST['hapus'];

$id = $_GET['id'];

$query = mysqli_query($connect,"SELECT * FROM tb_lahan WHERE id_alamat = '$id'");
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
					TAMBAH DATA LAHAN
				</div>
					
				<div class="header font-bold col-teal" >
					TAMBAH DATA
				</div>
				
				<div class="body">
					<form method="post"><br>

						<input type="hidden" id="id_alamat" class="form-control" name="id_alamat" value="<?php echo $hasil['id_alamat']; ?>">
                        
							<div class="col-md-12">
								<div class="form-group">
									<label for="alamat">Alamat</label>
                                    <div class="form-line">
                                        <input type="text" id="alamat" class="form-control" name="alamat" value="<?php echo $hasil['alamat']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group">
                            <label for="tekstur">Tekstur Tanah</label>
                                <select name="tekstur" value="<?php echo $hasil['tekstur']; ?>" class="form-control">
                                    <option value="Sangat Halus">Sangat Halus</option>
                                    <option value="Halus">Halus</option>
                                    <option value="Agak Halus">Agak Halus</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Agak Kasar">Agak Kasar</option>
                                    <option value="Kasar">Kasar</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="ph">pH</label>
                                    <div class="form-line">
                                        <input type="text" id="ph" class="form-control" name="ph" value="<?php echo $hasil['ph']; ?>">
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-12">
                            <div class="form-group">
                            <label for="drainase">Drainase</label>
								<div class="form-line">
									<select name="drainase" value="<?php echo $hasil['drainase']; ?>" class="form-control">
										<option value="Cepat">Cepat</option>
										<option value="Agak Cepat">Agak Cepat</option>
										<option value="Baik">Baik</option>
										<option value="Agak Baik">Agak Baik</option>
										<option value="Agak Terhambat">Agak Terhambat</option>
										<option value="Terhambat">Terhambat</option>
										<option value="Sangat Terhambat">Sangat Terhambat</option>
									</select>
								</div>
                            </div>
                        </div>
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="suhu">Suhu</label>
                                    <div class="form-line">
                                        <input type="text" id="suhu" class="form-control" name="suhu" value="<?php echo $hasil['suhu']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="ketinggian">Ketinggian</label>
                                    <div class="form-line">
                                        <input type="number" id="ketinggian" class="form-control" name="ketinggian" value="<?php echo $hasil['ketinggian']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="lereng">Lereng</label>
                                    <div class="form-line">
                                        <input type="text" id="lereng" class="form-control" name="lereng" value="<?php echo $hasil['lereng']; ?>">
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="curah_hujan">Curah Hujan</label>
                                    <div class="form-line">
                                        <input type="number" id="curah_hujan" class="form-control" name="curah_hujan" value="<?php echo $hasil['curah_hujan']; ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="update_alternatif" class="btn btn-primary m-t-3 btn-lg waves-effect font-bold">UPDATE</button>
                            <a href="?page=lahan" class="btn btn-danger m-t-3 btn-lg waves-effect font-bold">CANCEL</a>
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
		$id= $_POST ['id_alamat'];
		$alamat= $_POST['alamat'];
        $tekstur = $_POST['tekstur'];
        $ph = $_POST['ph'];
		$drainase = $_POST['drainase'];
		$suhu = $_POST['suhu'];
		$ketinggian = $_POST['ketinggian'];
        $lereng = $_POST['lereng'];
        $curah_hujan = $_POST['curah_hujan'];

        $updatelahan = mysqli_query($connect,"UPDATE tb_lahan SET 
			alamat='$alamat',
			tekstur='$tekstur',
			ph= '$ph',
			drainase='$drainase',
			suhu='$suhu',
			ketinggian='$ketinggian',
			lereng='$lereng',
			curah_hujan='$curah_hujan'
			
			WHERE id_alamat= '$id'");
		
		if($updatelahan)
		{
			echo "<script> alert('Update Alternatif Berhasil ...'); document.location='?page=lahan' </script>";
		}
		else
		{
			echo "<script> alert('Update Alternatif Gagal ...'); </script>";
		}
	}

	else if(isset($hapus))
	{
		$delete = mysqli_query($connect,"DELETE FROM tb_lahan WHERE id_alamat = '$id'") or die(mysqli_error());
		if($delete)
		{
			echo "<script> alert('Delete Alternatif Berhasil ...'); document.location='?page=lahan' </script>";
		}
		else
		{
			echo "<script> alert('Delete Alternatif Gagal ...'); </script>";
		}
	}
?>