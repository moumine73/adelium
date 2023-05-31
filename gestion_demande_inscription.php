<?php
require __DIR__ . "/Authentification.php";

require_once "db/dao_demande_inscription.php";

$gestion = new DAO_Demande_Inscription($dns, $user, $pwd);
$users = $gestion->RetrieveAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/site.css">
</head>

<body>
    <?php
    require __DIR__ . "/navigation.php";
    ?>
    <h1>gestion demande d'inscription</h1>

    <!--------- tableau ----------------------------------------------->
    
    
    
<table class="table align-middle mb-0 bg-white">    
    <thead class="bg-light">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
    </tr>
</thead>
<tbody>

<?php
foreach($users as $user){


    echo "<tr>";
    echo "<td>".$user->getNom()."</td>";
    echo "<td>".$user->getPrenom()."</td>";
    echo "<td>".$user->getEmail()."</td>";
    ?>
    <form method="post" action="valider_demande.php">
    <input type="hidden" name="id" value="<?php  echo $user->getId() ?>"/>

    <td>
<select class="form-select" aria-label="Default select example" id="role" name="role">
  <option value="Administrateur">Administrateur</option>
  <option value="Formateur">Formateur</option>
  <option value="Stagaire" selected>Stagiaire</option>
</select>
</td>
<td>
    <button type="submit" class="btn btn-success" >Valider</button>
</td>
</form>

<td>
    <form action="rejet.php" method="post">
    <input type="hidden" name="id" value="<?php  echo $user->getId() ?>"/>
    <button type="submit" class="btn btn-danger" >Rejeter</button>
</td>
</form>
    <?php
    echo "<td></td>";
    echo "</tr>";
}
?>

</tbody>
</table>

</body>
</html>