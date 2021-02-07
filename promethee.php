<p align="left"><label style="font-size: 20px">1. Perkalian Bobot</label></p>
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th style="vertical-align: middle; text-align: center" rowspan="2" width="10px">No</th>
                <th style="vertical-align: middle; text-align: center" rowspan="2">STANDAR</th>
                <th colspan="4" class="text-center">KRITERIA</th>
            </tr>
            <tr>
            <?php
            $tampil_krit = mysqli_query($connect,"SELECT * FROM tb_kriteria WHERE level='$_SESSION[level]'");
            while ($rows_krit = mysqli_fetch_array($tampil_krit)) {
                # code...
                echo "<th style='vertical-align: middle;text-align:center' width='150px'>".strtoupper($rows_krit['kriteria'])."</th>";
                //PENYIMPANAN BOBOT
                $bobot[] = $rows_krit[2]/100;
            }
            ?>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());

            while ($rows = mysqli_fetch_array($query)) {
                $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
                $kat1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[2]'"));
                $kat2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[3]'"));
                $kat3 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[4]'"));
                # code...
                $k1 = $kat1[3]*$bobot[0];
                $k2 = $kat2[3]*$bobot[1];
                $k3 = $kat3[3]*$bobot[2];
                $k4 = $rows[5]*$bobot[3];
                echo "<tr>
                    <td align=\"center\">".$no++."</td>
                    <td>".$cekkriteria['alternatif']." - ".$cekkriteria['keterangan']."</td>
                    <td style='vertical-align: middle; text-align:center'>".$kat1[3]." * ".$bobot[0]." = ".$k1."</td>
                    <td style='vertical-align: middle; text-align:center'>".$kat2[3]." * ".$bobot[1]." = ".$k2."</td>
                    <td style='vertical-align: middle; text-align:center'>".$kat3[3]." * ".$bobot[2]." = ".$k3."</td>
                    <td style='vertical-align: middle; text-align:center'>".$rows[5]." * ".$bobot[3]." = ".$k4." </td>
                </tr>";
            }
        ?>
        </tbody>
    </table>
<hr>
<p align="left"><label style="font-size: 20px">2. Menghitung Nilai Preferensi</label></p>
<table class="table table-bordered ">
<p align="left"><label style="font-size: 15px">a. Kriteria 1</label></p>
        <?php
        $no = 1;
        $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
        while ($rows = mysqli_fetch_array($query)) {
            $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
            $kat1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[2]'"));
            # code...
            $k1 = $kat1[3]*$bobot[0];
            
            $query1 = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
            echo "<tr>";
            while ($rows1 = mysqli_fetch_array($query1)) {
                $cekkriteria1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows1[1]'"));
                $kat11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[2]'"));
                # code...
                $k11 = $kat11[3]*$bobot[0];
                if($k11-$k1 > 0){
                    $nilai1 = 1;
                } else {
                    $nilai1 = 0;
                }
                if($rows[0] != $rows1[0]){
                    echo "<td>[".$nilai1."] ".$k11." - ".$k1." = ".($k11-$k1)."</td>";
                } else {
                    echo "<td>-</td>";
                }
            }
            echo "</tr>";
            
        }

        ?>
</table>
<table class="table table-bordered ">
<p align="left"><label style="font-size: 15px">b. Kriteria 2</label></p>
        <?php
        $no = 1;
        $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
        while ($rows = mysqli_fetch_array($query)) {
            $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
            $kat2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[3]'"));
            # code...
            $k2 = $kat2[3]*$bobot[1];
            
            $query1 = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
            echo "<tr>";
            while ($rows1 = mysqli_fetch_array($query1)) {
                $cekkriteria1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows1[1]'"));
                $kat21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[3]'"));
                # code...
                $k21 = $kat21[3]*$bobot[1];
                if($k21-$k2 > 0){
                    $nilai2 = 1;
                } else {
                    $nilai2 = 0;
                }
                if($rows[0] != $rows1[0]){
                echo "<td>[".$nilai2."] ".$k21." - ".$k2." = ".($k21-$k2)."</td>";
                } else {
                    echo "<td>-</td>";
                }
            }
            echo "</tr>";
            
        }

        ?>
</table>
<table class="table table-bordered ">
<p align="left"><label style="font-size: 15px">c. Kriteria 3</label></p>
        <?php
        $no = 1;
        $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
        while ($rows = mysqli_fetch_array($query)) {
            $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
            $kat3 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[4]'"));
            # code...
            $k3 = $kat3[3]*$bobot[2];
            
            $query1 = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
            echo "<tr>";
            while ($rows1 = mysqli_fetch_array($query1)) {
                $cekkriteria1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows1[1]'"));
                $kat31 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[4]'"));
                # code...
                $k31 = $kat31[3]*$bobot[2];
                if($k31-$k3 > 0){
                    $nilai3 = 1;
                } else {
                    $nilai3 = 0;
                }
                if($rows[0] != $rows1[0]){
                    echo "<td>[".$nilai3."] ".$k31." - ".$k3." = ".($k31-$k3)."</td>";
                } else {
                    echo "<td>-</td>";
                }
            }
            echo "</tr>";
            
        }

        ?>
