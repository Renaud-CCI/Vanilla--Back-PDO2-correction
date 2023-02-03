<?php
require_once('traitement/connexion.php');

$request = $db->query(' SELECT appointments.id, appointments.idPatients, DATE_FORMAT(dateHour,"%d/%m/%Y %Hh%i") AS niceDate, patients.lastname, patients.firstname
                        FROM appointments 
                        INNER JOIN patients ON appointments.idPatients = patients.id
                        ORDER BY dateHour');

$appointments = $request->fetchAll();
?>

<?php
include('../htdocs/partial/header.php');
?>

<style>
    .titre {
        text-align: center;
        color: purple;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #dddddd;
    }
</style>

<section>
    <!-- affichage de tous les rdv -->
    <h1 class="titre">Liste des rendez-vous de l'hopital</h1>

    <table>
        <tr>
            <th>Patient</th>
            <th>Date et heure</th>
            <th>Liens</th>

        </tr>
        
        <?php foreach ($appointments as $appointment) {
            echo "<tr>
                        <td>" . $appointment['lastname'] . " " . $appointment['firstname'] . "</td>
                        <td>" . $appointment['niceDate'] . "</td>
                        <td> 
                            <form action='profil-rendezvous.php' method='get'>
                                <input type='hidden' name='id' value=".$appointment['id'].">
                                <input type='submit' value='fiche rdv'>
                            </form> 
                            <form action='traitement/delete-rendezvous.php' method='post'>
                                <input type='hidden' name='id' value=".$appointment['id'].">
                                <input type='submit' value='supprimer'>
                            </form> 
                        </td>
                    </tr>";
        }
        ?>
    </table>
</section>


<?php
    include('partial/footer.php');
?>