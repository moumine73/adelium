<?php   
class Demande_Inscription
{
   private $Id ;
   private $Nom ;
   private $Prenom ;
   private $Email ;
   private $Password ;

   public function __construct($id,$nom,$prenom,$email,$password)
   {
    $this->Id = $id;
    $this->Nom = $nom;
    $this->Prenom = $prenom;
    $this->Email = $email;
    $this->Password = $password;

   }

   public function getId()
   {
    return $this->Id ;
   }

   public function getNom()
   {
    return $this->Nom ;
   }

   public function getPrenom()
   {
    return $this->Prenom ;
   }

   public function getEmail()
   {
    return $this->Email ;
   }

   public function getPassword()
   {
    return $this->Password ;
   }


   public function setId($value)
   {
     $this->Id = $value ;
   }

   public function setNom($value)
   {
     $this->Nom= $value ;
   }

   public function setPrenom($value)
   {
     $this->Prenom = $value ;
   }

   public function setEmail($value)
   {
     $this->Email = $value ;
   }

   public function setPassword($value)
   {
     $this->Password = $value ;
   }

    
   public function NomComplet()
   {
      return $this->Prenom.', '.$this->Nom ;
   }


}


$p1 = new Demande_Inscription(1,"ZIDANE","ZIZOU","zizou@madrid.es","Marseille13*");
echo $p1->NomComplet()."<br>";
$p1->setPrenom("ZINEDINE");
echo $p1->NomComplet();

?>