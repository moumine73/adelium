<?php

require __DIR__."/Utilitaire.php" ;

// Details($_POST);

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        $utilisateur = $_POST['email'];
        $mdp = $_POST['password'];

        $mysqly = require __DIR__."/db/connexion.php";

        $sql = sprintf("SELECT * FROM login Where User = '%s'",
                    $mysqly->real_escape_string($utilisateur));

        $result = $mysqly->query($sql);

        $user = $result->fetch_assoc();
        
        
        if ($user)
        {
            
            if (password_verify($_POST["password"], $user["Pwd"]))
            {
                //Details($user);
                session_start();
                session_regenerate_id();
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user"] = $user["User"];


                $role = $user["Role"];
                $page = "login.html";

                switch($role)
                {
                    case "Administrateur":
                        $page = "Administrateur.php";
                        break;

                    case "Formateur":
                        $page = "Formateur.php";
                        break;

                    case "Stagiaire":
                        $page = "Stagiaire.php";
                        break;
                }

                header("Location: $page");
                exit;
            }
            else
            {
                echo "mot de passe incorrecte";
            }
        }
        else 
        {
            echo "utilisateur n'existe pas";
        }

        // echo "utilisateur : $utilisateur mdp = $mdp ";
        // exit();
    }   
    
    #echo "Super c'est bien un post";
    #exit();
}
else
{
    header("Location:index.html");
    exit();
    #die("Methode non conform ...")
}

?>