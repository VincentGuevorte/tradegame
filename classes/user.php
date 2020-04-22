<?php

class User {

public $bdd;
public $name;
public $firstname;
public $email;
public $telephone;
public $password;
public $id;

public function __construct($bdd){

$this->bdd=$bdd;

}

/**
 * Get the value of nom
 */ 
public function getName()
{
return $this->name;
}

/**
 * Set the value of nom
 *
 * @return  self
 */ 
public function setName($name)
{
$this->name = $name;

return $this;
}

/**
 * Get the value of prenom
 */ 
public function getFirstname()
{
return $this->firstname;
}

/**
 * Set the value of prenom
 *
 * @return  self
 */ 
public function setFirstname($firstname)
{
$this->firstname = $firstname;

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

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}
public function insert(){

    $insert = "INSERT INTO users (name, firstname, email, telephone, password)
    VALUES (:name, :firstname, :email, :telephone, :password)";
   $stmt = $this->bdd->prepare($insert);
  return $stmt->execute(['email' => $this->email, 'firstname' => $this->firstname, 'name' => $this->name,
    'telephone' => $this->telephone, ':password' => $this->password]);

}

public function update(){

    $update = "UPDATE users SET 
    name=:name,
    firstname=:firstname,
    telephone=:telephone,
    email=:email,
    password=:password 
                            WHERE id=:id";
   $stmt = $this->bdd->prepare($update);
  return $stmt->execute(['email' => $this->email, 'firstname' => $this->firstname, 'name' => $this->name,
    'telephone' => $this->telephone, ':password' => $this->password ,':id' => $this->id]);

}
public function select(){

$select ="SELECT * FROM users where id=:id";

    $stmt = $this->bdd->prepare($select);
    $result2 = $stmt->execute([':id' => $this->id]);
    return $stmt->fetch();

}
}