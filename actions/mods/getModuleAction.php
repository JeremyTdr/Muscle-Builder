<?php
require('actions/database.php');

//Récupération de la liste des modules
$getMods = $bdd->query('SELECT * FROM module ORDER BY id DESC');


