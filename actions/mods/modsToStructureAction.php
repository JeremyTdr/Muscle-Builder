<?php

require('actions/database.php');

$structureId = $_GET['id'];

//Récupération de la liste des modules de la structure
$getStructureMods = $bdd->query('SELECT * FROM structure_mods
                            INNER JOIN module ON (structure_mods.id_module = module.id) 
                            INNER JOIN structure ON (structure_mods.id_structure = structure.id)
                            WHERE structure_mods.id_structure = '.$structureId.'');

//Selection du module dans la liste
if(isset($_POST['addModule']) ){

    $moduleId = $_POST['selectModule'];

    // Verification si module déjà existant pour ce partenaire
    $checkModAlreadyExists = $bdd->prepare('SELECT * FROM structure_mods WHERE id_module = ? AND id_structure = ?');
    $checkModAlreadyExists->execute(array($moduleId, $structureId));

    if($checkModAlreadyExists->rowCount() == 0){

        // Ajout du module pour le partenaire
        $addModule = $bdd->prepare('INSERT INTO structure_mods(id_module, id_structure)VALUES(?, ?)');
        $addModule->execute(array($moduleId, $structureId));

        $successMsg = "Le module à bien été ajouté.";

    } else {
        $errorMsg = "Ce module existe déjà";
    }
}
