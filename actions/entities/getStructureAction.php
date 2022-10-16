<?php

require('actions/database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $partnerId = $_GET['id'];

    //Récupération de la liste des structure du partenaire (id)
    $getStructures = $bdd->query('SELECT * FROM structure WHERE id_partner = '.$partnerId.'');

    //Récupération des infos du partenaire
    $getPartnerInfos = $bdd->prepare('SELECT * FROM partner WHERE id = ?');
    $getPartnerInfos->execute(array($partnerId));

            //Récupération du nom et status du partenaire
            if($getPartnerInfos->rowCount() > 0){
                $partnerInfos = $getPartnerInfos->fetch();
                $partnerName = $partnerInfos['name'];
                $partnerStatus = $partnerInfos['enable'];

                //CHECKBOX STATUS PARTENAIRE
                if(isset($_POST['enablePartner'])){
                    $partnerStatus = 1;

                    $editPartner = $bdd->prepare('UPDATE partner SET enable = ? WHERE id = ?');
                    $editPartner->execute(array($partnerStatus, $partnerId));
                }

                if(isset($_POST['disablePartner'])){
                    $partnerStatus = 0;

                    $editPartner = $bdd->prepare('UPDATE partner SET enable = ? WHERE id = ?');
                    $editPartner->execute(array($partnerStatus, $partnerId));
                }
            }


} else {
    $errorMsg = "Erreur lors de la récupération du partenaire";
}

