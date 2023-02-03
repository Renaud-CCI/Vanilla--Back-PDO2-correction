<?php
require_once('connexion.php');

$id = $_POST['id'];

$request= $db->prepare("DELETE FROM appointments WHERE idPatients=:id");

$request->execute(['id' => $id]); 

$request = $db->prepare(" DELETE FROM patients WHERE id = :id");

$request->execute(['id' => $id]);

header('Location: ../liste-patient.php');


