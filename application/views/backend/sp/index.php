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
                            <a href="<?= site_url('science-project/') ?>"><?= $user['progress'] >=1? '<span class="done">Pendaftaran</span>':'pendaftaran'?></a>
                            <span href="#" class="float-right"><?= $user['progress'] >=1 ? '<span class="badge badge-success">Selesai</span>': '<span class="badge badge-danger">Belum Selesai</span>'?></span>
                            <p class="info">Tim anda telah terdaftar pada tanggal <?=$user['created_at']?><br />
                                Download buku panduan Science Project : <a href="https://drive.google.com/open?id=13dm9TRB3DgF9Uck-iH-UsyJzyQ0QDAD9" target="_blank">Guide_book_science_project.pdf</a>
                            </p>
                            
                          </li>

                          <li>
                            <a href="<?= site_url('science-project/anggota') ?>"><?= $user['progress'] >=2? '<span class="done">Lengkapi Data Anggota</span>':'Lengkapi Data Anggota'?></a>
                            <span  class="float-right"><?= $user['progress'] >=2 ? '<span class="badge badge-success">Selesai</span>': '<span class="badge badge-danger">Belum Selesai</span>'?></span>
                            <p>Lengkapi data anggota dan kunci data anggota untuk ke tahap selanjutnya.</p>
                          </li>

                          <li>
                            <a href="<?= site_url('science-project/abstrak') ?>"><?= $user['progress'] >=3? '<span class="done">Submit Abstrak</span>':'Submit Abstrak'?></a>
                            <span class="float-right"><?= $user['progress'] >=3 ? '<span class="badge badge-success">Selesai</span>': '<span class="badge badge-danger">Belum Selesai</span>'?></span>
                            <p>Submit abstrak anda dengan format <strong>.pdf (maks: 2MB)</strong></p>
                          </li>

                          <li>
                            <a href="<?= site_url('science-project/abstrak') ?>">
                              <?php 
                                if($user['progress'] <=2){
                                  echo '<span>Pengumuman</span>';
                                }
                                elseif($user['progress'] ==3){
                                  echo '<span class="wait">Menunggu Pengumuman</span>';
                                }elseif($user['progress'] ==4){
                                  echo 'Tidak Lolos';
                                }elseif($user['progress'] >=5){
                                  echo '<span class="done">Lolos Seleksi Abstrak</span>';
                                  
                                
                                }
                                
                               ?>
                            </a>
                            <span class="float-right">
                              <?php 
                                if($user['progress'] <=2){
                                   echo '<span class="badge badge-danger">Belum selesai</span>';
                                }elseif($user['progress'] <=3){
                                  echo '<span class="badge badge-warning">Menunggu</span>';
                                }elseif($user['progress'] ==4){
                                  echo '<span class="badge badge-danger">Tidak Lolos</span>';
                                }elseif($user['progress'] >=5){
                                  echo '<span class="badge badge-success">Lolos Seleksi Abstrak</span>';
                                }

                               ?>
                             </span>
                                  <p></p>
                          </li>

                          <?php if ($user['progress'] >= 5): ?>
                            <li>
                              <a href="<?= site_url('science-project/pembayaran') ?>"><?= $user['progress'] >=6? '<span class="done">Pembayaran</span>':'Pembayaran'?></a>
                              <span  class="float-right"><?= $user['progress'] >=6 ? '<span class="badge badge-success">Selesai</span>': '<span class="badge badge-danger">Belum Selesai</span>'?></span>
                              <p>Segera lakukan pembayaran pagi yang lolos ke tahap abstrak
                                <br />
                                <ul>
                                    <li>Biaya Registrasi : Rp 100.000-,</li>
                                    <li>216401002663539 - BRI a.n Rosalina Wahyuningsih</li>

                                    <li>2711076761 - BCA a.n  Faiz dhiaulhaq</li>

                                   <li> 0691657989 - BNI Syariah a.n Fridiana Dewi</li>
                                </ul>
                              </p>
                            </li>

                            <li>
                              <a href="<?= site_url('science-project/proposal') ?>"><?= $user['progress'] >=8? '<span class="done">Submit Proposal</span>':'Submit Proposal'?></a>
                              <span  class="float-right"><?= $user['progress'] >=8 ? '<span class="badge badge-success">Selesai</span>': '<span class="badge badge-danger">Belum Selesai</span>'?></span>
                              <p>Submit Proposal anda dengan format <strong>.pdf (maks: 2MB)</strong> </p>
                            </li>

                            <li>
                              <a href="<?= site_url('science-project/') ?>">
                                <?php 
                                  if($user['progress'] <8){
                                    echo '<span>Pengumuman Finalis</span>';
                                  }
                                  elseif($user['progress'] <=8){
                                    echo '<span class="wait">Menunggu Pengumuman</span>';
                                  }elseif($user['progress'] ==9){
                                    echo '<span class="badge badge-warning">Waiting list</span>';
                                  }elseif($user['progress'] >=10){
                                    echo '<span class="done">Lolos ke finalis</span>';
                                    
                                  }
                                 ?>
                              </a>
                              <span class="float-right">
                                <?php 
                                  if($user['progress'] <8){
                                     echo '<span class="badge badge-danger">Belum selesai</span>';
                                  }elseif($user['progress'] <=8){
                                    echo '<span class="badge badge-warning">Menunggu</span>';
                                  }elseif($user['progress'] ==9){
                                    
                                    echo '<p>Mohon maaf, proposal anda tidak lolos ke tahap final. Proposal anda akan masuk ke dalam waiting list kami</p>';
                                  }elseif($user['progress'] >=10){
                                    echo '<span class="badge badge-success">Lolos ke finalis</span>';
                                  }

                                 ?>
                               </span>
                                    <p></p>
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

 