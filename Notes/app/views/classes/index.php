<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/index" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
        <div class="row">
          <div class="col-md-12 titre">
            <h2>Classes</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT; ?>/classes/add" role="button">Ajout</a>
          </div> 
        </div>  
        <div class="row">
          <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Actions</th>

                    
                    </tr>
                </thead>
                <?php
                    foreach($data['classes'] as $classe) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $classe->id_classe ?></td>
                        <td><?php echo $classe->nom_classe ?></td>
                   
                        <td>
                        <a class="btn btn-warning" href="<?php echo URLROOT; ?>/classes/edit/<?php echo $classe->id_classe; ?>" role="button">Modifier</a>
                        <a class="btn btn-danger" href="<?php echo URLROOT; ?>/classes/delete/<?php echo $classe->id_classe; ?>" role="button">Supprimer</a>
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

