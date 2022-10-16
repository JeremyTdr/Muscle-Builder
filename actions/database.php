<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=Muscle Builder', 'root', 'root');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(Exception $e) {
    die('Une erreur a été trouvée : ' . $e->getMessage());
}