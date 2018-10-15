<?php

class pokemon
{
    protected $id;

    protected $nom;

    protected $type;

    protected $image;

    public function __construct($id, $nom, $type, $image)
{
    $this->id = $id;
    $this->type = $type;
    $this->nom = $nom;
    $this->image = $image;
}

    public function setId($id)
{
    $this->id = $id;
}

    public function setNom($nom)
{
    $this->nom = $nom;
}

    public function setType($type)
{
    $this->type = $type;
}

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getId()
{
    return $this->id;
}
    public function getType()
{
    return $this->type;
}
    public function getNom()
{
    return $this->nom;
}

public function getImage()
{
    return $this->image;
}

    public function toArray()
{
    $array = array();
    $array['id'] = $this->id;
    $array['nom'] = $this->nom;
    $array['type'] = $this->type;
    $array['image'] = $this->image;



    return $array;
}
}
