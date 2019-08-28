

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered zebra" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Tim</th>
                      <th>Instansi</th>
                      <th>Ketua Tim</th>
                      <th>Cabang Lomba</th>
                      <th>Status</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($teams as $team): ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $team->team_name?></td>
                        <td>
                          <?php 
                            if(empty($team->instance_name)){
                              echo "umum";
                            }else{
                              echo $team->instance_name;
                            }
                           ?>
                        </td>
                        <td><?= $team->leader_name?></td>
                        <td><?= $team->cabor ?></td>
                        <td>
                          <?php 
                              switch ($team->progress) {
                                case 1:
                                  echo '<span class="badge badge-success">Registrasi</span>';
                                  break;
                                
                                case 2:
                                   echo '<span class="badge badge-warning" style="color:white">Melengkapi Data Anggota</span>';
                                  break;
                                case 3:
                                  echo '<span class="badge badge-primary">Menunggu Konfirmasi Pembayaran</span>';
                                  break;
                                case 4:
                                  echo '<span class="badge badge-danger">Pembayaran Sukses</span>';
                                  break;                   
 
                              }
                           ?>
                        </td>
                        <td><a href="<?php echo site_url('admin/competition/detail-tim/').$team->team_id ?>">Lihat</a></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->