
<?php

if(!isset($_POST['id'])){
    header('location: /');
}


require __DIR__ . "/Authentification.php";

require_once "db/dao_demande_inscription.php";

$gestion = new DAO_Demande_Inscription($dns, $user, $pwd);

$errors = [];
try
{
    $users = $gestion->Delete($_POST['id']);

}catch(Exception $e)
{
    $errors[] = "erreur inatendu.";
}
if(count($errors)===0){
    header('location: gestion_demande_inscription.php');
}
else{
    echo "<div>". $errors[0]."</div>";
}

?>
