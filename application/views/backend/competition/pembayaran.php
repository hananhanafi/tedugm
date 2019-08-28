
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table fa-lg"></i>
              <h4 style="display:inline;">Pembayaran</h4></div>
              <div class="card-body">
                
                <!-- form submit -->

                 <?php if ($user['progress'] <=1){ ?>
                    <div class="alert alert-danger">
                      Anda belum mengkapi data <strong>Anggota.</strong>
                    </div>
                 <?php }elseif($user['progress'] ==2){ ?>
                    <form class="col-md-6" action="<?=site_url('competition/submit_payment')?>" method="POST" enctype="multipart/form-data">   

                        <div class="form-group">
                          <label>Upload Bukti Pembayaran</label><br />
                          <input type="file" name="payment">
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
                  <?php
                  }elseif($user['progress'] >=3){?>
                    <div class="alert alert-success">
                      Anda telah melakukan <strong>Pembayaran.</strong>
                    </div>
                  <?php }?>
               
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

 