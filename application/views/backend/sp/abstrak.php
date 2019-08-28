
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table fa-lg"></i>
              <h4 style="display:inline;">Submit Abstrak</h4></div>
              <div class="card-body">
              
              
                <?php 
                  if($user['progress'] <=1){?>
                    <div class="alert alert-warning">
                      Data anggota belum <strong>dikunci!!!</strong>
                      <a href="<?=site_url('sp/anggota')?>"> Kunci Data</a>
                    </div>
                    
                    
                 <?php }elseif($user['progress'] == 2){ ?>
                 
                      <div class="alert alert-danger" role="alert">
                        Mohon maaf, priode pengumpulan abstrak telah lewat
                        </div>
                        <!--
                    <form class="col-md-6" action="<?=site_url('sp/submit_abstrak')?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="tema">Tema</label>
                          <select class="custom-select mr-sm-2" name="themes" id="inlineFormCustomSelect" required>
                            <option value="kesehatan">Kesehatan</option>
                            <option value="infrastruktur">Infrastruktur</option>
                            <option value="energi">Energi</option>
                            <option value="penanggulangan">Penanggulangan Bencana</option>
                            <option value="agrikultur">Agrikultur</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="tema">Judul</label>
                          <input type="text" class="form-control" name="title" placeholder="Judul abstrak"  value="<?= set_value("title") ?>">
                          <span style="color:red;font-size: 14px;"><?=  form_error('title') ?></span>
                        </div>

                        <div class="form-group">
                          <input type="file" name="abstract">
                          <span style="color:red;font-size: 14px;">
                            <?php 
                              if(isset($error)){
                                echo $error;
                              }
                             ?>
                          </span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button> 
                    </form> -->
                  <?php
                  }elseif($user['progress'] >=3){?>
                    <div class="alert alert-success">
                      Anda telah submit <strong>abstrak.</strong>
                    </div>
                  <?php }?>
        
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

 