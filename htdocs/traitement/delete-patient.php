<?php
require_once('connexion.php');

$id = $_POST['id'];

$request = $db->prepare(" DELETE FROM patients WHERE id = :id");

$request->execute(['id' => $id]);

header('Location: ../liste-patient.php');

// $request = $dbh->query("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES ( '.$lastname.', '.$firstname.', '.$birthdate.', '.$phone.', '.$mail.')");

// $request = $dbh->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES ( ?, ?, ?, ?, ?)");
// $request->execute([$lastname, $firstname, $birthdate, $phone, $mail]);