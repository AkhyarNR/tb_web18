     <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <?php $nim= $table->nim; ?>
                                    <form method="POST" action="<?php echo base_url('dosen/mhsupdate/');?>">
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>NIM</label>
                                                    <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa" name ="nim" value="<?php echo $nim ?>" 
                                                    required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Nama Mahasiswa</label>
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $table->nama_mhs ?>" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Prodi</label>
                                                    <select class="form-control" name="prodi">
                                                        <option value="2">Manajemen Informatika</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Golongan</label>
                                                    <select class="form-control" name="gol">
                                                        <?php if($table->id_gol==1){
                                                        echo '<option value="1" Selected>A</option>
                                                                <option value="2">B</option>
                                                                <option value="3">C</option>
                                                                <option value="4">D</option>
                                                                <option value="5">PLJ</option>';
                                                        }elseif($table->id_gol==2){
                                                        echo '<option value="1">A</option>
                                                                <option value="2" Selected>B</option>
                                                                <option value="3">C</option>
                                                                <option value="4">D</option>
                                                                <option value="5">PLJ</option>';
                                                        }elseif($table->id_gol==3){
                                                        echo '<option value="1">A</option>
                                                                <option value="2">B</option>
                                                                <option value="3" Selected>C</option>
                                                                <option value="4">D</option>
                                                                <option value="5">PLJ</option>';
                                                        }elseif($table->id_gol==4){
                                                        echo '<option value="1">A</option>
                                                                <option value="2">B</option>
                                                                <option value="3">C</option>
                                                                <option value="4" Selected>D</option>
                                                                <option value="5">PLJ</option>';
                                                        }elseif($table->id_gol==5){
                                                        echo '<option value="1">A</option>
                                                                <option value="2">B</option>
                                                                <option value="3">C</option>
                                                                <option value="4">D</option>
                                                                <option value="5" Selected>PLJ</option>';
                                                        }
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <a href="<?php echo base_url('dosen/mhsview');?>" role="button" class="btn btn-default pull-left" >Kembali</a>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Sunting</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>