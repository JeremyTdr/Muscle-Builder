<?php
    require('actions/securityAction.php');
    require('actions/mods/getModuleAction.php');
?>

<?php include 'pages/base.php'; ?>

    <div class="section module-details" id="module-details">
        <h2>Détails du module</h2>

        <div class="section-content">
            <ul class="list">
                <?php
                while($structureMods = $getStructureMods->fetch()){
                ?>

                    <li class="list-item">
                        <div class="name"><a href="structure-edit.php?id=<?= $structureMods['id_structure']; ?>"><?= $structureMods['name']; ?></a></div>
                        <div class="status">
                        <?php 
                        if($structureMods['status'] == 1){ 
                           echo "<i class='fas fa-circle active'></i> $structureMods[5] - Actif</div>";
                        } else {
                           echo "<i class='fas fa-circle inactive'></i> $structureMods[5] - Inactif</div>";
                        }
                        ?>
                    </li>

                <?php
                }
                ?>
            </ul>
        </div>
    </div>

<?php include 'pages/include/foot.php'; ?>