<?php

$server = "localhost";
$user = "root";
$password = ""; // root pour MAC !
$bdd = "ecommerce";

// connexion au serveur localhost et on sélectionne la BDD
$lien = mysqli_connect($server,$user,$password,$bdd);

// passerelle à mettre en UTF 8 -> avoir aucun pb d'accent qd on récupère de données ds la BDD
mysqli_query($lien,"set names utf8");

?>