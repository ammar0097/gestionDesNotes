<?php require APPROOT . '/views/inc/head.php'; ?>
<a href="<?php echo URLROOT; ?>/devoirs" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
    <div class="row">
        <div class="col-md-12 titre">
        <h2>Devoirs</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="<?php echo URLROOT; ?>/devoirs/edit/<?php echo $data["id"]; ?>">
            <div class="form-group">
            <label for="devoir">Type de devoir</label>
            <input type="text" class="form-control" name="devoir" value="<?php echo $data["devoir"]?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
