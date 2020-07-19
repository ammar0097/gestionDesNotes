<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/classes" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
    <div class="row">
        <div class="col-md-12 titre">
        <h2>Classes</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="<?php echo URLROOT; ?>/classes/edit/<?php echo $data["id"]; ?>">
            <div class="form-group">
            <label for="classe">Nom de classe</label>
            <input type="text" class="form-control" name="classe" value="<?php echo $data["classe"]?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>