<?php

class Jeux {

public $bdd;
public $name;
public $etat;
public $plateforme;
public $prix;
public $id;

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
 * Get the value of etat
 */ 
public function getEtat()
{
return $this->etat;
}

/**
 * Set the value of etat
 *
 * @return  self
 */ 
public function setEtat($etat)
{
$this->etat = $etat;

return $this;
}

/**
 * Get the value of plateforme
 */ 
public function getPlateforme()
{
return $this->plateforme;
}

/**
 * Set the value of plateforme
 *
 * @return  self
 */ 
public function setPlateforme($plateforme)
{
$this->plateforme = $plateforme;

return $this;
}

/**
 * Get the value of prix
 */ 
public function getPrix()
{
return $this->prix;
}

/**
 * Set the value of prix
 *
 * @return  self
 */ 
public function setPrix($prix)
{
$this->prix = $prix;

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

public function select(){

$select ="SELECT * FROM jeux where id=:id";

    $stmt = $this->bdd->prepare($select);
    $result2 = $stmt->execute([':id' => $this->id]);
    return $stmt->fetch();

}

public function selectAll(){

    $select ="SELECT * FROM jeux";
    
        $stmt = $this->bdd->prepare($select);
        $result2 = $stmt->execute();
        return $stmt->fetchAll();
    
    }

public function delete(){

    $delete = "DELETE FROM jeux where jeux.id=:id";

    $id = (int)$_GET['id'];
    $stmt = $bdd->prepare($delete);
    $result2 = $stmt->execute(['id' => $id ?? 1]);


    }


}