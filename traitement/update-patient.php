<?php
require_once('connexion.php');

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$birthdate = $_POST['birthdate'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$id = $_POST['id'];

$request = $db->prepare("   UPDATE patients 
                            SET  lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail 
                            WHERE id = :id");

$request->execute([ 'lastname' => $lastname, 
                    'firstname' => $firstname, 
                    'birthdate' => $birthdate, 
                    'phone' => $phone, 
                    'mail' => $mail,
                    'id' => $id
                    ]);

header("Location: ../profil-patient.php?id=$id");








// $request = $dbh->query("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES ( '.$lastname.', '.$firstname.', '.$birthdate.', '.$phone.', '.$mail.')");

// $request = $dbh->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES ( ?, ?, ?, ?, ?)");
// $request->execute([$lastname, $firstname, $birthdate, $phone, $mail]);