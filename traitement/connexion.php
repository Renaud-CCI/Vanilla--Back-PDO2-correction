<?php
$dns = 'mysql:host=localhost;dbname=hospitale2n';
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