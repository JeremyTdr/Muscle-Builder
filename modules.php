<?php
    require('actions/securityAction.php');
    require('./actions/mods/addModuleAction.php');
    require('./actions/mods/getModuleAction.php');
?>

<?php include 'pages/base.php'; ?>

    <div class="section modules" id="modules">
        <h2>Modules</h2>
        <div class="section-content">
            <ul class="list">
                <div class="create-module open-modal" id="create-module"><i class="fas fa-plus"></i> Ajouter un module</div>
                <?php
                if(isset($errorMsg)){ echo "<p class='errorMsg'>" . $errorMsg . '</p>'; } 
                if(isset($successMsg)){ echo "<p class='successMsg'>".$successMsg.'</p>'; } 
                
                while($module = $getMods->fetch()){
                ?>
                    <li class="list-item">
                        <div class="name"><a href="module-details.php"><?= $module['name']; ?></a></div>
                        <div class="status">
                            <?php
                            $getModsCount = $bdd->query('SELECT id_structure FROM structure_mods WHERE id_module = '.$module['id'].'');
                            echo($getModsCount->rowCount());
                            ?>
                        </div>
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
                    <h4>Ajouter un module</h4>
                    <span class="close-modal"><i class="fas fa-times" id="close"></i></span>
                </div>
                <form class="add-modal" method="POST">
                    <label for="moduleName" class="modal-label">Nom du module</label>
                    <input type="text" class="modal-input" name="moduleName">
                    <button class="btn-add-modal" type="submit" name="createModule">Ajouter</button>
                </form>
                
            </div>
        </div>
    </div>

<?php include 'pages/include/foot.php'; ?>