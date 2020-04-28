<?php

class Jeux {

public $bdd;
public $name;
public $etat;
public $plateforme;
public $prix;
public $id;
public $id_user;
public $lastInsertId;

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

/**
 * Get the value of id_user
 */ 
public function getId_user()
{
return $this->id_user;
}

/**
 * Set the value of id_user
 *
 * @return  self
 */ 
public function setId_user($id_user)
{
$this->id_user = $id_user;

return $this;
}

/**
 * Get the value of lastInsertId
 */ 
public function getLastInsertId()
{
return $this->lastInsertId;
}

/**
 * Set the value of lastInsertId
 *
 * @return  self
 */ 
public function setLastInsertId($lastInsertId)
{
$this->lastInsertId = $lastInsertId;

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
    public function selectAllByIdUser($id){

        $select ="SELECT * FROM jeux WHERE id_users = :id";
        
            $stmt = $this->bdd->prepare($select);
            $result2 = $stmt->execute(['id' => $id]);
            return $stmt->fetchAll();
        
        }

public function delete(){

    $delete = "DELETE FROM jeux where jeux.id=:id";

    $stmt = $this->bdd->prepare($delete);
    return $stmt->execute(['id' => $this->id]);


    }

    public function insert(){

        $insert = "INSERT INTO jeux (name, plateforme, etat, prix, id_users)
        VALUES (:name, :plateforme, :etat, :prix, :id_user)";
        $stmt = $this->bdd->prepare($insert);
        $resultat = $stmt->execute(['etat' => $this->etat, 'plateforme' => $this->plateforme, 'name' => $this->name,
        'prix' => $this->prix, 'id_user' => $this->id_user]);
        // var_dump ($stmt->debugDumpParams());
        $this->lastInsertId = $this->bdd->lastInsertId();
        return $resultat;

    }

    public function search($word){

        $stmt = $this->bdd->prepare('SELECT jeux.*, users.name as username, image.name as imagename FROM jeux
        inner join users ON jeux.id_users=users.id 
        inner join image ON jeux.id=image.id_jeux WHERE jeux.name LIKE :q ORDER BY jeux.id DESC');
        $result2 = $stmt->execute(['q'=>"%$word%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    }

    public function selectAllWithInfo(){

        $stmt = $this->bdd->prepare("SELECT jeux.*, users.name as username, image.name as imagename FROM jeux 
        inner join image ON jeux.id=image.id_jeux
        inner join users ON jeux.id_users=users.id");
        
        $result2 = $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}