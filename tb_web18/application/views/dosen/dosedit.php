 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <?php $nip= $table->nip; ?>
                                    <form method="POST" action="<?php echo base_url('dosen/dosupdate/');?>">
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input type="text" class="form-control" placeholder="Nomor Pegawai Negeri Sipil" value="<?php echo $nip ?>" name="nip" maxlength="18" readonly autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Nama Dosen</label>
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $table->nama_dosen ?>"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Prodi</label>
                                                    <select class="form-control" name="prodi">
                                                        <?php if($table->id_prodi==1){
                                                        echo '
                                                        <option value="1" selected>Teknik Informatika</option>
                                                        <option value="2">Manajemen Informatika</option>
                                                        <option value="3">Teknik Komputer</option>';
                                                        }elseif($table->id_prodi==2){
                                                        echo '
                                                        <option value="1">Teknik Informatika</option>
                                                        <option value="2" selected>Manajemen Informatika</option>
                                                        <option value="3">Teknik Komputer</option>';
                                                        }if($table->id_prodi==3){
                                                        echo '
                                                        <option value="1">Teknik Informatika</option>
                                                        <option value="2">Manajemen Informatika</option>
                                                        <option value="3" selected>Teknik Komputer</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>No Handphone</label>
                                                    <input type="text" class="form-control" placeholder="Nomor Handphone" value="<?php echo $table->no_hp ?>" name="nohp" maxlength="13" required>
                                                </div>
                                            </div>
                                        <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Kuota</label>
                                                    <input type="number" class="form-control" placeholder="Kuota Mahasiswa" min="1" max="30" name="kuota" value="<?php echo $table->kuota_mhs ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <a href="<?php echo base_url('dosen/dosview');?>" role="button" class="btn btn-default pull-left" >Kembali</a>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Sunting</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>