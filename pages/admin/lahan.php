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
                     <div class="row clearfix" >
                         <form action="" method="post" class="col-md-3" >
                             <input type="text" class="form-control" id="keyword" placeholder="Masukan Pencarian" name="keyword">
                         </form>
                     </div>
                     <div id="container">
                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                     <thead>
                         <tr>
                             <th width="10px">No</th>
                             <th class="text-center">Alamat</th>
                             <th class="text-center">Tekstur</th>
                             <th class="text-center">pH</th>
                             <th class="text-center">Drainase</th>
                             <th class="text-center">Suhu</th>
                             <th class="text-center">Ketinggian</th>
                             <th class="text-center">Lereng</th>
                             <th class="text-center">Curah Hujan</th>
                             <th class="text-center">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                     <?php

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
             </table>
             </div>
         </div>
     </div>
 </div>
</div>
