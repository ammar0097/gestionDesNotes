<?php require APPROOT . '/views/inc/head.php'; ?>  
<a href="<?php echo URLROOT; ?>/etudiants" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
    <div class="row">
        <div class="col-md-12 titre">
        <h2>Etudiants</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="<?php echo URLROOT; ?>/etudiants/add">
            <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" required>
            </div>
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
            <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
            <label for="password">Mot du passe</label>
            <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_record" value="Add">Ajouter</button>
        </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
