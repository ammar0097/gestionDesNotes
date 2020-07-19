<?php require APPROOT . '/views/inc/head.php'; ?>
  
<!-- si l'utilisteur est un employé -->
<?php if(($_SESSION['user_role_id'])==1) :   ?>
  <a href="<?php echo URLROOT; ?>/index" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
        <div class="row">
          <div class="col-md-12 titre">
            <h2>Notes</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT; ?>/notes/choix" role="button">Ajout</a>
          </div> 
        </div>  
        <div class="row">
          <div class="col-md-12">
            <!-- Liste des notes-->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Semestre</th>
                    <th scope="col">Filière</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Module</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Devoir</th>
                    <th scope="col">Note</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <?php
                if(!empty($data['notes'])) { 
                    foreach($data['notes'] as $row) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row->semestre ?></td>
                        <td><?php echo $row->filiere ?></td>
                        <td><?php echo $row->classe ?></td>
                        <td><?php echo $row->module ?></td>
                        <td><?php echo $row->nom ?></td>
                        <td><?php echo $row->prenom ?></td>
                        <td><?php echo $row->devoir ?></td>
                        <td><?php echo $row->note ?></td>
                        <td>
                        <a class="btn btn-danger" href="<?php echo URLROOT; ?>/notes/delete/<?php echo $row->num_etudiant ?>/<?php echo $row->id_semestre ?>/<?php echo $row->id_module ?>/<?php echo $row->id_filiere ?>/<?php echo $row->id_classe ?>/<?php echo $row->id_devoir ?>" role="button">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
                <?php
                }
                }
                ?>
            </table>
          </div>
        </div>



        <!-- si l'utilisteur est un eleve -->
        <?php elseif(($_SESSION['user_role_id'])==3) :   ?>
          <a href="<?php echo URLROOT; ?>/index" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
          <div class="row">
          <div class="col-md-12 titre">
            <h2>Notes</h2>
          </div> 
        </div>  
        <div class="row">
          <div class="col-md-12">
            <!-- Liste des notes-->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Semestre</th>
                    <th scope="col">Module</th>
                    <th scope="col">Devoir</th>
                    <th scope="col">Note</th>
                    </tr>
                </thead>
                <?php
                if(!empty($data['notes'])) { 
                    foreach($data['notes'] as $row) {
                ?>
                <tbody>
                  <?php
                  if($row->note>=10)
                  {
                  ?>
                    <tr class="table-success">
                      <?php
                  }
                  ?>
                  <?php
                  if($row->note<10)
                  {
                  ?>
                    <tr class="table-danger">
                      <?php
                  }
                  ?>
                        <td><?php echo $row->semestre ?></td>
                        <td><?php echo $row->module ?></td>
                        <td><?php echo $row->devoir ?></td>
                        <td><?php echo $row->note ?></td>
                        <td>
                        </td>
                    </tr>
                </tbody>
               
                <?php
                }
                }
                ?>
            </table>
          </div>
        </div>



        <?php endif;  ?>


<?php require APPROOT . '/views/inc/foot.php'; ?>
