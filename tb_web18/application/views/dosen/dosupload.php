 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <a href="<?php echo base_url('excel/format_dosen.xlsx')?>"> > > Unduh Format File< < </a> 
                                    <form method="POST" action="<?php echo base_url('dosen/dosupload')?>" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <label>Unggah file (.xlsx)</label>
                                                <div class="form-group">
                                                    <input type="file"  name="file">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label></label>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-info btn-fill pull-right" name="preview" value="Pratinjau">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                <?php
    if(isset($_POST['preview'])){ 
        if(isset($upload_error)){ 
            redirect(base_url('dosen/dosupload'));
           // echo "<div style='color: red;'>Anda belum memilih file untuk di unggah!</div>"; 
            die; 
        }
        
        echo "<form method='post' action='".base_url("dosen/dosimport")."'>";
        echo "<div class='card-body table-full-width table-responsive'>
                                    <table class='table table-hover table-striped dataTables'>
                                    <thead>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Id_prodi</th>
                                            <th>Id_golongan</th>
                                        </thead>";
            
                                    $numrow = 1;
                                    $kosong = 0;

                                    foreach($sheet as $row){ 
                                            $nim = $row['A']; 
                                            $nama = $row['B']; 
                                            $id_prodi = $row['C']; 
                                            $id_gol = $row['D']; 
                                            
                                            if(empty($nim) && empty($nama) && empty($id_prodi) && empty($id_gol))
                                                continue; 
                                            
                                            if($numrow > 1){
                                                $nim_td = ( ! empty($nim))? "" : " style='background-color:red;'"; 
                                                $nama_td = ( ! empty($nama))? "" : " style='background-color:red;'"; 
                                                $id_prodi_td = ( ! empty($id_prodi))? "" : " style='background-color:red;'"; 
                                                $id_gol_td = ( ! empty($id_gol))? "" : " style='background-color:red;'"; 
                                                
                                                if(empty($nim) or empty($nama) or empty($id_prodi) or empty($id_gol)){
                                                    $kosong++;
                                                }                                                
                                                echo "<tr>";
                                                echo "<td".$nim_td.">".$nim."</td>";
                                                echo "<td".$nama_td.">".$nama."</td>";
                                                echo "<td".$id_prodi_td.">".$id_prodi."</td>";
                                                echo "<td".$id_gol_td.">".$id_gol."</td>";
                                                echo "</tr>";
                                            }

                                        $numrow++;
        }
        
        echo "</table>";

        if($kosong > 0){
        ?>  
            <div class="alert alert-danger alert-dismissible" style="margin-top: 10px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Peringatan!</strong> Masih ada <?php echo $kosong;?> data kosong yang belum diisi!
              </div>
        <?php
        }else{ ?>
        <?php
            echo "<a href='".base_url('dosen/dosupload')."' class='btn btn-warning btn-fill'>Kembali</a>";
            echo'<button type="submit" class="btn btn-info btn-fill pull-right" name="import">Impor</button>';
            
        }      
        echo "</form>";
    }
    ?>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>