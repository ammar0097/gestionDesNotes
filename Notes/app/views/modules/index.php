<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/index" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
        <div class="row">
          <div class="col-md-12 titre">
            <h2>Modules</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT; ?>/modules/add" role="button">Ajout</a>
          </div> 
        </div>  
        <div class="row">
          <div class="col-md-12">
            <!-- Liste des modules-->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Intitulé</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <?php
                if(!empty($data['modules'])) { 
                    foreach($data['modules'] as $row) {
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $row->id ?></th>
                    <td><?php echo $row->intitule ?></td>
                    <td>
                        <a class="btn btn-danger" href="<?php echo URLROOT; ?>/modules/assign/<?php echo $row->id; ?>" role="button">Assigner</a>
                        <a class="btn btn-warning" href="<?php echo URLROOT; ?>/modules/edit/<?php echo $row->id; ?>" role="button">Modifier</a>
                        <a class="btn btn-danger" href="<?php echo URLROOT; ?>/modules/delete/<?php echo $row->id; ?>" role="button">Supprimer</a>
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
<?php require APPROOT . '/views/inc/foot.php'; ?>
