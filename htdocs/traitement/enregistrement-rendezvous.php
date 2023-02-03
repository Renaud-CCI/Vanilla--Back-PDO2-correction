<?php
require_once('../traitement/connexion.php');

$idPatients = $_POST['idPatients'];
$dateHour = $_POST['dateHour'];


// Préparation
$insertPatient = $db->prepare('INSERT INTO appointments (idPatients, dateHour)
        VALUES (:idPatients, :dateHour)
        ');

// Exécution 
$insertPatient->execute([   'idPatients' => $idPatients,
                            'dateHour' => $dateHour
                            ]); 
    
header("Location: ../index.php");
