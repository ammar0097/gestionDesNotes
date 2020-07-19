<?php require APPROOT . '/views/inc/head.php'; ?>  
<a href="<?php echo URLROOT; ?>/semestres" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
    <div class="row">
        <div class="col-md-12 titre">
        <h2>Semestres</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
        <form method="POST">
            <div class="form-group">
            <label for="intitule">Intitulé</label>
            <input type="text" class="form-control" name="intitule" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_record" value="Add">Ajouter</button>
        </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