</table>


<table class="table table-bordered ">
<p align="left"><label style="font-size: 15px">d. Kriteria 4</label></p>
        <?php
        $no = 1;
        $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
        while ($rows = mysqli_fetch_array($query)) {
            $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
            # code...
            $k4 = $rows[5]*$bobot[3];
            
            $query1 = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
            echo "<tr>";
            while ($rows1 = mysqli_fetch_array($query1)) {
                $cekkriteria1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows1[1]'"));
                # code...
                $k41 = $rows1[5]*$bobot[3];
                if($k41-$k4 > 0){
                    $nilai4 = 1;
                } else {
                    $nilai4 = 0;
                }
                if($rows[0] != $rows1[0]){
                    echo "<td>[".$nilai4."] ".$k41." - ".$k4." = ".($k41-$k4)."</td>";
                } else {
                    echo "<td>-</td>";
                }
            }
            echo "</tr>";
            
        }

        ?>
</table>


<table class="table table-bordered ">
<p align="left"><label style="font-size: 20px">3. Menghitung Index Preferensi Multikriteria</label></p>
        <?php
        $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
        for($x=1; $x<=mysqli_num_rows($query); $x++){
            $standar1[$x] = 0;
        }
        while ($rows = mysqli_fetch_array($query)) {
            $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
            $kat1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[2]'"));
            $kat2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[3]'"));
            $kat3 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[4]'"));
            # code...
            $k1 = $kat1[3]*$bobot[0];
            $k2 = $kat2[3]*$bobot[1];
            $k3 = $kat3[3]*$bobot[2];
            $k4 = $rows[5]*$bobot[3];
            
            $query1 = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
            $standar = 0;
            $no = 1;
            while ($rows1 = mysqli_fetch_array($query1)) {
                $cekkriteria1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows1[1]'"));
                $kat11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[2]'"));
                $kat21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[3]'"));
                $kat31 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[4]'"));
                # code...
                $k11 = $kat11[3]*$bobot[0];
                $k21 = $kat21[3]*$bobot[1];
                $k31 = $kat31[3]*$bobot[2];
                $k41 = $rows1[5]*$bobot[3];

                if($k11-$k1 > 0){
                    $nilai1 = 1;
                } else {
                    $nilai1 = 0;
                }
                
                if($k21-$k2 > 0){
                    $nilai2 = 1;
                } else {
                    $nilai2 = 0;
                }

                if($k31-$k3 > 0){
                    $nilai3 = 1;
                } else {
                    $nilai3 = 0;
                }

                if($k41-$k4 > 0){
                    $nilai4 = 1;
                } else {
                    $nilai4 = 0;
                }
                $hasil1 = ($nilai1+$nilai2+$nilai3+$nilai4)/4;
                $standar = $standar+$hasil1;
                $standar1[$no] = $standar1[$no] + $hasil1;
                $simpanarray[] = $hasil1;
                $no++;
            # code...
            }
        }
        for($y=0; $y<=mysqli_num_rows($query); $y++){
                # code...
            echo "<tr class='font-bold'>";
            for($x=0; $x<count($simpanarray); $x++){
                if($x%7 == $y){
                    if($x%8 == 0){
                        echo "<td>-</td>";
                    } else {
                        echo "<td>".$simpanarray[$x]."</td>";
                    }
                }
            }
        }
        echo "</tr>";
        ?>
</table>


<table class="table table-bordered ">
<p align="left"><label style="font-size: 20px">4. Menghitung Leaving Flow</label></p>
        <?php
        for($y=0; $y<mysqli_num_rows($query); $y++){
            $total = 0;
            echo "<tr class='font-bold'><td>(";
                $aaa = 0;
            for($x=0; $x<count($simpanarray); $x++){
                if($x%7 == $y){
                    $total = $simpanarray[$x]+$total;
                    echo $simpanarray[$x];
                    if($aaa != 6){
                        echo "+";
                    }
                    $aaa ++;
                }
            }
            echo ")/6 = </td><td>".number_format($total/6,2)."</td>";
        }
        echo "</tr>";
        ?>
