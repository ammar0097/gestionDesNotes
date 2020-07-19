<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/modules/index" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
         
        <div class="row">
        <h2>Module: <?php echo $data['nom']->intitule; ?></h2>
          <div class="col-md-12">
            <!-- Liste des assignees-->
           
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Filiere</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                if(!empty($data['modules'])) { 
                    foreach($data['modules'] as $row) {
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $row->nom_filiere ?></th>
                    <td><?php echo $row->nom_classe ?></td>
                    <td>
                        <a class="btn btn-danger" href="<?php echo URLROOT; ?>/modules/deleteAssign/<?php echo $row->id; ?>/<?php echo $row->id_filiere; ?>/<?php echo $row->id_classe; ?>" role="button">Supprimer</a>
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
        <div class="row">
          <div class="col-md-12 titre">
            <h2>Assigner</h2>
            <form method="POST" action="<?php echo URLROOT; ?>/modules/addAssign/<?php echo $data["id"]; ?>"> 
            <div class="form-group">
            <label for="filiere">Filiere</label>
                <select name="filiere" class="form-control">
                    <?php
                    foreach($data['filieres'] as $row) {
                    ?>
                    <option value="<?php echo $row->id_filiere ?>"><?php echo $row->nom_filiere?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <label for="classe">Classe</label>
                <select name="classe" class="form-control">
                    <?php
                    foreach($data['classes'] as $row) {
                    ?>
                    <option value="<?php echo $row->id_classe ?>"><?php echo $row->nom_classe?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
                <button type="submit" class="btn btn-primary" name="add_record" value="Add">Ajouter</button>            
            </form> 
          </div> 
        </div> 
<?php require APPROOT . '/views/inc/foot.php'; ?>
