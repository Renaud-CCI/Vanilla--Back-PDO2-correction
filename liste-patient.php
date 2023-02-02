<?php
require_once('connexion.php');


    // requete de tous les patients
    $request =  $db->query('SELECT * FROM patients');
    $allpatients = $request->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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
                <th>profile</th>

            </tr>
            <form action='profil-patient.php' method='post'>
                
            </form>
            
            <?php foreach ($allpatients as $patient) {
                echo "<tr>
              <td>" . $patient["lastname"] . "</td>
              <td>" . $patient["firstname"] . "</td>
              <td>" . $patient["birthdate"] . "</td>
              <td>" . $patient["phone"] . "</td>
              <td>" . $patient["mail"] . "</td>
              <td>  
                    <form action='profil-patient.php' method='get'>
                        <input type='hidden' name='id' value=".$patient['id'].">
                        <input type='submit' value='profil'>
                    </form> </td>
            </tr>";
            } ?>
        </table>
    </section>

</body>

</html>