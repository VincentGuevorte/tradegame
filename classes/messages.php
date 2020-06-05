<?php

class Message
{
    public $bdd;
    public $mail_adress;
    public $subject;
    public $message;
    public $id_users;


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
     * Get the value of mail_adress
     */ 
    public function getMail_adress()
    {
        return $this->mail_adress;
    }

    /**
     * Set the value of mail_adress
     *
     * @return  self
     */ 
    public function setMail_adress($mail_adress)
    {
        $this->mail_adress = $mail_adress;

        return $this;
    }

    /**
     * Get the value of subject
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of id_users
     */ 
    public function getId_users()
    {
        return $this->id_users;
    }

    /**
     * Set the value of id_users
     *
     * @return  self
     */ 
    public function setId_users($id_users)
    {
        $this->id_users = $id_users;

        return $this;
    }
    public function select()
    {

        $select = "SELECT * FROM messages where id=:id";

        $stmt = $this->bdd->prepare($select);
        $result2 = $stmt->execute([':id' => $this->id]);
        return $stmt->fetch();
    }
}