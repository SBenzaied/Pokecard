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

    public $id;
    public $nom;
    public $type1;
    public $type2;
    public $image;

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
        $this->id = $row['id'];
        $this->nom = $row['nom'];
        $this->type1 = $row['type_1'];
        $this->type2 = $row['type_2'];
        $this->image = $row['image'];


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





}