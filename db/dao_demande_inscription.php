<?php

require_once "../Metier/demande_inscription.php" ;
require_once "param_connexion.php";

class DAO_Demande_Inscription
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

   public function Create(Demande_Inscription $elem)
   {

        $chSql = "INSERT INTO demande_inscription (Nom, Prenom, Email, Password) VALUES (:nom,:prenom,:email,:password)";
        $nom = $elem->getNom();
        $prenom = $elem->getPrenom();
        $email = $elem->getEmail();
        $password = $elem->getPassword();
    
    try
    {
        $stmt = $this->Cnn->prepare($chSql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom',$prenom);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);

        if ($stmt->execute())
        {
            echo "Enregistrement réussi";
        }
        // $stmt->execute() ;
    }
    catch(Exception $e)
    {
       echo $e->getMessage() ;
    }
   }

   public function Delete($id)
   {
    $chSql = "Delete from demande_inscription where id = /id" ;

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
    $chSql = "Select * from demande_inscription Where Id = :pid" ;
    
    try
    {
        $stmt = $this->Cnn->prepare($chSql);
        $stmt->bindParam(':pid',$id);

        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        if ($enr = $stmt->fetch())
        {
            $u = new Demande_Inscription($enr->Id, $enr->Nom,$enr->Prenom,$enr->Email,$enr->Password);
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
    $chsql = "SELECT * FROM demande_inscription";

try {
    $stmt = $this->Cnn->prepare($chsql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $tablDemandes = array();

while ($enr = $stmt->fetch())
    {
    $demande = new Demande_Inscription($enr->Id, $enr->Nom, $enr->Prenom, $enr->Email, $enr->Password);
    $tablDemandes[] = $demande;
    }

return $tablDemandes;
    } catch (Exception $e) {
    echo $e->getMessage();
    }
}



}

// $p1 = new Demande_Inscription(1,"ZIDANE","ZIZOU","zizou@madrid.es","Marseille13*");

$daoInscription = new DAO_Demande_Inscription($dns,$user,$pwd);

// $daoInscription->Create($p1);

$p = $daoInscription->Retreive(3);
echo $p->NomComplet();

// $tbl1 = $daoInscription->RetreiveAll();
// echo "<pre>" ;
// var_dump($tbl1);
// echo "</pre>" ;

// $p = $daoInscription->Retreive(5);

// if (!is_null($p))
// {
//     $p->setEmail("NouveauEmail@free.fr");
//     $daoInscription->Update($p);
//     $p = $daoInscription->Retreive(3);
//     echo $p->getEmail();

// }



//$daoInscription->Delete(2);





?>