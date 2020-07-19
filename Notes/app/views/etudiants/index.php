<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/index" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
        <div class="row">
          <div class="col-md-12 titre">
            <h2>Etudiants</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT; ?>/etudiants/add" role="button">Ajout</a>
          </div> 
        </div>  
        <div class="row">
          <div class="col-md-12">
            <!-- Liste des etudiants-->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Filière</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <?php
                if(!empty($data['etudiants'])) { 
                    foreach($data['etudiants'] as $row) {
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $row->num ?></th>
                    <td><?php echo $row->nom ?></td>
                    <td><?php echo $row->prenom ?></td>
                    <td><?php echo $row->email?></td>
                    <td><?php echo $row->nom_filiere ?></td>
                    <td><?php echo $row->nom_classe ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo URLROOT; ?>/etudiants/edit/<?php echo $row->num; ?>" role="button">Modifier</a>
                        <a class="btn btn-danger" href="<?php echo URLROOT; ?>/etudiants/delete/<?php echo $row->num; ?>" role="button">Supprimer</a>
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
