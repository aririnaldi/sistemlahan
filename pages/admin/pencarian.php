 <tbody>
                                <?php

                                 $no=1;
                                 $query= "SELECT * FROM tb_lahan WHERE 
                                            alamat LIKE '%keyword%' OR 
                                            tekstur LIKE '%keyword%'OR
                                            ph LIKE '%keyword%'OR
                                            drainase LIKE '%keyword%'OR
                                            suhu LIKE '%keyword%'OR
                                            ketinggian LIKE '%keyword%'OR
                                            lereng LIKE '%keyword%'OR
                                            curah_hujan LIKE '%keyword%'OR

                                            "
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
                                        <td class="text-center">
                                            <a href="?page=hasil&id=<?php echo $hasil['id_alamat']; ?>"class="btn btn-xs btn-primary m-b-5 m-r-5">
                                                Proses
                                            </a>

                                            <a href="?page=edit-lahan&id=<?php echo $hasil['id_alamat']; ?>"class="btn btn-warning btn-xs m-b-5 m-r-5">
                                                Edit
                                            </a>

                                            <form method="post" action="?page=edit-lahan&id=<?php echo $hasil['id_alamat']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $hasil['id_alamat'];?>">
                                                <input type="submit" onClick="return confirm('Yakin akan dihapus?');" name="hapus" value="Hapus" class="btn btn-danger btn-xs m-b-5 m-r-5">
                                            </form>
        								</td>
        							</tr>
                                 <?php
                                $no++;
                                }
                                ?>
        					</tbody>