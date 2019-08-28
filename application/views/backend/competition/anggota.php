
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table fa-lg"></i>
              <h4 style="display:inline;">Data Anggota</h4>
              <?php if ($user['progress'] <=1): ?>

                <?php if (!empty($user['leader_identity']) AND ! empty($user['member1_identity'])): ?>
                     <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#kunciData">
                  Kunci Data
                   </button>
                <?php endif ?>
                <?php if (empty($user['member1_name'])): ?>
                   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editMember1">
                  Tambah Anggota
                   </button>
                <?php endif ?>
                <?php if (!empty($user['member1_name']) && empty($user['member2_name']) ): ?>
                   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editMember2">
                  Tambah Anggota
                   </button>
                <?php endif ?>
                <?php if (empty($user['supervisor_name']) ): ?>
                   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editPendamping">
                    Pendamping
                   </button>
                <?php endif ?>
              <?php endif ?>
              
            </div>
              <div class="card-body">
                <div class="row">
                  <?php if ($this->session->flashdata('error')): ?>
                    <div class="col-md-12">
                      <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('error')?> 
                      </div>
                    </div>
                  <?php endif ?>
                  <!-- Leader info  -->
                  <div class="col-md-3">  
                      <div class="card" style="width: 15rem;">
                        <div style="height:200px;">
                          
                        <?php 
                            if(!empty($user['leader_photo'])){
                        ?>
                             <a href="<?= base_url('uploads/users/photos/').$user['leader_photo']  ?>" data-rel="lightcase"> <img class="card-img-top img-responsive" src="<?= base_url('uploads/users/photos/').$user['leader_photo']?>" alt="Card image cap" style="height:100%" / ></a>
                        <?php    
                            }else{
                              echo '<img class="card-img-top" src="'.base_url('assets/images/user.png').'" alt="Card image cap" width="auto" height="200px">';
                          }
                         ?> 
                        
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Ketua Tim</h5>
                          <p class="card-text">
                            <strong><?php echo $user['leader_name'] ?></strong><br/>
                            <?php if (!empty($user['leader_identity'])): ?>
                              <a href="<?= base_url('uploads/users/identity/').$user['leader_identity']  ?>" data-rel="lightcase">Lihat Kartu Identitas</a>
                            <?php endif ?>
                          </p>
                          <?php if ($user['progress'] <=1): ?>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editKetua">Edit Data</button>
                          <?php endif ?>
                          
                        </div>
                      </div>
                  </div>

    

                  <!-- Member1 info  -->
                  <?php if (!empty($user['member1_name'])): ?>
                    <div class="col-md-3">  
                      <div class="card" style="width: 15rem;">
                        <div style="height:200px;">
                         
                          <a href="<?= base_url('uploads/users/photos/').$user['member1_photo']  ?>" data-rel="lightcase"> <img class="card-img-top img-responsive" src="<?= base_url('uploads/users/photos/').$user['member1_photo']  ?>" alt="Card image cap" style="height:100%" / ></a>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Anggota 1</h5>
                          <p class="card-text">
                            <strong><?php echo $user['member1_name'] ?></strong><br/>
                            <?php if (!empty($user['member1_identity'])): ?>
                              <a href="<?= base_url('uploads/users/identity/').$user['member1_identity']  ?>" data-rel="lightcase">Lihat Kartu Identitas</a>
                            <?php endif ?>
                          </p>
                          <?php if ($user['progress'] <=1): ?>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editMember1">Edit Data</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteMember1">Hapus</button>
                          <?php endif ?>
                          
                        </div>
                      </div>
                  </div>
                  <?php endif ?>

                  <!-- member2 info  -->

                  <?php if (!empty($user['member2_name'])): ?>
                    <div class="col-md-3">  
                      <div class="card" style="width: 15rem;">
                        <div style="height:200px;">
                         
                          <a href="<?= base_url('uploads/users/photos/').$user['member2_photo']  ?>" data-rel="lightcase"> <img class="card-img-top img-responsive" src="<?= base_url('uploads/users/photos/').$user['member2_photo']  ?>" alt="Card image cap" style="height:100%" / ></a>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Anggota 2</h5>
                          <p class="card-text">
                            <strong><?php echo $user['member2_name'] ?></strong><br/>
                            <?php if (!empty($user['member2_identity'])): ?>
                              <a href="<?= base_url('uploads/users/identity/').$user['member2_identity']  ?>" data-rel="lightcase">Lihat Kartu Identitas</a>
                            <?php endif ?>
                          </p>
                          <?php if ($user['progress'] <=1): ?>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editMember2">Edit Data</button> 
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteMember2">Hapus</button>
                          <?php endif ?>
                          
                        </div>
                      </div>
                  </div>
                  <?php endif ?>

                  <!-- Supervisor info  -->
                  <?php if (!empty($user['supervisor_name'])): ?>
                    <div class="col-md-3">  
                      <div class="card" style="width: 15rem;">
                        <img class="card-img-top" src="<?= base_url('assets/images/user.png')?>" alt="Card image cap" width="auto" height="200px">
                        <div class="card-body">
                          <h5 class="card-title">Pendamping</h5>
                          <p class="card-text">
                            <strong><?php echo $user['supervisor_name'] ?></strong>
                          </p>
                           <?php if ($user['progress'] <=1): ?>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editPendamping">Edit Data</button> 
                          <?php endif ?>
                        </div>
                      </div>
                  </div>
                  <?php endif ?>

                </div>   
                <br/>
                Note  
                <ul>
                   <li>Minimal anggota 2 orang per tim</li>
                  <li> Pas foto ketua tim wajib di upload</li>
                  <li> Foto Identitas wajib di upload</li>
                  <li>Data Pendamping tidak wajib diisi</li>
                </ul>
              </div>
            </div>
          </div>

        </div>



  <!-- /Lock Data Modal -->

