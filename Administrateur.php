<?php
    require __DIR__."/Authentification.php";
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
    require __DIR__."/navigation.php";
    ?>
<h1>Administrateur</h1>

<?php

$sql = "SELECT * FROM formation_cda";
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $nom = $row["nom"];
//         $prenom = $row["prenom"];
//         $email = $row["email"];

//         echo "Nom: " . $nom . "<br>";
//         echo "Prénom: " . $prenom . "<br>";
//         echo "Email: " . $email . "<br>";
//         echo "<br>";
//     }
// } else {
//     echo "Aucun utilisateur trouvé.";
// }

?>

</body>
</html>