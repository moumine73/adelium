<?php

$host = "localhost";
$dbname = "formation_cda";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname
);

if ($mysqli->connect_errno)
{
    die("Erreur de Connexion :" . $mysqli->connect_errno);
}

return $mysqli;


?>