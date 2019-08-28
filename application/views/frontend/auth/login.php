
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Tech Entushiast Day 2018</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/normalize.css">
    <link rel='stylesheet' href='<?php echo base_url() ?>assets/styles/bootstrap.css'>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/style.css">
    
    <style>
      .error{
        color:red;
        display: block;
        font-size: 13px;
        margin: 5px 10px; ;
      }
    </style>

</head>

<body>
  
  <div class="container">
  <div class="row">
  <div class="col-md-6 col-xs-12">
  <div class="container__child signup__thumbnail">
	<p id="gmbr"><img src="<?php echo base_url() ?>assets/images/rusa-emas.png" height= "auto" width="400px"></p>
    <div class="thumbnail__content text-center">
		<h1 class="heading--primary" id="tipe">TECH ENTHUSIAST DAY</h1>
		<h2 class="heading--secondary" id="kettipe">TECH ENTHUSIAST DAY</h2>
    </div>
   
    <div class="signup__overlay">
	</div>
  </div>
  </div>
  <div  class="col-md-6 col-xs-12">
  <div class="container__child signup__form">
    
    <form id="formRegister" action="<?php echo site_url('auth/login/send') ?>" method="POST">
      <div class="form-group">
	    <h4 class= "h12">Login Page</h4>
      <br/>
      <?php if ($this->session->flashdata('login_error')): ?>
        <div class="alert alert-danger">
          <?= $this->session->flashdata('login_error')?>
        </div>
      <?php endif ?>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" id="email" placeholder="Email@mail.com"  value="<?= set_value('email')?>"  />
          <span class="error"><?= form_error('email')?></span>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="********" <?= set_value('password')?>  />
         <span class="error"><?= form_error('password')?></span>
      </div>
    
    
	  
      <div class="m-t-lg" align="center">
          
            <input class="btn btn--form " type="submit" value="LOGIN" />

      </div>
    </form>  
  </div>
