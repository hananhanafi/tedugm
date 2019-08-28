
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table fa-lg"></i>
              <h4 style="display:inline;">Submit Proposal</h4></div>
              <div class="card-body">
                
                <!-- form submit -->
                <?php 
                if($user['progress'] <=2){?>
                  <div class="alert alert-danger">
                      Belum ke tahap <strong>Pembayaran!!!</strong>
                    </div>
                <?php }elseif($user['progress'] <=3){?>
                  <div class="alert alert-warning">
                      Menunggu <strong>Pengumuman!!!</strong>
                    </div>
                <?php } elseif($user['progress'] ==4){?>
                    <div class="alert alert-danger">
                      Maaf Anda tidak lolos seleksi <strong>Abstrak!!!</strong>
                    </div>
                 <?php }elseif($user['progress'] <= 5){ ?>
                    <div class="alert alert-warning">
                      Upload Bukti <strong>Pembayaran</strong> terlebih dahulu
                    </div>
                  <?php
                  }elseif($user['progress'] <=6){?>
                    <div class="alert alert-warning">
                      Anda telah melakukan <strong>Pembayaran.</strong> Menunggu konfirmasi dari admin
                    </div>
                  <?php }elseif($user['progress'] ==7){?>

                      <form class="col-md-6" action="<?=site_url('sp/submit_proposal')?>" method="POST" enctype="multipart/form-data">   

                          <div class="form-group">
                            <label>Upload Proposal</label><br />
                            <input type="file" name="proposal">
                            <span style="color:red;font-size: 14px;">
                              <?php 
                                if(isset($error)){
                                  echo $error;
                                }
                               ?>
                            </span>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button> 
                      </form>

                  <?php }elseif($user['progress'] >=7){ ?>
                     <div class="alert alert-success">
                      Anda telah Submit <strong>Proposal.</strong>
                    </div>
                  <?php } ?>
               
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

 