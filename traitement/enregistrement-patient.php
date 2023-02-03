<?php
require_once('connexion.php');

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$birthdate = $_POST['birthdate'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];

$request = $db->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES ( :lastname, :firstname, :birthdate, :phone, :mail)");

$request->execute([ 'lastname' => $lastname, 
                    'firstname' => $firstname, 
                    'birthdate' => $birthdate, 
                    'phone' => $phone, 
                    'mail' => $mail
                    ]);

header('Location: ../liste-patient.php');








// $request = $dbh->query("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES ( '.$lastname.', '.$firstname.', '.$birthdate.', '.$phone.', '.$mail.')");

// $request = $dbh->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES ( ?, ?, ?, ?, ?)");
// $request->execute([$lastname, $firstname, $birthdate, $phone, $mail]);