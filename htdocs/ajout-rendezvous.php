<?php
include('../htdocs/partial/header.php');


require_once('traitement/connexion.php');
//Requete recherche patients
$request = $db->query('SELECT id, lastname, firstname FROM patients ORDER BY lastname');

$patients = $request->fetchAll(PDO::FETCH_ASSOC);
// var_dump($patients);
echo"<br><br>";

?>

<section>
    <h1>Ajouter un rendez-vous</h1>
    <br>
    <form action="traitement/enregistrement-rendezvous.php" method="post">
        <label for='name-select'>Choisissez un patient :</label>
        <select name='idPatients' required>
        <?php
        foreach ($patients as $patient){
            echo "<option value='{$patient['id']}'>{$patient['lastname']} {$patient['firstname']}</option>";
        }
        ?>
        </select>
        <br>
        <label for='dateHour'>Selectionnez date et heure </label>
        <input type="datetime-local" name='dateHour' required>
        <br>
        <input type="submit" value="envoyer">
    </form>   
</section>


    <!-- ----END FORM---------- -->


    
    <?php
include('partial/footer.php');
?>