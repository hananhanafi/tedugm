
	<p id="gmbr"><img src="<?php echo base_url() ?>assets/images/science_project.png" height= "300px" width="300px"></p>
    <div class="thumbnail__content text-center">
		<h1 class="heading--primary" id="tipe"></h1>
		<h2 class="heading--secondary" id="kettipe"></h2>
    </div>
   
    <div class="signup__overlay">
	</div>
  </div>
  </div>
  <div  class="col-md-6 col-xs-12">
   
 
  <div class="container__child signup__form">
    <h4 class= "h12" id="kettipe3">Line Follower &amp; Sumo Robot Competition</h4>
    
     <!-- <h1 style="color:black;">Penftaran telah di tutup :(</h1> -->
     
    <form id="formRegister" action="<?= site_url('auth/competition_register') ?>" method="POST">
      <div class="form-group">
        <label for="team">Cabang Lomba</label>
        <select class="form-control" name="cabor">
              <option disabled selected>Pilih Lomba</option>
              <option value="line_follower">Line Follower Competition</option>
              <option value="sumo_robot">Sumo Robot Competition</option>
        </select>
      </div>
      <div class="form-group">
          <label for="team">Nama Tim</label>
          <input class="form-control" type="text" name="team" placeholder="Nama Tim" value="<?php echo set_value('team') ?>" required />
          <span class="error"><?= form_error('team')?></span>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Email@mail.com" value="<?php echo set_value('email') ?>" required />
        <span class="error"><?= form_error('email')?></span>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="********" required />
        <span class="error"><?= form_error('password')?></span>
      </div>
           
      <div class="form-group">
        <label for="email">Instansi</label>
        <input class="form-control" type="text" name="instansi" id="Instansi" placeholder="Nama Instansi (kosongkan untuk umum)" value="<?php echo set_value('instansi') ?>" />
        <span class="error"><?= form_error('instansi')?></span>
      </div>

        </br>
      <div class="form-group">
        <label for="ketua">Nama Ketua Tim</label>
          <input class="form-control" type="text" name="ketua" id="ketua" placeholder="Nama Ketua" value="<?php echo set_value('ketua') ?>" required />
          <span class="error"><?= form_error('ketua')?></span>
      </div>

      <div class="form-group">
        <label for="hp">Nomor HP</label>
        <input class="form-control" type="number" name="phone" id="nohp" placeholder="628xxxxxxxxxx" value="<?php echo set_value('phone') ?>" required />
          <span class="error"><?= form_error('phone')?></span>
      </div>
           
      </br>
      <div class="form-group">
        <label for="pendamping">Nama Pendamping</label>
        <input class="form-control" type="text" name="pendamping" id="Pendamping" placeholder="Nama Pendamping (kosongkan untuk umum)" value="<?php echo set_value('pendamping') ?>"/>
        <span class="error"><?= form_error('pendamping')?></span>
      </div>
          
      <div class="m-t-lg" align="center">
        <input class="btn btn--form " type="submit" value="Register" />
      </div>

    </form> 

  </div> 

