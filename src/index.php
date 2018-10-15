<?php
/**
 * Created by PhpStorm.
 * User: lpiem
 * Date: 15/10/2018
 * Time: 16:08
 */

$lien_nom_img='https://pokeapi.co/api/v2/pokemon-form/1';
$lien_type = "https://pokeapi.co/api/v2/pokemon/1";

$lien_json=file_get_contents($lien_nom_img);
$lien_json_type=file_get_contents($lien_type);
$lien_array=json_decode($lien_json,true);
$lien_array_type=json_decode($lien_json_type,true);

$nom=$lien_array['name'];
$img=$lien_array['sprites']['front_default'];
$type=$lien_array_type['abilities'][0]['ability']['name'];

//echo $lien_json;
echo $nom;
echo $img;
echo $type;