

          <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
              <i class="fas fa-table"></i>
              Detail Anggota
          </div>
          <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="card">
                      <img class="card-img-top img-thumbnail" src="<?= base_url('uploads/users/photos/').$team['leader_photo'] ?>" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Ketua Tim</h5>
                        <p class="card-text">
                          Nama Lengkap :<br/> <?= $team['leader_name'] ?><br/>
                          Email :<br/> <?= $team['email'] ?><br/>
                          Nomor Hp : <br/><?= $team['leader_phone'] ?><br/>
                          Tanggal Lahir : <br/><?= $team['leader_birth'] ?>
                        </p>
                         <a href="<?= base_url('uploads/users/identity/').$team['leader_identity']  ?>" data-rel="lightcase" class="btn btn-primary" >Lihat Identitas</a>
                      </div>
                    </div>
                  </div>

                  <!-- member1  -->
                  <?php if (!empty($team['member1_name'])): ?>
                    <div class="col-md-3">
                      <div class="card">
                        <img class="card-img-top img-thumbnail" src="<?= base_url('uploads/users/photos/').$team['member1_photo'] ?>" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Anggota 1</h5>
                          <p class="card-text">
                            Nama Lengkap : <br/><?= $team['member1_name'] ?><br/>
                            Nomor Hp : <br/><?= $team['member1_phone'] ?><br/>
                            Tanggal Lahir : <br/><?= $team['member1_birth'] ?>
                          </p>
                           <a href="<?= base_url('uploads/users/identity/').$team['member1_identity']  ?>" data-rel="lightcase" class="btn btn-primary">Lihat Identitas</a>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>

                  <?php if (!empty($team['member2_name'])): ?>
                    <div class="col-md-3">
                      <div class="card">
                        <img class="card-img-top img-thumbnail" src="<?= base_url('uploads/users/photos/').$team['member2_photo'] ?>" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Anggota 2</h5>
                          <p class="card-text">
                            Nama Lengkap : <br/><?= $team['member2_name'] ?><br/>
                            Nomor Hp : <br/><?= $team['member2_phone'] ?><br/>
                            Tanggal Lahir : <br/><?= $team['member2_birth'] ?>
                          </p>
                           <a href="<?= base_url('uploads/users/identity/').$team['member2_identity']  ?>" data-rel="lightcase" class="btn btn-primary">Lihat Identitas</a>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>

                  <?php if (!empty($team['instance_name'])): ?>
                    <div class="col-md-3">  
                      <div class="card ">
                        <img class="card-img-top img-thumbnail" src="<?= base_url('assets/images/user.png')?>" alt="Card image cap" width="auto" height="200px">
                        <div class="card-body">
                          <h5 class="card-title">Pendamping</h5>
                          <p class="card-text">
                            Nama Pendamping : <br/><?php echo $team['supervisor_name'] ?><br/>
                            Nomor Hp: <br/><?php echo $team['supervisor_phone'] ?><br/>
                          </p>
                        </div>
                      </div>
                  </div>
                  <?php endif ?>

               

                

                </div>
          </div>
        </div>

  
        <!-- /.container-fluid -->

   

      
