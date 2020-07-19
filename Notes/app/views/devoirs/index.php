<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/index" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
        <div class="row">
          <div class="col-md-12 titre">
            <h2>Devoirs</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT; ?>/devoirs/add" role="button">Ajout</a>
          </div> 
        </div>  
        <div class="row">
          <div class="col-md-12">
            <!-- Liste des filieres-->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Type devoir</th>
                    <th scope="col">Actions</th>

                    
                    </tr>
                </thead>
                <?php
                    foreach($data['devoirs'] as $devoir) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $devoir->id_devoir ?></td>
                        <td><?php echo $devoir->type_devoir ?></td>
                   
                        <td>
                        <a class="btn btn-warning" href="<?php echo URLROOT; ?>/devoirs/edit/<?php echo $devoir->id_devoir; ?>" role="button">Modifier</a>
                        <a class="btn btn-danger" href="<?php echo URLROOT; ?>/devoirs/delete/<?php echo $devoir->id_devoir; ?>" role="button">Supprimer</a>
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

