<?php
require_once('traitement/connexion.php');

$id = $_POST['id'];

$request = $db->prepare(' SELECT * FROM appointments
                        WHERE appointments.id = :id');
$request->execute(['id' => $id]);

$appointments = $request->fetch();

$request = $db->query('SELECT id, lastname, firstname FROM patients ORDER BY lastname');

$patients = $request->fetchAll(PDO::FETCH_ASSOC);

include('partial/header.php');
?>


<section>
    <h1>Modifier un rendez-vous</h1>
    <br>
    <form action="traitement/enregistrement-rendezvous.php" method="post">
        <label for='name-select'>Choisissez un patient :</label>
        <select name='idPatients' required>
        <?php
        foreach ($patients as $patient){
            if ($patient['id'] == $_POST['idPatients']){
    echo "<option value='{$patient['id']}' selected>{$patient['lastname']}" . " " . "{$patient['firstname']}</option>";
} else {
    echo "<option value='{$patient['id']}'>{$patient['lastname']}" . " " . "{$patient['firstname']}</option>";   
}

        }
        ?>
                foreach ($patients as $patient){


};
        </select>
        <br>
        <label for='dateHour'>Selectionnez date et heure </label>
        <input type="datetime-local" name='dateHour' value='<?=$appointments['dateHour']?>' required>
        <br>
        <input type="submit" value="envoyer">
    </form>   
</section>


<?php

include('partial/footer.php');


