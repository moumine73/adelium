<?php

// if (isset($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && !empty($_POST['email']) && !empty($_POST['mdp'])) {
//     $cnn = require __DIR__ . "/db/connexion.php";

//     $sql = "INSERT INTO demande_inscription (Prenom,Nom ,Email,Password)
//         VALUE (?, ?, ?, ?)";

//     $stmt = $cnn->stmt_init();

//     if (!$stmt->prepare($sql)) {
//         die("SQL error: " . $cnn->error);
//     }

//     $stmt->bind_param(
//         "ssss",
//         $_POST['nom'],
//         $_POST['prenom'],
//         $_POST['email'],
//         $_POST['mdp']
//     );

//     $stmt->execute();

//     header("location:index.html");
//     exit();
// }





if (isset($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && !empty($_POST['email']) && !empty($_POST['mdp']))
{
    require_once "Metier/demande_inscription.php";
    require_once "db/dao_demande_inscription.php";

    $daoInscription = new DAO_Demande_Inscription($dns,$user,$pwd);
    $p = new Demande_Inscription(1,$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp']);
    $daoInscription->Create($p);
}

header("location:index.html");
exit();
