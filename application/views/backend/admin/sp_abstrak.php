

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <?= $this->session->flashdata('messages') ?>
                <table class="table table-bordered zebra" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Tim</th>
                      <th>Tema</th>
                      <th>Judul</th>
                      <th>Files</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($teams as $team): ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $team->team_name?></td>
                        <td><?= $team->themes?></td>
                        <td><?= $team->title?></td>
                        <td><a href="<?php echo base_url('uploads/users/abstrak/').$team->path ?>">Download</a></td>
                        <td>
                          <?php if ($team->progress == 3): ?>
                            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#lolos<?=$team->user_id?>">
                              <i class="fas fa-arrow-up"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tidakLolos<?=$team->user_id ?>">
                             <i class="fas fa-arrow-down"></i>
                            </button>
                          <?php endif ?>
                          <?php if ($team->progress == 4): ?>
                           <span class="badge badge-danger">Tidak Lolos</span>
                          <?php endif ?>
                          <?php if ($team->progress >= 5): ?>
                            <span class="badge badge-success">Success</span>
                          <?php endif ?>

                         
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <?php foreach ($teams as $team): ?>
          <div class="modal fade" id="lolos<?=$team->user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Anda yakin ingin meloloskan tim <strong><?= $team->team_name?></strong> ke babak selanjutnya?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <a href="<?= site_url('admin/lolos_abstrak/').$team->user_id.'/'.$team->team_name ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>


        <?php foreach ($teams as $team): ?>
          <div class="modal fade" id="tidakLolos<?=$team->user_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Anda yakin ingin menggugurkan tim <strong><?= $team->team_name?></strong> ke babak selanjutnya?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <a href="<?= site_url('admin/tidak_lolos_abstrak/').$team->user_id.'/'.$team->team_name ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>