</table>
<table class="table table-bordered ">
<p align="left"><label style="font-size: 20px">5. Menghitung Entering Flow</label></p>
        <?php
        $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
        for($x=1; $x<=mysqli_num_rows($query); $x++){
            $standar1[$x] = 0;
        }
        while ($rows = mysqli_fetch_array($query)) {
            $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
            $kat1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[2]'"));
            $kat2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[3]'"));
            $kat3 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[4]'"));
            # code...
            $k1 = $kat1[3]*$bobot[0];
            $k2 = $kat2[3]*$bobot[1];
            $k3 = $kat3[3]*$bobot[2];
            $k4 = $rows[5]*$bobot[3];
            
            $query1 = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
            $standar = 0;
            $no = 1;
            $entering = 0;
            echo "<tr class='font-bold'><td>(";
            while ($rows1 = mysqli_fetch_array($query1)) {
                $cekkriteria1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows1[1]'"));
                $kat11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[2]'"));
                $kat21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[3]'"));
                $kat31 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[4]'"));
                # code...
                $k11 = $kat11[3]*$bobot[0];
                $k21 = $kat21[3]*$bobot[1];
                $k31 = $kat31[3]*$bobot[2];
                $k41 = $rows1[5]*$bobot[3];

                if($k11-$k1 > 0){
                    $nilai1 = 1;
                } else {
                    $nilai1 = 0;
                }
                
                if($k21-$k2 > 0){
                    $nilai2 = 1;
                } else {
                    $nilai2 = 0;
                }

                if($k31-$k3 > 0){
                    $nilai3 = 1;
                } else {
                    $nilai3 = 0;
                }

                if($k41-$k4 > 0){
                    $nilai4 = 1;
                } else {
                    $nilai4 = 0;
                }
                $hasil1 = ($nilai1+$nilai2+$nilai3+$nilai4)/4;
                $standar = $standar+$hasil1;
                $standar1[$no] = $standar1[$no] + $hasil1;
                echo $hasil1;
                $entering = $entering + $hasil1;
                if($no == 7){
                    echo "";
                } else {
                    echo "+";
                }
                $no++;
            # code...
            }
        echo ")/6 = </td><td>".number_format($entering/6,2)."</td></tr>";
        }
        ?>
</table>

<table class="table table-bordered ">
<p align="left"><label style="font-size: 20px">6. Menghitung Net Flow</label></p>
        <?php
        $query = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
        for($x=1; $x<=mysqli_num_rows($query); $x++){
            $standar1[$x] = 0;
        }
        while ($rows = mysqli_fetch_array($query)) {
            $cekkriteria = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows[1]'"));
            $kat1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[2]'"));
            $kat2 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[3]'"));
            $kat3 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows[4]'"));
            # code...
            //HASIL  = NILAI KATEGORI X BOBOT
            $k1 = $kat1[3]*$bobot[0];
            $k2 = $kat2[3]*$bobot[1];
            $k3 = $kat3[3]*$bobot[2];
            $k4 = $rows[5]*$bobot[3];
            
            $query1 = mysqli_query($connect,"SELECT * FROM tb_penilaian WHERE level='$_SESSION[level]' ORDER BY id_alternatif ASC") or die(mysqli_error());
            $standar = 0;
            $no = 1;
            while ($rows1 = mysqli_fetch_array($query1)) {
                $cekkriteria1 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_alternatif WHERE id_alternatif = '$rows1[1]'"));
                $kat11 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[2]'"));
                $kat21 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[3]'"));
                $kat31 = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM tb_kategori WHERE id_kategori='$rows1[4]'"));
                # code...
                $k11 = $kat11[3]*$bobot[0];
                $k21 = $kat21[3]*$bobot[1];
                $k31 = $kat31[3]*$bobot[2];
                $k41 = $rows1[5]*$bobot[3];

                if($k11-$k1 > 0){
                    $nilai1 = 1;
                } else {
                    $nilai1 = 0;
                }
                
                if($k21-$k2 > 0){
                    $nilai2 = 1;
                } else {
                    $nilai2 = 0;
                }

                if($k31-$k3 > 0){
                    $nilai3 = 1;
                } else {
                    $nilai3 = 0;
                }

                if($k41-$k4 > 0){
                    $nilai4 = 1;
                } else {
                    $nilai4 = 0;
                }
                $hasil1 = ($nilai1+$nilai2+$nilai3+$nilai4)/4;
                $standar = $standar+$hasil1;
                $standar1[$no] = $standar1[$no] + $hasil1;
                $no++;
                $ket_sta[] = $cekkriteria1[1]." - ".$cekkriteria1[2];
            }
            $id_a[] = $rows[0];
            $standar2[] = $standar;
        }
        echo "<tr>
        <th class='text-center'>No</th>
        <th>Standar</th>
        <th colspan='2' class='text-center'>Leaving Flow - Entering Flow</th>
        <th class='text-center'>Net Flow</th>
        </tr>";
        for($x=1; $x<=mysqli_num_rows($query); $x++){
            $hasil_akhir = (($standar1[$x]/6)-($standar2[$x-1]/6));
        echo "<tr>";
            echo "<td class='text-center'>".$x."</td>";
            echo "<td>".$ket_sta[$x-1]."</td>";
            echo "<td class='text-center'>".number_format($standar1[$x]/6,2)."</td>";
            echo "<td class='text-center'>".number_format($standar2[$x-1]/6,2)."</td>";
            echo "<td class='text-center font-bold'>".number_format($hasil_akhir,2)."</td>";
        echo "</tr>";
            $id_rank = $id_a[$x-1];
            $cekdata_ranking = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM tb_ranking WHERE id_penilaian = '$id_rank'"));
            if($cekdata_ranking == 0){
                mysqli_query($connect,"INSERT INTO tb_ranking VALUES(NULL, '$id_rank', '$hasil_akhir', '$_SESSION[level]')");
            } else {
                mysqli_query($connect,"UPDATE tb_ranking SET nilai_akhir='$hasil_akhir' WHERE id_penilaian='$id_rank'") or die(mysqli_error());
            }
        }

        ?>
</table>