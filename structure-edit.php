<?php
    require('./actions/securityAction.php');
    require('./actions/entities/editStructureAction.php');
    require('./actions/mods/getModuleAction.php');
    require('./actions/mods/modsToStructureAction.php');
?>

<?php include './pages/base.php'; ?>

    <div class="section structure-edit" id="structure-edit">
        <h3 class="section-title"><?= $structureName ?></h3>
        <div class="section-content">
            <form class="edit-structure" method="POST">
                <label for="structure-name" class="edit-structure-label">Nom de la structure</label>
                <input type="text" class="edit-structure-input" name="structure-name" value="<?= $structureName; ?>">
                <label for="structure-address" class="edit-structure-label">Adresse de la structure</label>
                <input type="text" class="edit-structure-input" name="structure-address" value="<?= $structureAddress; ?>">
                <label for="structure-zip" class="edit-structure-label">Code postal</label>
                <input type="zip" class="edit-structure-input" name="structure-zip" value="<?= $structureZip; ?>">
                <label for="structure-city" class="edit-structure-label">Ville</label>
                <input type="text" class="edit-structure-input" name="structure-city" value="<?= $structureCity; ?>">
                <label for="structure-email" class="edit-structure-label">Adresse mail du contact</label>
                <input type="mail" class="edit-structure-input" name="structure-email" value="<?= $structureEmail; ?>">
                
                <div class="edit-structure-label">Modules</div>
                <div class="mods-section">
                    <div class="add-module open-modal" id="add-module"><i class="fas fa-plus"></i> Ajouter un module</div>
                    
                    <?php
                    while($structureMods = $getStructureMods->fetch()){
                    ?>  
                        <div class="checkbox">
                            <input type="checkbox" class="check" name="check-module[]" id="check-<?=$structureMods[0];?>" value="<?=$structureMods[0];?>"
                            <?php if($structureMods['status'] == 1){ echo('checked');} ?> >
                            <label for="check-<?=$structureMods[0];?>" class="check-label"><?= $structureMods[5]; ?></label>
                        </div>
                    <?php
                    } 
                    ?>
                </div>
                
                <button class="btn add-structure" type="submit" name="updateStructure">Enregistrer</button>
            </form>
        </div>

        <!--- MODAL --->
        <div class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Ajouter un module</h4>
                    <span class="close-modal"><i class="fas fa-times" id="close"></i></span>
                </div>
                <form class="add-modal" method="POST">
                    <div class="select-module">
                        <div class="select-title">Choisissez le module souhaité</div>
                        <select name="selectModule" class="selectModule">
                            <?php
                            while($module = $getMods->fetch()){
                            ?>
                            <option value="<?=$module['id'];?>"><?=$module['name'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn-add-modal" type="submit" name="addModule">Ajouter</button>
                </form>
                
            </div>
        </div>

    </div>

<?php include './pages/include/foot.php'; ?>