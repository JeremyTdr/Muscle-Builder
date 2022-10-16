<?php
require('actions/database.php');

// Validation du formulaire
if(isset($_POST['createPartner'])){

    // Vérification si tous les champs sont complétés
    if(!empty($_POST['partnerName']) AND !empty($_POST['partnerEmail'])){

        // Données du partenaire
        $partner_name = htmlspecialchars($_POST['partnerName']);
        $partner_email = htmlspecialchars($_POST['partnerEmail']);
        $partner_enable;

        if(isset($_POST['enablePartner'])){
            $partner_enable = 1;
        } else if(isset($_POST['disablePartner'])){
            $partner_enable = 0;
        }

        // Verification si partenaire déjà existant
        $checkPartnerAlreadyExists = $bdd->prepare('SELECT name FROM partner WHERE name = ?');
        $checkPartnerAlreadyExists->execute(array($partner_name));

        if($checkPartnerAlreadyExists->rowCount() == 0){

            // Ajout de l'user dans la BDD
            $addPartner = $bdd->prepare('INSERT INTO partner(name, email, enable)VALUES(?, ?, ?)');
            $addPartner->execute(array($partner_name, $partner_email, $partner_enable));
                    
            $successMsg = "Le partenaire à bien été ajouté.";

        } else {
            $errorMsg = "Ce partenaire existe déjà";
        }
    }
}