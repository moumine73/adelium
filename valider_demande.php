
<?php

if(!isset($_POST['id'])){
    header('location: /');
}


require __DIR__ . "/Authentification.php";

require_once "db/dao_demande_inscription.php";

require_once "metier/login.php";
require_once "db/dao_login.php";

$gestion = new DAO_Demande_Inscription($dns, $user, $pwd);

$utilisateur = $gestion->Retreive($_POST['id']);

$login_gestion = new DAO_Login($dns, $user, $pwd);

$login = new Login(
        null,
        $utilisateur->getNom(),
        $utilisateur->getPrenom(),
        $utilisateur->getEmail(),
        $utilisateur->getPassword(),
        $_POST['role']
    );

if($login_gestion->create($login)){
    $gestion->Delete($_POST['id']);
    header('location: gestion_demande_inscription.php');
    exit;
}else{
    echo "erreur";
    header('location: ./');
    exit;
}

?>
