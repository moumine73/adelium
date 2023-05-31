<?php

require_once "./Metier/login.php" ;
require_once "param_connexion.php";

class DAO_Login
{

   private $Cnn ;  

   public function __construct($dns,$utilisateur,$mdp)
   {
       try
       {
            $this->Cnn = new PDO($dns,$utilisateur,$mdp) ;
       }
       catch(Exception $e)
       {
          echo $e->getMessage() ;
       }

   }

   public function Create(Login $elem)
   {



        $chSql = "INSERT INTO login (Nom, Prenom, User, Pwd, role) VALUES (:nom,:prenom,:user,:pwd, :role)";
        $nom = $elem->getNom();
        $prenom = $elem->getPrenom();
        $user = $elem->getUser();
        $pwd = $elem->getPwd();
        $role = $elem->getRole();
    
    try
    {
        $stmt = $this->Cnn->prepare($chSql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom',$prenom);
        $stmt->bindParam(':user',$user);
        $stmt->bindParam(':pwd',$pwd);
        $stmt->bindParam(':role',$role);
        

        if ($stmt->execute())
        {
            return true;
        }
        // $stmt->execute() ;
    }
    catch(Exception $e)
    {
        echo $e;
       return false;
    }
   }

   public function Delete($id)
   {
    $chSql = "Delete from login where id = :id" ;

    try
    {
        $stmt = $this->Cnn->prepare($chSql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}





public function Retreive($id)
{
    $chSql = "Select * from login Where id = :pid" ;
    
    try
    {
        $stmt = $this->Cnn->prepare($chSql);
        $stmt->bindParam(':pid',$id);

        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        if ($enr = $stmt->fetch())
        {
            $u = new Login($enr->id, $enr->Nom,$enr->Prenom,$enr->User,$enr->Pwd,$enr->Role, $enr->Created_at);
            return $u;
        }
        else
        {
            echo "aucun enregistrement avec cette clé";
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}

public function RetrieveAll()
{
    $chsql = "SELECT * FROM login";

try {
    $stmt = $this->Cnn->prepare($chsql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $tablDemandes = array();

while ($enr = $stmt->fetch())
    {
    $demande = new Login($enr->id, $enr->Nom, $enr->Prenom, $enr->User, $enr->Pwd,$enr->Role, $enr->Created_at);
    $tablDemandes[] = $demande;
    }

return $tablDemandes;
    } catch (Exception $e) {
    echo $e->getMessage();
    }
}



}