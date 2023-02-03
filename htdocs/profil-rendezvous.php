<?php
require_once('traitement/connexion.php');

$id = $_GET['id'];

$request = $db->prepare(' SELECT appointments.id, appointments.idPatients, DATE_FORMAT(dateHour,"%d/%m/%Y %Hh%i") AS niceDate, patients.lastname, patients.firstname
                        FROM appointments 
                        INNER JOIN patients ON appointments.idPatients = patients.id
                        WHERE appointments.id = :id');
$request->execute(['id' => $id]);

$appointments = $request->fetch();
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
    <h1 class="titre">Fiche RDV n°<?=$_GET['id']?></h1>
    <br>
    <table>
        <tr>
            <th>Patient</th>
            <th>Date et heure</th>
            <th>Liens</th>

        </tr>
        
        <tr>
        <?=    "<td>" . $appointments['lastname'] . " " . $appointments['firstname'] . "</td>
            <td>" . $appointments['niceDate'] . "</td>
            <td> 
                <form action='modification-rendezvous.php' method='post'>
                    <input type='hidden' name='id' value=".$appointments['id'].">
                    <input type='hidden' name='idPatients' value=".$appointments['idPatients'].">
                    <input type='submit' value='modifier'>
                </form> 
            </td>
        </tr>";
        ?>
    
        
    </table>
</section>


<?php
    include('partial/footer.php');
?>