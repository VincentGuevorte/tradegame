<?php

class Image {

public $bdd;
public $name;
public $id;
public $id_jeux;

public function __construct($bdd){

$this->bdd=$bdd;

}


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
 * Get the value of name
 */ 
public function getName()
{
return $this->name;
}

/**
 * Set the value of name
 *
 * @return  self
 */ 
public function setName($name)
{
$this->name = $name;

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

/**
 * Get the value of id_jeux
 */ 
public function getId_jeux()
{
return $this->id_jeux;
}

/**
 * Set the value of id_jeux
 *
 * @return  self
 */ 
public function setId_jeux($id_jeux)
{
$this->id_jeux = $id_jeux;

return $this;
}

    public function insert(){

        $insert = "INSERT INTO image (name, id_jeux) VALUES (:name, :id_jeux)";      
        $stmt = $this->bdd->prepare($insert);
        return $stmt->execute(['name' => $this->name, ':id_jeux' => $this->id_jeux]);

    }
}