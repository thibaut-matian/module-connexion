<?php

$servername="localhost";
$username="root";
$password="";

try{
    $bdd = new PDO("mysql:host=$servername;dbname=moduleconnexion", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
}
catch (PDOException $e) {
    echo "Erreur  : ".$e->getMessage();
}

$sql= "SELECT * FROM utilisateurs WHERE pseudo = 'Antony'";
$req= $bdd->query($sql);
while ($req = $req->fetch()){
    echo $rep['pseudo'] . '-'.$req['mail'].'<br>';
}