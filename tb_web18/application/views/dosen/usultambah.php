 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?php echo base_url('dosen/usulinsert');?>">
                                        <div class="row">
                                            <div class="col-md-10 pr-1">
                                                <div class="form-group">
                                                    <label>Usulan</label>
                                                    <input type="text" class="form-control" placeholder="Judul Penelitian" name="usulan" required autofocus>
                                                </div>
                                            </div>
                                         <div class="col-md-2 pl-1">
                                                <div class="form-group">
                                                    <label>Kuota</label>
                                                    <input type="number" class="form-control" placeholder="Kuota Mahasiswa" name="kuota" min="1" max="5" required>
                                                </div>
                                            </div>
                                        </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Simpan</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>