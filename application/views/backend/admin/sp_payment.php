

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
                      <th>Bukti </th>
                      <th>Action</th>
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
                        <td>
                         <a class="btn btn-primary" href="<?= base_url('uploads/users/payments/'). $team->path ?>" data-rel="lightcase"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>
                          <?php if ($team->progress == 6){ ?>
                              <button class="btn btn-success" data-toggle="modal" data-target="#tfKonfirm<?=$team->user_id?>"><i class="fas fa-check"></i></button>
                               <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$team->user_id?>"><i class="fas fa-times"></i></button>
                            
                          <?php }elseif($team->progress >= 6){
                            echo '<span class="badge badge-success">Sukses</span>';
                          } ?>

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

        <!-- Modal -->
   <?php foreach ($teams as $key => $team): ?>
     <div class="modal fade" id="tfKonfirm<?=$team->user_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran <?=$team->team_name?></h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             Anda yakin ingin mengkonfirmasi pembayaran tim <strong><?= $team->team_name ?>?</strong>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <a href="<?=site_url('admin/payment_confirmation/').$team->user_id.'/'.$team->team_name?>" class="btn btn-primary">Ya</a>
           </div>
         </div>
       </div>
     </div>
   <?php endforeach ?>

   <?php foreach ($teams as $key => $team): ?>
     <div class="modal fade" id="delete<?=$team->user_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Tolak Pembayaran <?=$team->team_name?></h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             Anda yakin ingin menolak pembayaran tim <strong><?= $team->team_name ?>?</strong>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <a href="<?=site_url('admin/payment_refuse/').$team->user_id.'/'.$team->team_name?>" class="btn btn-danger">Ya</a>
           </div>
         </div>
       </div>
     </div>
   <?php endforeach ?>