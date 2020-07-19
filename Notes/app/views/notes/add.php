<?php require APPROOT . '/views/inc/head.php'; ?>  
<a href="<?php echo URLROOT; ?>/notes/choix" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
    <div class="row">
        <div class="col-md-12 titre">
            <h2>Notes</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="<?php echo URLROOT;?>/notes/add">
                <div class="form-group">
                <label for="filiere">Filiere</label>
                <select name="filiere" class="form-control">

                <option value="<?php echo $data['filiere']->id_filiere ?>"><?php echo $data['filiere']->nom_filiere ?></option>

                </select>
                </div>
                <div class="form-group">
                <label for="classe">Classe</label>
                <select name="classe" class="form-control">
                
                <option value="<?php echo $data['classe']->id_classe ?>"><?php echo $data['classe']->nom_classe ?></option>

                </select>
                </div>
                <div class="form-group">
                <label for="semestre">Semestre</label>
                <select name="semestre" class="form-control">
                    <?php
                    if(!empty($data['semestres'])) { 
                    foreach($data['semestres'] as $row) {
                    ?>
                    <option value="<?php echo $row->id?>"><?php echo $row->intitule?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label for="module">Module</label>
                <select name="module" class="form-control">
                    <?php
                    if(!empty($data['modules'])) { 
                    foreach($data['modules'] as $row) {
                    ?>
                    <option value="<?php echo $row->id?>"><?php echo $row->intitule?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label for="devoir">Devoir</label>
                <select name="devoir" class="form-control">
                <?php
                    if(!empty($data['devoirs'])) { 
                    foreach($data['devoirs'] as $row) {
                    ?>
                    <option value="<?php echo $row->id_devoir?>"><?php echo $row->type_devoir?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label for="etudiant">Etudiant</label>
                <select name="etudiant" class="form-control">
                    <?php
                    foreach($data['etudiants'] as $row) {
                    ?>
                    <option value="<?php echo $row->num ?>"><?php echo $row->nom?> <?php echo $row->prenom?> </option>
                    <?php
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label for="note">note</label>
                <input type="number" min="0" max="20" step="0.01" class="form-control" name="note" required>
                </div>
                <button type="submit" class="btn btn-primary" name="add_record" value="Add">Ajouter</button>
            </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
