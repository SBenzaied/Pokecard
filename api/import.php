<?php
/**
 * Created by PhpStorm.
 * User: lpiem
 * Date: 06/11/2018
 * Time: 13:20
 */


$url='http://www.ray0.be/pokeapi';
$url_img="/pokemon-img/fr/";
$url_row="/pokemon-row/fr/";

function getDataApi() {
    global $url,$url_row,$url_img;
    $pokemon_arr = array();
    $pokemon_arr['data'] = array();
    for($i=1;$i<5;$i++){
        $url_json_row = file_get_contents($url.$url_row.$i);

        $result_array = json_decode($url_json_row,true);

        $id_pokemon = $result_array["data"]["id"];
        $nom_pokemon = $result_array["data"]["nom_fr"];
        $id_type1 = $result_array["data"]["type_1"];
        $id_type2 = $result_array["data"]["type_2"];
        $nom_type1 = $result_array["data"]["type1"];
        $nom_type2 = $result_array["data"]["type2"];
        $url_img = $url.$url_img.$nom_pokemon;

        $tableau_type[$i] = array($id_type1=>$nom_type1);


        $pokemon_item = array(
            'id_pokemon' => $id_pokemon,
            'nom_pokemon' => $nom_pokemon,
            'id_type1' =>$id_type1,
            'id_type2' => $id_type2,
            'nom_type1' => $nom_type1,
            'nom_type2' => $nom_type2,
            'url_img' => $url_img
        );


        array_push($pokemon_arr['data'],$pokemon_item);
    }
    //echo json_encode($pokemon_arr);
    var_dump($tableau_type);


}

function getAllType(){


}

function parseArray(array $arr){

}
