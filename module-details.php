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
                    <h3><?=$structureMods[5];?></h3>
                    <li class="list-item">
                        <a class="name" href="structure-edit.php?id=<?= $structureMods['id_structure']; ?>"><?= $structureMods['name']; ?></a>
                        <div class="status">
                        <?php 
                        if($structureMods['status'] == 1){ 
                        echo "<i class='fas fa-circle active'></i>Actif</div>";
                        } else {
                           echo "<i class='fas fa-circle inactive'></i>Inactif</div>";
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