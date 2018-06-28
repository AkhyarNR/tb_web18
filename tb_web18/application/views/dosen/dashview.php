 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                              <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
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
                                            $this->table->set_heading(array('No','Dosen','Usulan Judul','Jenis','Kuota Mahasiswa'));
                                                $no=1;
                                                foreach ($table as $row) {
                                                
                                                if($row->jenis==1)
                                                    $jenis='Kelompok';    
                                                if($row->jenis==0)
                                                    $jenis='Individu';
                                                foreach ($dosen as $key) {
                                                  if($key->id_dosen==$row->id_dosen)
                                                    $nama_dos = $key->nama_dosen;
                                                }
                                                $this->table->add_row(
                                                    $no,
                                                    array('data' => $nama_dos),
                                                    array('data' => $row->usulan),
                                                    array('data' => $jenis),
                                                    array('data' => $row->kuota_mhs)
                                                );
                                                $no++;
                                                }
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
                            </div>
                        </div>
                </div>
            </div>