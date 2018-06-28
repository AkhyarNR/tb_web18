     <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?php echo base_url('dosen/usulupdate/');?>">
                                        <div class="row">
                                            <div class="col-md-10 pr-1">
                                                <div class="form-group">
                                                    <label>Usulan</label>
                                                    <input type="text" class="form-control" placeholder="Judul Penelitian" value="<?php echo htmlspecialchars($table->usulan) ?>" name="usulan" required autofocus>
                                                    <input type="text" class="form-control" name="id_usul" value="<?php echo $table->id_usulan ?>" hidden>
                                                </div>
                                            </div>
                                         <div class="col-md-2 pl-1">
                                                <div class="form-group">
                                                    <label>Kuota</label>
                                                    <input type="number" class="form-control" placeholder="Kuota Mahasiswa" name="kuota" min="1" max="5" value="<?php echo $table->kuota_mhs?>"required>
                                                </div>
                                            </div>
                                        </div>
                                    <a href="<?php echo base_url('dosen/usulview');?>" role="button" class="btn btn-default pull-left" >Kembali</a>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Sunting</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>