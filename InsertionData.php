<?php

$cnn = require __DIR__."/db/connexion.php";

$sql = "INSERT INTO login (user, pwd,role)
        VALUE (?, ?, ?)";

$stmt = $cnn->stmt_init();

if ( ! $stmt->prepare($sql))
{
    die("SQL error: " . $cnn->error);
}

$courriel = 'Moumine@casablanca.ma' ;
$pwd_hash = password_hash("Moumine", PASSWORD_DEFAULT);
$role1 = "Administrateur";

$stmt->bind_param("sss",
                   $courriel,
                   $pwd_hash,
                   $role1);

if ($stmt->execute())
{
    echo "Youpi ...";
}

$courriel = 'avisen@casablanca.ma' ;
$pwd_hash = password_hash("avisen", PASSWORD_DEFAULT);
$role1 = "Formateur";

$stmt->bind_param("sss",
                   $courriel,
                   $pwd_hash,
                   $role1);

if ($stmt->execute())
{
    echo "Youpi ...";
}

$courriel = 'Rifi@casablanca.ma' ;
$pwd_hash = password_hash("Rifi", PASSWORD_DEFAULT);
$role1 = "Stagiaire";

$stmt->bind_param("sss",
                   $courriel,
                   $pwd_hash,
                   $role1);

if ($stmt->execute())
{
    echo "Youpi ...";
}



?>