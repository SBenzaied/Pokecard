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
$pokemon->id = isset($_GET['id']) ? $_GET['id'] : die();

$pokemon->read_one();

$pokemon_arr = array(
    'id' => $pokemon->id,
    'nom' => $pokemon->nom,
    'type_1' => $pokemon->type1,
    'type_2' => $pokemon->type2,
    'image' => $pokemon->image
    );
if($pokemon_arr['id']!== null){
    //convert to json
    echo(json_encode($pokemon_arr));
} else {
    echo json_encode(
        array("message" => 'no pokemon found')
    );
}



