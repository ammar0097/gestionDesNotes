<?php require APPROOT . '/views/inc/head.php'; ?>

	<div class="row">

	
    <div class="col-md mx-auto ">
    <div class="row">
      <div class="col-6">
      <div class="login-logo text-center">
		<img src="<?php echo URLROOT; ?>/img/manouba.jpg" width="300" height="180" alt="manouba">
	</div>
      </div>
      <div class="col-6">
      <img src="<?php echo URLROOT; ?>/img/logo1.png" width="300" height="180" alt="esen">
	</div>
      </div>
      </div>
    </div>
   
      <div class="card card-body bg-light mt-5 login-form ">
      <?php if ($data['error']){ 
        ;?>
							<div class="alert alert-danger">
								<p>Authentication failed.</p>
							</div>
            <?php 
            } 
            
        ?>
        <h2>Connexion</h2>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group">
              <label>Adresse de courriel:<sup>*</sup></label>
              <input type="email" name="email"  class="form-control" required>
          </div>    
          <div class="form-group">
              <label>Mot de passe:<sup>*</sup></label>
              <input type="password" name="password"  class="form-control" required>
          </div>
              <input type="submit" class="btn btn-primary" value="Connexion">
        </form>
        </div>
      </div>
    </div>
  </div>
 




  </div>
</div>
  

    <?php require APPROOT . '/views/inc/foot.php'; ?>
