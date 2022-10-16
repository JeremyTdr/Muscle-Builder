<?php
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['createModule'])){

    // Vérification si tous les champs sont complétés
    if(!empty($_POST['moduleName'])){

        // Données du module
        $module_name = htmlspecialchars($_POST['moduleName']);

        
        // Verification si module déjà existant
        $checkModuleAlreadyExists = $bdd->prepare('SELECT name FROM module WHERE name = ?');
        $checkModuleAlreadyExists->execute(array($module_name));

        if($checkModuleAlreadyExists->rowCount() == 0){

            // Ajout de l'user dans la BDD
            $addModule = $bdd->prepare('INSERT INTO module(name)VALUES(?)');
            $addModule->execute(array($module_name));
                    
            $successMsg = "Le module à bien été ajouté.";

        } else {
            $errorMsg = "Ce module existe déjà";
        }
    }
}