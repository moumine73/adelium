<?php   
class Login
{
   private $Id ;
   private $Nom ;
   private $Prenom ;
   private $User ;
   private $Pwd ;
   private $Role;
   private $Created_at;

   public function __construct($id,$nom,$prenom,$user,$pwd,$role, $created_at=null)
   {
    $this->Id = $id;
    $this->Nom = $nom;
    $this->Prenom = $prenom;
    $this->User = $user;
    $this->Pwd = $pwd;
    $this->Role = $role;
    $this->Created_at = $created_at;

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

   public function getUser()
   {
    return $this->User ;
   }

   public function getPwd()
   {
    return $this->Pwd ;
   }

   public function getRole()
   {
    return $this->Role ;
   }
   public function getCreated_at()
   {
    return $this->Created_at;
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

   public function setUser($value)
   {
     $this->User = $value ;
   }

   public function setPwd($value)
   {
     $this->Pwd = $value ;
   }

   public function setRole($value)
   {
    $this->Role = $value ;
   }
   public function setCreated_at($value)
   {
    $this->Created_at = $value;
   }


    
   public function NomComplet()
   {
      return $this->Prenom.', '.$this->Nom ;
   }


}

?>