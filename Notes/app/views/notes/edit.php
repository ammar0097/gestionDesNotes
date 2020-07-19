<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/notes" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
    <div class="row">
        <div class="col-md-12 titre">       
        <h2>Etudiants</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="<?php echo URLROOT; ?>/etudiants/edit/<?php echo $data["num"]; ?>">
            <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" value="<?php echo $data["nom"]?>" required>
            </div>
            <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" value="<?php echo $data["prenom"]?>" required>
            </div>
            <div class="form-group">
            <label for="filiere">Filière</label>
            <input type="text" class="form-control" name="filiere" value="<?php echo $data["filiere"]?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
