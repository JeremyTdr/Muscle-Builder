<?php
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['createStructure'])){

    // Vérification de récupération de l'id partenaire
    if(isset($_GET['id']) AND !empty($_GET['id'])){

        // Vérification si tous les champs sont complétés
        if(!empty($_POST['structureName']) AND !empty($_POST['structureAddress']) AND !empty($_POST['structureZip']) AND !empty($_POST['structureCity']) AND !empty($_POST['structureEmail'])){

            // Données de la structure
            $structure_name = htmlspecialchars($_POST['structureName']);
            $structure_address = htmlspecialchars($_POST['structureAddress']);
            $structure_zip = htmlspecialchars($_POST['structureZip']);
            $structure_city = htmlspecialchars($_POST['structureCity']);
            $structure_email = htmlspecialchars($_POST['structureEmail']);
            $partnerId = $_GET['id'];

            
            // Verification si structure déjà existante
            $checkStructureAlreadyExists = $bdd->prepare('SELECT name FROM structure WHERE name = ?');
            $checkStructureAlreadyExists->execute(array($structure_name));

            if($checkStructureAlreadyExists->rowCount() == 0){

                // Ajout de la structure dans la BDD
                $addStructure = $bdd->prepare('INSERT INTO structure(name, address, zip, city, email, id_partner)VALUES(?, ?, ?, ?, ?, ?)');
                $addStructure->execute(array($structure_name, $structure_address, $structure_zip, $structure_city, $structure_email, $partnerId));
                        
                $successMsg = "La structure à bien été ajouté";

            } else {
                $errorMsg = "Cette structure existe déjà";
            }
        }

    } else {
        $errorMsg = "Erreur lors de la récupération du partenaire";
    }

    
}