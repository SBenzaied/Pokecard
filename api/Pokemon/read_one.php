<?php
/**
 * Created by PhpStorm.
 * User: romi
 * Date: 01/11/2018
 * Time: 17:06
 */


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Pokemon.php';

//instantiate DB & connect
$database = new Database();
$db = $database->connect();

$pokemon = new Pokemon($db);

//get ID
$pokemon->setId( isset($_GET['id']) ? $_GET['id'] : die());

$pokemon->read_one();

$pokemon_arr = array(
    'id' => $pokemon->getId(),
    'nom' => $pokemon->getNom(),
    'type_1' => $pokemon->getType1(),
    'type_2' => $pokemon->getType2(),
    'image' => $pokemon->getImage()
    );
if($pokemon_arr['id']!== null){
    //convert to json
    echo(json_encode($pokemon_arr));
} else {
    echo json_encode(
        array("message" => 'no pokemon found')
    );
}



