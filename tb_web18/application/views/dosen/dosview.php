 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                              <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <div class="card-title"><a href="<?php echo base_url('dosen/dostambah');?>" role="button" class="btn btn-success btn-fill pull-left" ><i class='fa fa-plus'></i> Tambah</a></div>
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
                                            $this->table->set_heading(array('No','NIP','Nama','Prodi','No Handphone','Kuota','Aksi'));
                                                $no=1;
                                                foreach ($table as $row) {
                                                
                                                if($row->id_prodi==1)
                                                    $prodi='Teknik Informatika';    
                                                if($row->id_prodi==2)
                                                    $prodi='Manajemen Informasi';
                                                if($row->id_prodi==3)
                                                    $prodi='Teknik Komputer';
                                                $id_dosen_sess = explode("M", $this->session->userdata('username'));
                                                if($id_dosen_sess[1]!=$row->id_dosen){
                                                  $set_koordinator = "<a href='".base_url('dosen/setkoordinator/'.$row->id_dosen)."' class='btn btn-warning btn-sm btn-fill' title='Set Koordinator'>
                                                    <i class='fa fa-bookmark'></i></a>";
                                                }else{
                                                  $set_koordinator = "<a href='".base_url('dosen/gagalset/'.$row->id_dosen)."' class='btn btn-default btn-sm btn-fill' title='Set Koordinator'>
                                                    <i class='fa fa-bookmark'></i></a>";
                                                }
                                                $this->table->add_row(
                                                    $no,
                                                    array('data' => $row->nip),
                                                    array('data' => $row->nama_dosen),
                                                    array('data' => $prodi),
                                                    array('data' => $row->no_hp),
                                                    array('data' => $row->kuota_mhs),
                                                    array('data' => 
                                                    "<a href='".base_url('dosen/dosedit/'.$row->id_dosen)."' class='btn btn-primary btn-sm btn-fill' title='Sunting'>
                                                    <i class='fa fa-edit'></i></a>
                                                    <button class='btn btn-danger btn-sm btn-fill' 
                                                      data-href='".base_url('dosen/dosdelete/'.$row->id_dosen)."' data-toggle='modal' data-target='#confirm-delete' title='Hapus'>
                                                      <i class='fa fa-times' ></i></button>
                                                    <a href='".base_url('dosen/dosedit/'.$row->id_dosen)."' class='btn btn-success btn-sm btn-fill' title='Set Reviewer'>
                                                    <i class='fa fa-calendar-check-o'></i></a>
                                                     ".$set_koordinator."
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
                                              <h4>Hapus Data Dosen</h4>
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