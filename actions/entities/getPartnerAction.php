<?php
require('actions/database.php');

//Récupération de la liste des partenaires
$getPartners = $bdd->query('SELECT * FROM partner ORDER BY id DESC');
