<?php
require_once('connexion.php');

$id = $_POST['id'];

$request = $db->prepare(" DELETE FROM appointments WHERE id = :id");

$request->execute(['id' => $id]);

header('Location: ../liste-rendezvous.php');