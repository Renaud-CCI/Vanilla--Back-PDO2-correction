<?php
$dns = 'mysql:host=127.0.0.1;dbname=hospitalE2N';
$user = 'root';
$password = '';

try{
    $db = new PDO( $dns, $user, $password);
    // echo "conexion établi" ;

}
catch (Exception $message){
    echo "ya un blem <br>" . "<pre>$message</pre>" ;
}
?>