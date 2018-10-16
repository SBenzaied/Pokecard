<?php
/**
 * Created by PhpStorm.
 * User: lpiem
 * Date: 15/10/2018
 * Time: 16:08
 */

$lien_nom_img="https://pokeapi.co/api/v2/pokemon-form/";
$lien_type = "https://pokeapi.co/api/v2/pokemon/";
$matrice = array();



for($compteur =1;$compteur<11;$compteur++ ) {

    $lien_nom_img=$lien_nom_img.$compteur;
    $lien_type=$lien_type.$compteur;
    $lien_json=file_get_contents($lien_nom_img);
    $lien_json_type=file_get_contents($lien_type);
    $lien_array=json_decode($lien_json,true);
    $lien_array_type=json_decode($lien_json_type,true);

    $id = $compteur;
    $nom=$lien_array['name'];
    $img=$lien_array['sprites']['front_default'];
    $type=$lien_array_type['abilities'][0]['ability']['name'];

    $matrice[$compteur-1]= array($id,$nom,$img,$type);
    $lien_nom_img="https://pokeapi.co/api/v2/pokemon-form/";
    $lien_type = "https://pokeapi.co/api/v2/pokemon/";

}
    print_r($matrice);


//return $matrice;