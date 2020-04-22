<?php

class User {

public $bdd;
public $nom;
public $prenom;
public $email;
public $telephone;
public $password;


/**
 * Get the value of bdd
 */ 
public function getBdd()
{
return $this->bdd;
}

/**
 * Set the value of bdd
 *
 * @return  self
 */ 
public function setBdd($bdd)
{
$this->bdd = $bdd;

return $this;
}

/**
 * Get the value of nom
 */ 
public function getNom()
{
return $this->nom;
}

/**
 * Set the value of nom
 *
 * @return  self
 */ 
public function setNom($nom)
{
$this->nom = $nom;

return $this;
}

/**
 * Get the value of prenom
 */ 
public function getPrenom()
{
return $this->prenom;
}

/**
 * Set the value of prenom
 *
 * @return  self
 */ 
public function setPrenom($prenom)
{
$this->prenom = $prenom;

return $this;
}

/**
 * Get the value of email
 */ 
public function getEmail()
{
return $this->email;
}

/**
 * Set the value of email
 *
 * @return  self
 */ 
public function setEmail($email)
{
$this->email = $email;

return $this;
}

/**
 * Get the value of telephone
 */ 
public function getTelephone()
{
return $this->telephone;
}

/**
 * Set the value of telephone
 *
 * @return  self
 */ 
public function setTelephone($telephone)
{
$this->telephone = $telephone;

return $this;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

public function insert(){

    $insert = "INSERT INTO users (name, firstname, email, telephone, password)
    VALUES (:name, :firstname, :email, :telephone, :password)";
   $stmt = $this->bdd->prepare($insert);
   $stmt->execute(['email' => $this->email, 'firstname' => $this->firstname, 'name' => $this->name,
    'telephone' => $this->telephone, ':password' => $this->password]);

}
}