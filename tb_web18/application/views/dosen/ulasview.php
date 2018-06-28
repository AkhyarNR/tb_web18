 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                              <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <div class="card-title"></div>
                                </div>
                                <div class="card-body">
                                  <?php if($notif_error == "kosong"){?>
                                  <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Sukes!</strong> <?php echo $notif ?>
                                  </div>
                                  <?php } elseif($notif == "kosong"){?>
                                  <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Gagal!</strong> <?php echo $notif_error ?>
                                  </div>
                                          <?php } 
                                             $this->table->set_heading(array('No','Nim','Usulan Judul','Aksi'));
                                                $no=1;
                                                foreach ($table as $row) {
                                                
                                                if($row->jenis==1)
                                                    $jenis='Kelompok';    
                                                if($row->jenis==0)
                                                    $jenis='Individu';
                                                foreach ($dosen as $key) {
                                                  if($key->id_dosen==$row->id_dosen)
                                                    $nama_dosen = $key->nama_dosen;
                                                }
                                                $this->table->add_row(
                                                    $no,
                                                    array('data' => $row->nim),
                                                    array('data' => $row->judul),
                                                    array('data' => 
                                                    "<button class='btn btn-warning btn-sm btn-fill' 
                                                      data-toggle='modal'
                                                      data-target='#detil' title='Detil'>
                                                      <i class='fa fa-search'></i></button>

                                                    <button class='btn btn-primary btn-sm btn-fill'
                                                      data-toggle='modal'
                                                      data-target='#ulasan' title='Ulasan'>
                                                      <i class='fa fa-users'></i></button>

                                                    <button class='btn btn-success btn-sm btn-fill' 
                                                      data-href=''
                                                      data-toggle='modal'
                                                      data-target='#add-review' title='Berikan Ulasan'>
                                                      <i class='fa fa-plus'></i></button>

                                                    <button class='btn btn-danger btn-sm btn-fill' 
                                                      data-href='".base_url('dosen/ulasdelete/'.$row->id_judul)."'
                                                      data-toggle='modal'
                                                      data-target='#confirm-delete' title='Hapus Ulasan Saya'>
                                                      <i class='fa fa-times'></i></button>
                                                      ")
                                                );
                                                $this->load->view('dosen/table');
                                                echo $this->table->generate();
                                            ?>
                                </div>
                            </div>
                            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4>Hapus Data Usulan</h4>
                                          </div>
                                          <div class="modal-body">
                                              Apakah anda yakin akan menghapus data ini?
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                              <a class="btn btn-danger btn-ok btn-fill">Hapus</a>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="modal fade" id="add-review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4>Berikan Usulan</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form method="POST" action="<?php echo base_url('dosen/ulasinsert')?>">
                                                <div class="form-group">
                                                  <label>Status</label>
                                                  <select name="status" class="form-control" >
                                                    <option value='1'>Diterima</option>
                                                    <option value='2'>Diterima dengan perbaikan</option>
                                                    <option value='3'>Ditolak</option>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" name="id_judul" value="<?php echo $row->id_judul?>" hidden>
                                                  <label>Ulasan</label>
                                                  <textarea class="form-control" name="ulasan" cols="20" rows="5"></textarea>
                                                </div>
                                                <div class="form-group">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                                  <input type="submit" class="btn btn-warning btn-fill pull-right" name="simpan" value="Simpan">
                                                </div>

                                              </form>
                                          </div>
                                          <div class="modal-footer">
                                              
                                          </div>
                                      </div>
                                  </div>
                                </div>
                               <div class="modal fade" id="detil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4>Detil Usulan Judul</h4>
                                          </div>
                                          <div class="modal-body">
                                            <table>
                                              <tr>
                                                <th>Judul</th>
                                                <td>:</td>
                                                <td><?php echo $row->judul?></td>
                                              </tr>
                                              <tr>
                                                <td><hr></td>
                                                <td><hr></td>
                                                <td><hr></td>
                                              </tr>
                                              <tr>
                                                <th>Deskripsi</th>
                                                <td>:</td>
                                                <td><?php echo $row->deskripsi?></td>
                                              </tr>
                                              <tr>
                                                <td><hr></td>
                                                <td><hr></td>
                                                <td><hr></td>
                                              </tr> 
                                              <tr>
                                                <th>Usulan Dospem</th>
                                                <td>:</td>
                                                <td><?php echo $nama_dosen?></td>
                                              </tr>
                                              <tr>
                                                <td><hr></td>
                                                <td><hr></td>
                                                <td><hr></td>
                                              </tr>
                                              <tr>
                                                <th>Pengerjaan</th>
                                                <td>:</td>
                                                <td><?php echo $jenis?></td>
                                              </tr>
                                            </table>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-warning btn-fill" data-dismiss="modal">Kembali</button>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="modal fade" id="ulasan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4>Hasil Ulasan Judul</h4>
                                          </div>
                                          <div class="modal-body">
                                              Judul :asa
                                              <br>
                                              Deskripsi :
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-warning btn-fill" data-dismiss="modal">Kembali</button>
                                              <a class="btn btn-light btn-ok btn-fill">Kirim Ulasan</a>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <?php  $no++; } ?>
                            </div>
                        </div>
                </div>
            </div>