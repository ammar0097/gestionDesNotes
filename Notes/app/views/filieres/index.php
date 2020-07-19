<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/index" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
        <div class="row">
          <div class="col-md-12 titre">
            <h2>Filieres</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT; ?>/filieres/add" role="button">Ajout</a>
          </div> 
        </div>  
        <div class="row">
          <div class="col-md-12">
            <!-- Liste des filieres-->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Filiere</th>
                    <th scope="col">Actions</th>

                    </tr>
                </thead>
                <?php
                    foreach($data['filieres'] as $filiere) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $filiere->id_filiere ?></td>
                        <td><?php echo $filiere->nom_filiere ?></td>
                   
                        <td>
                        <a class="btn btn-warning" href="<?php echo URLROOT; ?>/filieres/edit/<?php echo $filiere->id_filiere; ?>" role="button">Modifier</a>
                        <a class="btn btn-danger" href="<?php echo URLROOT; ?>/filieres/delete/<?php echo $filiere->id_filiere; ?>" role="button">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
                <?php
                }
                
                ?>
            </table>
          </div>
        </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>

