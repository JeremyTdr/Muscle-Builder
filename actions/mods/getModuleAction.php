<?php
require('actions/database.php');

//Récupération de la liste des modules
$getMods = $bdd->query('SELECT * FROM module ORDER BY id DESC');

//Récupération de la liste des modules par structure
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $moduleId = $_GET['id'];

    //Récupération de la liste des structures du module
    $getStructureMods = $bdd->query('SELECT * FROM structure_mods
                                INNER JOIN module ON (structure_mods.id_module = module.id) 
                                INNER JOIN structure ON (structure_mods.id_structure = structure.id)
                                WHERE structure_mods.id_module = '.$moduleId.'');

}
