    <style>
      ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {

    margin: 20px 0;
    padding-left: 20px;

}
ul.timeline > li >a {
 
  color:red;
  text-decoration: none;

}
ul.timeline > li:before {
    content: '';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
ul.timeline p.info{
  font-size: 15px;
}
ul.timeline .wait{
  color:#FFC107;
}
ul.timeline .done{
  color:green;
}
    </style>
  

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table fa-lg"></i>
              <h4 style="display:inline;">Latest News</h4></div>
            <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        
                        <ul class="timeline">
                          <li>
                            <a href="<?= site_url('competition/') ?>"><?= $user['progress'] >=1? '<span class="done">Pendaftaran</span>':'pendaftaran'?></a>
                            <span href="#" class="float-right"><?= $user['progress'] >=1 ? '<span class="badge badge-success">Selesai</span>': '<span class="badge badge-danger">Belum Selesai</span>'?></span>
                            <p class="info">Tim anda telah terdaftar pada tanggal <?=$user['created_at']?></p>
                            <p>Download Buku Panduan :
                                <?php
                                    if($user['cabor'] == 'sumo_robot'){
                                        echo "<a href='https://drive.google.com/open?id=1IkY-3TaB226jZPB6isp926nW7y-XezLZ' target='_blank'>Sumo Robot Competition Guide Book</a>";
                                    }else{
                                        
                                         echo "<a href='https://drive.google.com/open?id=1nVhjTBEwM7Jb7KyFM3foN3IwVBPX2atx' target='_blank'>Line Follower Competition Guide Book</a>";
                                    }
                                ?>
                            </p>
                          </li>

                          <li>
                            <a href="<?= site_url('competition/anggota') ?>"><?= $user['progress'] >=2? '<span class="done">Lengkapi Data Anggota</span>':'Lengkapi Data Anggota'?></a>
                            <span  class="float-right"><?= $user['progress'] >=2 ? '<span class="badge badge-success">Selesai</span>': '<span class="badge badge-danger">Belum Selesai</span>'?></span>
                            <p>Lengkapi data anggota dan kunci data anggota untuk ke tahap selanjutnya.</p>
                          </li>

                          <?php if ($user['progress'] <= 2): ?>
                            <li>
                              <a href="<?= site_url('competition/pembayaran') ?>"><span>Pembayaran</span></a>
                              <span class="float-right badge badge-danger">Belum Selesai</span>
                              <p>Segera lakukan pembayaran pagi yang lolos untuk ke tahap selanjutnya</p>
                            </li>
                          <?php elseif($user['progress'] <= 3) :?>
                             <li>
                              <a href="<?= site_url('competition/pembayaran') ?>"><span class="wait">Pembayaran</span></a>
                              <span class="float-right badge badge-warning">Menunggu Konfirmasi</span>
                              <p>Pembayaran kalian sedang di review oleh admin</p>
                            </li>

                          <?php elseif($user['progress'] >=4) :  ?>

                             <li>
                              <a href="<?= site_url('competition/pembayaran') ?>"><span class="done">Pembayaran</span></a>
                              <span class="float-right badge badge-success">Diterima</span>
                              <p>Pembayaran telah diterima</p>
                              <?php
                              if($user['cabor'] != 'sumo_robot'){
                            ?>
                            <p><a href="http://tedugm.com/uploads/track.zip">Download track</a></p>
                            <p><a href="http://tedugm.com/uploads/track_final.zip">Download track final</a></p>
                            <?php
                              }
                             ?>
                            </li>

                          <?php endif ?>

                   


                        </ul>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

 