 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?php echo base_url('dosen/mhsinsert');?>">
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>NIM</label>
                                                    <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa" name="nim" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Nama Mahasiswa</label>
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
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
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                        <option value="4">D</option>
                                                        <option value="5">PLJ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url('dosen/mhsupload');?>" role="button" class="btn btn-warning btn-fill pull-left" >Unggah Data</a>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Simpan</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>