<div class="modal fade" id="kunciData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda tidak akan bisa mengedit data peserta jika data telah dikunci.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <a href="<?= site_url('competition/lock_member') ?>"><button type="button" class="btn btn-primary">Setuju</button></a>
      </div>
    </div>
  </div>
</div>

<!-- /Edit  Data Ketua -->
<div class="modal fade" id="editKetua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Ketua Tim</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="col-md-12" action="<?=site_url('competition/update_member/ketua')?>" method="POST" enctype="multipart/form-data">
            
            <input type="hidden"  name="cur_photo" value="<?=$user['leader_photo'] ?>"> 
            <input type="hidden"  name="cur_identity" value="<?=$user['leader_identity'] ?>"> 

            <div class="form-group">
              <label for="tema">Nama</label>
              <input type="text" class="form-control" name="leader_name" value="<?=$user['leader_name'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('title') ?></span>
            </div>
            <div class="form-group">
              <label for="tema">Nomor Telepon</label>
              <input type="number" class="form-control" name="leader_phone" value="<?=$user['leader_phone'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('leader_phone') ?></span>
            </div>
            <div class="form-group">
              <label for="tema">Tanggal Lahir</label>
              <input type="date" class="form-control" name="leader_birth" placeholder="Judul abstrak"  value="<?=$user['leader_birth'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('title') ?></span>
            </div>

            <div class="form-group">
              <label for="leader_photo">Pas Foto</label><br/>
              <input type="file" name="leader_photo">
            </div>
            <div class="form-group">
              <?= empty($user['instance_name']) ? 'Foto KTP' : 'Foto KTM' ?><br/>
              <input type="file" name="leader_identity">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /Edit  Data member 1 -->
<div class="modal fade" id="editMember1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota 1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="col-md-12" action="<?=site_url('competition/update_member/member1')?>" method="POST" enctype="multipart/form-data">
            
            <input type="hidden"  name="cur_photo" value="<?=$user['member1_photo'] ?>">  
            <div class="form-group">
              <label for="member1_name">Nama</label>
              <input type="text" class="form-control" name="member1_name" value="<?=$user['member1_name'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('member1_name') ?></span>
            </div>
            <div class="form-group">
              <label for="member1_phone">Nomor Telepon</label>
              <input type="number" class="form-control" name="member1_phone" value="<?=$user['member1_phone'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('member1_phone') ?></span>
            </div>
            <div class="form-group">
              <label for="tema">Tanggal Lahir</label>
              <input type="date" class="form-control" name="member1_birth" placeholder="Judul abstrak"  value="<?=$user['member1_birth'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('member1_birth') ?></span>
            </div>

            <div class="form-group">
              <label for="leader_photo">Pas Foto</label><br/>
              <input type="file" name="member1_photo">
            </div>
            <div class="form-group">
              <label for="member1_name">
                <?= empty($user['instance_name']) ? 'Foto KTP' : 'Foto KTM' ?>
              </label><br />
              <input type="file" name="member1_identity">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /Edit  Data pendamping -->
<div class="modal fade" id="editPendamping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pendamping</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="col-md-12" action="<?=site_url('competition/update_member/pendamping')?>" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
              <label for="supervisor_name">Nama</label>
              <input type="text" class="form-control" name="supervisor_name" value="<?=$user['supervisor_name'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('supervisor_name') ?></span>
            </div>
            <div class="form-group">
              <label for="member1_phone">Nomor Telepon</label>
              <input type="number" class="form-control" name="supervisor_phone" value="<?=$user['supervisor_phone'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('supervisor_phone') ?></span>
            </div>   
            <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
      </div>
    </div>
  </div>
</div>

<!-- /Edit  Data member 2 -->
<div class="modal fade" id="editMember2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Anggota 2</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="col-md-12" action="<?=site_url('competition/update_member/member2')?>" method="POST" enctype="multipart/form-data">
            
            <input type="hidden"  name="cur_photo" value="<?=$user['member2_photo'] ?>"> 
            <input type="hidden"  name="cur_identity" value="<?=$user['member2_identity'] ?>"> 

            <div class="form-group">
              <label for="member1_name">Nama</label>
              <input type="text" class="form-control" name="member2_name" value="<?=$user['member2_name'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('member2_name') ?></span>
            </div>
            <div class="form-group">
              <label for="member1_phone">Nomor Telepon</label>
              <input type="number" class="form-control" name="member2_phone" value="<?=$user['member2_phone'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('member2_phone') ?></span>
            </div>
            <div class="form-group">
              <label for="tema">Tanggal Lahir</label>
              <input type="date" class="form-control" name="member2_birth" placeholder="Judul abstrak"  value="<?=$user['member2_birth'] ?>" required>  
              <span style="color:red;font-size: 14px;"><?=  form_error('member2_birth') ?></span>
            </div>

            <div class="form-group">
              <label for="leader_photo">Pas Foto</label><br/>
              <input type="file" name="member2_photo">
            </div>
            <div class="form-group">
              <label for="member1_name">
                <?= empty($user['instance_name']) ? 'Foto KTP' : 'Foto KTM' ?>
              </label><br />
              <input type="file" name="member2_identity">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button> 
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteMember1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $user['member1_name'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus <strong><?= $user['member1_name'] ?></strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?=site_url('competition/delete_member/member1')?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteMember2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $user['member2_name'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus <strong><?= $user['member2_name'] ?></strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?=site_url('competition/delete_member/member2')?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>