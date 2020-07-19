<?php if(isset($_SESSION['id_user'])&&($_SESSION['user_role_id'])==1) :   ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top shadow p-3 mb-5 bg-white rounded">
      <div class="container">
        <a class="navbar-brand" href="#">ESEN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo URLROOT; ?>/index.php">Acceuil
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/etudiants/index">Etudiants</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/notes/index">Notes</a>
            </li>
           
            <li class="nav-item">
            <a class="nav-link user-nav" href=""><i class="fa fa-user"><?php echo " ". $_SESSION['user_username']; ?></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="<?php echo URLROOT; ?>/users/logout">Déconnecter</a>
            </li>
        </div>
      </div>
    </nav>

    <?php elseif(isset($_SESSION['id_user'])&&($_SESSION['user_role_id'])==3) :   ?>

      <nav class="navbar navbar-expand-lg navbar-light bg-light static-top shadow p-3 mb-5 bg-white rounded">
      <div class="container">
        <a class="navbar-brand" href="#">ESEN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo URLROOT; ?>/index.php">Acceuil
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/notes/index">Notes</a>
            </li>
         
            <li class="nav-item">
            <a class="nav-link user-nav" href=""><i class="fa fa-user"><?php echo " ". $_SESSION['user_username']; ?></i></a>
            </li>
            <li class=" nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Déconnecter</a>
            </li>
        
          </ul>
        </div>
      </div>
    </nav>


    <?php elseif(isset($_SESSION['id_user'])&&($_SESSION['user_role_id'])==2) :   ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light static-top shadow p-3 mb-5 bg-white rounded">
<div class="container">
  <a class="navbar-brand" href="#">ESEN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/index.php">Acceuil
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/statistiques/index">Statistique</a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/employes">Employés</a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/admins/index">Admins</a>
       </li>
       <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/modules/index">Modules</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/semestres/index">Semestres</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/devoirs/index">Devoirs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/filieres/index">Filieres</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/classes/index">Classes</a>
            </li>
   
      <li class="nav-item">
      <a class="nav-link user-nav" href=""><i class="fa fa-user"><?php echo " ". $_SESSION['user_username']; ?></i></a>
      </li>
      <li class=" nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Déconnecter</a>
      </li>
  
    </ul>
  </div>
</div>
</nav>
    <?php endif; ?>

