 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                              <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <div class="card-title"><a href="<?php echo base_url('dosen/mhstambah');?>" role="button" class="btn btn-success btn-fill pull-left" ><i class='fa fa-plus'></i> Tambah</a></div>
                                    <!--<p class="card-category">Here is a subtitle for this table</p>-->
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
                                            $this->table->set_heading(array('No','Nim','Nama','Prodi','Golongan','Aksi'));
                                                $no=1;
                                                foreach ($table as $row) {
                                                    
                                                if($row->id_prodi==2)
                                                    $prodi='Manajemen Informasi';
                                                if($row->id_gol==1)
                                                    $gol='A';
                                                else if($row->id_gol==2)
                                                    $gol='B';
                                                else if($row->id_gol==3)
                                                    $gol='C';
                                                else if($row->id_gol==4)
                                                    $gol='D';
                                                else if($row->id_gol==5)
                                                    $gol='PLJ';
                                                $this->table->add_row(
                                                    $no,
                                                    array('data' => $row->nim),
                                                    array('data' => $row->nama_mhs),
                                                    array('data' => $prodi),
                                                    array('data' => $gol),
                                                    array('data' => 
                                                    "<a href='".base_url('dosen/mhsedit/'.$row->nim)."' class='btn btn-primary btn-sm btn-fill'>
                                                    <i class='fa fa-edit'></i> Sunting</a>
                                                    <button class='btn btn-danger btn-sm btn-fill' 
                                                      data-href='".base_url('dosen/mhsdelete/'.$row->nim)."'
                                                      data-toggle='modal'
                                                      data-target='#confirm-delete'>
                                                      <i class='fa fa-times'></i> Hapus</button>
                                                      ")
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
                                              <h4>Hapus Data Mahasiswa</h4>
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