 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?php echo base_url('dosen/dosinsert');?>">
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input type="text" class="form-control" placeholder="Nomor Pegawai Negeri Sipil" name="nip" maxlength="18" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-6 prl-1">
                                                <div class="form-group">
                                                    <label>Nama Dosen</label>
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Prodi</label>
                                                    <select class="form-control" name="prodi">
                                                        <option value="1">Teknik Informatika</option>
                                                        <option value="2">Manajemen Informatika</option>
                                                        <option value="3">Teknik Komputer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>No Handphone</label>
                                                    <input type="text" class="form-control" placeholder="Nomor Handphone" name="nohp" maxlength="13" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Kuota</label>
                                                    <input type="number" class="form-control" placeholder="Kuota Mahasiswa" min="1" max="30" name="kuota">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url('dosen/dosupload');?>" role="button" class="btn btn-warning btn-fill pull-left" >Unggah Data</a>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Simpan</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>