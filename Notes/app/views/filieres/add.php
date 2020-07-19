
<?php require APPROOT . '/views/inc/head.php'; ?>  
<a href="<?php echo URLROOT; ?>/filieres" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
    <div class="row">
        <div class="col-md-12 titre">
        <h2>filieres</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
        <form action="<?php echo URLROOT;?>/filieres/add" method="post">
            <div class="form-group">
            <label for="nom_filiere">Nom de filiere:</label>
            <input type="text" class="form-control" name="nom_filiere" required>
            </div>
              <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
