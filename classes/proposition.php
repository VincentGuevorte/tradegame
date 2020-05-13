<?php

class Proposition
{

    public $bdd;
    public $commentaire;
    public $id;
    public $id_user;
    public $id_jeux_user;
    public $id_jeux_wanted;
    public $lastInsertId;
    public $status;


    public function __construct(PDO $bdd)
    {

        $this->bdd = $bdd;
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
     * Get the value of commentaire
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = htmlspecialchars($commentaire);

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
    public function setId(int $id)
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
    public function setId_user(int $id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_jeux_user
     */
    public function getId_jeux_user()
    {
        return $this->id_jeux_user;
    }

    /**
     * Set the value of id_jeux_user
     *
     * @return  self
     */
    public function setId_jeux_user(int $id_jeux_user)
    {
        $this->id_jeux_user = $id_jeux_user;

        return $this;
    }

    /**
     * Get the value of id_jeux_wanted
     */
    public function getId_jeux_wanted()
    {
        return $this->id_jeux_wanted;
    }

    /**
     * Set the value of id_jeux_wanted
     *
     * @return  self
     */
    public function setId_jeux_wanted(int $id_jeux_wanted)
    {
        $this->id_jeux_wanted = $id_jeux_wanted;

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
        $this->lastInsertId = htmlspecialchars($lastInsertId);

        return $this;
    }
/**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = htmlspecialchars($status);

        return $this;
    }

    public function select()
    {

        $select = "SELECT * FROM proposition where id=:id";

        $stmt = $this->bdd->prepare($select);
        $result2 = $stmt->execute([':id' => $this->id]);
        return $stmt->fetch();
    }

    public function delete()
    {

        $delete = "DELETE FROM proposition where proposition.id=:id";

        $stmt = $this->bdd->prepare($delete);
        return $stmt->execute(['id' => $this->id]);
    }

    public function selectAllByIdUser(int $id)
    {

        $select = "SELECT proposition.* ,users.name as username FROM proposition 
        inner join users ON proposition.id_users = users.id
        
        
        WHERE id_users = :id";

        $stmt = $this->bdd->prepare($select);
        $result2 = $stmt->execute(['id' => $id]);
        // var_dump ($stmt->debugDumpParams());
        // exit;
        return $stmt->fetchAll();
    }

    public function selectAll()
    {

        $select = "SELECT proposition.* ,users.name as username FROM proposition 
        inner join users ON proposition.id_users = users.id";

        $stmt = $this->bdd->prepare($select);
        $result2 = $stmt->execute();
        // var_dump ($stmt->debugDumpParams());
        // exit;
        return $stmt->fetchAll();
    }

    public function insert(){

        $insert = "INSERT INTO proposition (commentaire, id_users, id_jeux_user, id_jeux_wanted)
        VALUES (:commentaire, :id_users, :id_jeux_user, :id_jeux_wanted)";
        $stmt = $this->bdd->prepare($insert);
        $resultat = $stmt->execute(['commentaire' => $this->commentaire,'id_users' => $this->id_user,
            'id_jeux_user' => $this->id_jeux_user, 'id_jeux_wanted' => $this->id_jeux_wanted
        ]);
        // var_dump ($stmt->debugDumpParams());
        // exit;
        $this->lastInsertId = $this->bdd->lastInsertId();
        return $resultat;

    }

    public function updateStatus(int $id, $status){
        $status = htmlspecialchars($status);
        $update = "UPDATE proposition SET 
        status=:status
                                WHERE id=:id";
       $stmt = $this->bdd->prepare($update);
       return $stmt->execute(['status' => $status,'id' => $id]);
    
    }
}