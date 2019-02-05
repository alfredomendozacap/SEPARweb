<?php
require_once 'ModeloBase.php';

class News extends ModeloBase{

    private $title;
    private $subtitle;
    private $summary;
    private $content;
    private $created_at;
    private $slug;

    function __construct(){
		parent::__construct();
    }
    
    public function setNews($item,$value){
        $this->$item = $value;
    }

    public function getNews($item)
    {
        return $this->$item;
    }

    public function newNews($keys)
    {
        $dataNews = array_combine($keys,array(
            $this->title,
            $this->subtitle,
            $this->summary,
            $this->content,
            $this->created_at,
            $this->slug
        ));
        $db = new ModeloBase();
        $respuesta = $db -> insertNews($dataNews);
        return $respuesta;
    }
    public function getId()
    {
        $db = new ModeloBase();
        $respuesta = $db -> getSomeItem('noticias','id',array('slug',$this->slug),true,false,false,false);
        return $respuesta['id'];
    }
    public function getTitle()
    {
        $db =  new ModeloBase();
        $respuesta = $db -> getSomeItem('noticias','*',array('title',$this->title),false,false,true,false);
        return $respuesta;
    }


}