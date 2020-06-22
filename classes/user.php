<?php

class User
{

    public $bdd;
    public $name;
    public $firstname;
    public $email;
    public $telephone;
    public $password;
    public $confirmation_password;
    public $id;

    public function __construct($bdd)
    {

        $this->bdd = $bdd;
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
        $this->name = htmlspecialchars($name);

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
        $this->firstname = htmlspecialchars($firstname);

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
        $this->email = htmlspecialchars($email);

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
        $this->telephone = htmlspecialchars($telephone);

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
        $this->password = htmlspecialchars($password);

        return $this;
    }
    
    /**
     * Get the value of confirmation_password
     */ 
    public function getConfirmation_password()
    {
        return $this->confirmation_password;
    }

    /**
     * Set the value of confirmation_password
     *
     * @return  self
     */ 
    public function setConfirmation_password($confirmation_password)
    {
        $this->confirmation_password = $confirmation_password;

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
    public function insert()
    {

        $insert = "INSERT INTO users (name, firstname, email, telephone, password, :conf_password)
    VALUES (:name, :firstname, :email, :telephone, :password, :conf_password)";
        $stmt = $this->bdd->prepare($insert);
        return $stmt->execute([
            'email' => $this->email, 'firstname' => $this->firstname, 'name' => $this->name,
            'telephone' => $this->telephone, ':password' => $this->password, ':conf_password' => $this->conf_password
        ]);
    }

    public function update()
    {

        $update = "UPDATE users SET 
    name=:name,
    firstname=:firstname,
    telephone=:telephone,
    email=:email,
    password=:password 
                            WHERE id=:id";
        $stmt = $this->bdd->prepare($update);
        return $stmt->execute([
            'email' => $this->email, 'firstname' => $this->firstname, 'name' => $this->name,
            'telephone' => $this->telephone, ':password' => $this->password, ':id' => $this->id
        ]);
    }

    public function selectOnAdmin()
    {

        $select = "SELECT * FROM users";

        $stmt = $this->bdd->prepare($select);
        $result2 = $stmt->execute();
        return $stmt->fetchAll();
    }

    public function select()
    {

        $select = "SELECT * FROM users where id=:id";

        $stmt = $this->bdd->prepare($select);
        $result2 = $stmt->execute([':id' => $this->id]);
        return $stmt->fetch();
    }

    public function getuserByEmail($email)
    {

$email = htmlspecialchars($email);

        $select = "SELECT * FROM users where email=:email";

        $stmt = $this->bdd->prepare($select);
        $result2 = $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }
}
