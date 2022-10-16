<?php
    require('./actions/securityAction.php');
    require('./actions/entities/addStructureAction.php');
    require('./actions/entities/getStructureAction.php');
?>

<?php include './pages/base.php'; ?>

    <div class="section partenaire-details" id="partenaire-details">

        <h3 class="section-title"><?= $partnerName; ?></h3>
            <div class="section-content">
                <div class="structure-options">

                    <form class="btn-action" method="POST">
                        <?php if($partnerStatus == 0){
                            echo "<button class='btn enable-partner' type='submit' name='enablePartner'>Activer le partenaire</button>";
                        } else {
                            echo "<button class='btn disable-partner' type='submit' name='disablePartner'>Désactiver le partenaire</button>";
                        }
                        ?>
                    </form>

                    <div class="create-structure open-modal" id="create-structure"><i class="fas fa-plus"></i> Ajouter une structure</div>
                    <?php 
                        if(isset($errorMsg)){ echo "<p class='errorMsg'>" . $errorMsg . '</p>'; } 
                        if(isset($successMsg)){ echo "<p class='successMsg'>".$successMsg.'</p>'; }
                    ?>
                </div>
                    <ul class="partner-list">
                        <?php                        
                        while($structure = $getStructures->fetch()){
                        ?>
                        <li class="partner-list-item">
                            <a href="structure-edit.php?id=<?= $structure['id']; ?>">
                                <div class="name"><?= $structure['name']; ?></div>
                                <div class="address"><?= $structure['address']; ?>, <?= $structure['zip']; ?> <?= $structure['city']; ?></div>
                                <div class="email"><?= $structure['email']; ?></div>
                                <ul class="partner-rights">
                                <?php

                                $getModsByStructure = $bdd->query('SELECT * FROM structure_mods 
                                INNER JOIN structure ON (structure_mods.id_structure = structure.id)
                                INNER JOIN module ON (structure_mods.id_module = module.id)
                                WHERE id_structure = '.$structure['id'].'');

                                while($structureMods = $getModsByStructure->fetch()){
                                ?>
                                    <li class="partner-right"><div class="right-title"><?= $structureMods['name']; ?></div><div class="status
                                    <?php
                                    if($structureMods['status'] == 1){ echo('enable');} else { echo('disable'); }
                                    ?>
                                    "><i class="fas fa-circle"></i></div></li>
                                <?php
                                }
                                ?>    
                                </ul>
            
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
            </div>
        <!--- MODAL --->
        <div class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Ajouter une structure</h4>
                    <span class="close-modal"><i class="fas fa-times" id="close"></i></span>
                </div>
                <form class="add-modal" method="POST">
                    <label for="structureName" class="modal-label">Nom de la structure</label>
                    <input type="text" class="modal-input" name="structureName" value="<?= $partnerName; ?> ">
                    <label for="structureAddress" class="modal-label">Adresse de la structure</label>
                    <input type="text" class="modal-input" name="structureAddress">
                    <label for="structureZip" class="modal-label">Code postal</label>
                    <input type="zip" class="modal-input" name="structureZip">
                    <label for="structureCity" class="modal-label">Ville</label>
                    <input type="text" class="modal-input" name="structureCity">
                    <label for="structureEmail" class="modal-label">Adresse mail du contact</label>
                    <input type="mail" class="modal-input" name="structureEmail">
                    <button class="btn-add-modal" type="submit" name="createStructure">Ajouter</button>
                </form>
                
            </div>
        </div>
    </div>

<?php include './pages/include/foot.php'; ?>