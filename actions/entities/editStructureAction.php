<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $structureId = $_GET['id'];

    //Récupération des infos de la structure
    $getStructureInfos = $bdd->prepare('SELECT * FROM structure WHERE id = ?');
    $getStructureInfos->execute(array($structureId));

    if($getStructureInfos->rowCount() > 0){
        
        $structureInfos = $getStructureInfos->fetch();

        $structureName = $structureInfos['name'];
        $structureAddress = $structureInfos['address'];
        $structureZip = $structureInfos['zip'];
        $structureCity = $structureInfos['city'];
        $structureEmail = $structureInfos['email'];

        $partnerId = $structureInfos['id_partner'];

        if(isset($_POST['updateStructure'])){

            $new_structure_name= htmlspecialchars($_POST['structure-name']);
            $new_structure_address= htmlspecialchars($_POST['structure-address']);
            $new_structure_zip= htmlspecialchars($_POST['structure-zip']);
            $new_structure_city= htmlspecialchars($_POST['structure-city']);
            $new_structure_email= htmlspecialchars($_POST['structure-email']);
    
            $modsStatus = 0;
    
            $updateMod = $bdd->prepare('UPDATE structure_mods SET status = ? WHERE id_structure = ?');
            $updateMod->execute(array($modsStatus, $structureId));
    
            $modsChecked = $_POST['check-module'];
    
            // Vérification et action pour modules-checks
            if(!empty($modsChecked)) {
                foreach($modsChecked as $modChecked)
                {
                    $modId = $modChecked;
                    $modsStatus = 1;
    
                    $updateMod = $bdd->prepare('UPDATE structure_mods SET status = ? WHERE id = ?');
                    $updateMod->execute(array($modsStatus, $modId));
                }
            }
            
            $editStructure = $bdd->prepare('UPDATE structure SET name = ?, address = ?, zip = ?, city = ?, email = ? WHERE id = ?');
            $editStructure->execute(array($new_structure_name, $new_structure_address, $new_structure_zip, $new_structure_city, $new_structure_email, $structureId));
            
            header("Location: ./partenaire-details.php?id=$partnerId");
        
        }   
    }

    
}