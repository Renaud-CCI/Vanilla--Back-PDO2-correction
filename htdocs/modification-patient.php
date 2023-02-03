<?php
require_once('traitement/connexion.php');

$id = $_POST['id'];
// requete des clients avec une carte de fidélité
$request =  $db->prepare('SELECT * FROM patients WHERE id = ?');
$request->execute([$id]);
$patient = $request->fetch();

include('partial/header.php');
?>
<section>
 
    <form action="traitement/update-patient.php" method="post">
        <label for="lastname">lastname</label>
        <input type="text" name="lastname" id="" value="<?=$patient['lastname']?>" required>
        <br>
        <label for="firstname">firstname</label>
        <input type="text" name="firstname" id="" value="<?=$patient['firstname']?>" required>
        <br>
        <label for="birthdate">birthdate</label>
        <input type="date" name="birthdate" id="" value="<?=$patient['birthdate']?>" required>
        <br>
        <label for="phone">phone</label>
        <input type="text" name="phone" id=""  value="<?=$patient['phone']?>" >
        <br>
        <label for="mail">mail</label>
        <input type="email" name="mail" id=""  value="<?=$patient['mail']?>" required>
        <br>
        <input type="hidden" name="id" value="<?=$patient['id']?>">
        <input type="submit" value="envoyer">
    </form>  

</section>
<?php

include('partial/footer.php');


