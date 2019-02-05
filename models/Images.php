<?php
require_once 'ModeloBase.php';
class Image{

    private $image = array();
    private $attr = array('id_noticia','image','relevance');

    public function setImage($i,$key,$value)
    {
        $this->image[$i][$key] = $value;
    }
    public function getAttr(){
        return $this->attr;
    }
    public function getImage(){
        return $this->image;
    }
    
    public function newImages()
    {
        $db = new ModeloBase();
        $respuesta = $db -> insertImages($this->image);
        return $respuesta;
    }
    
}