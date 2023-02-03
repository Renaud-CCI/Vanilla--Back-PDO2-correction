<?php
require_once('traitement/connexion.php');

$id = $_GET['id'];

// requete des clients avec une carte de fidélité
$request =  $db->prepare('SELECT * FROM patients WHERE id = :id');
$request->execute([ 'id' => $id
                    ]);

$patient = $request->fetch();

$request = $db->prepare(' SELECT *, DATE_FORMAT(dateHour,"%d/%m/%Y %Hh%i") AS niceDate
                        FROM appointments 
                        WHERE idPatients = :id
                        ORDER BY dateHour');
$request->execute([ 'id' => $id
]);
$appointments = $request->fetchAll();

?>

<?php
include('partial/header.php');
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
    <!-- affichage de tous les clients -->
    <h1 class="titre"> Clients </h1>

    <table>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>birthdate</th>
            <th>phone</th>
            <th>mail</th>
            <th>modifier</th>

        </tr>

        
        <?php 
        echo    "<tr>
                    <td>" . $patient["lastname"] . "</td>
                    <td>" . $patient["firstname"] . "</td>
                    <td>" . $patient["birthdate"] . "</td>
                    <td>" . $patient["phone"] . "</td>
                    <td>" . $patient["mail"] . "</td>
                    <td>  
                        <form action='modification-patient.php' method='post'>
                            <input type='hidden' name='id' value=".$patient['id'].">
                            <input type='submit' value='modifier'>
                        </form> 
                    </td>
                </tr>";
        ?>
    </table>
    <br><br>
    <!-- affichage de tous les rdv -->
    <h2 class="titre">Liste des rendez-vous de <?=$patient['firstname'] . ' ' . $patient['lastname']?></h2>

    <table>
        <tr>
            <th>Date et heure</th>
            <th>Liens</th>
        </tr>
        
        <?php foreach ($appointments as $appointment) {
            echo "<tr>
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
