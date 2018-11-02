<?php
/**
 * Created by PhpStorm.
 * User: romi
 * Date: 01/11/2018
 * Time: 15:22
 */

class Pokemon {

    private $conn;
    private $table = 'pokemon';

    private $id;
    private $nom;
    private $type1;
    private $type2;
    private $image;



    //Constuctor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Get all pokemon
    public function read() {
        //create query
        $query = 'SELECT * FROM ' .$this->table;

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }

    //Get 1 pokemon
    public function read_one() {
        //create query
        $query = 'SELECT * FROM ' .$this->table . ' WHERE id = ? LIMIT 0,1';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //BIND id
        $stmt->bindParam(1, $this->id);

        //execute query
        $stmt->execute();


        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->setId($row['id']);
        $this->setNom($row['nom']);
        $this->setType1($row['type_1']);
        $this->setType2($row['type_2']);
        $this->setImage($row['image']);


        return $stmt;
    }

    //create pokemon
    public function create() {
        //create query
        $query = 'INSERT INTO ' .$this->table . ' (id,nom,type_1,type_2,image) VALUES (:id,:nom,:type_1,:type_2,:image)';
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //BIND data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':type_1', $this->type1);
        $stmt->bindParam(':type_2', $this->type2);
        $stmt->bindParam(':image', $this->image);

        //execute query
        if($stmt->execute()){
            return true;
        }

        printf("Error : %s.\n",$stmt->error);

        return false;
    }

    //Update pokemon
    public function update() {
        //create query
        $query = 'UPDATE ' .$this->table . ' SET nom = :nom,type_1 = :type_1,type_2 = :type_2,image = :image 
        WHERE id = :id';
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //BIND data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':type_1', $this->type1);
        $stmt->bindParam(':type_2', $this->type2);
        $stmt->bindParam(':image', $this->image);

        //execute query
        if($stmt->execute()){
            return true;
        }

        printf("Error : %s.\n",$stmt->error);

        return false;
    }

    //Delete pokemon
    public function delete() {
        $query = 'DELETE FROM ' .$this->table .' WHERE id = :id';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //BIND data
        $stmt->bindParam(':id', $this->id);

        //execute query
        if($stmt->execute()){
            return true;
        }

        printf("Error : %s.\n",$stmt->error);

        return false;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * @param mixed $type1
     */
    public function setType1($type1)
    {
        $this->type1 = $type1;
    }

    /**
     * @return mixed
     */
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * @param mixed $type2
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }





}