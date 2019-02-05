<?php

require_once 'ModeloBase.php';

class Main extends ModeloBase{

	function __construct(){
		parent::__construct();
	}
	public static function getAllNews()
	{
		$db = new ModeloBase;
		$respuesta = $db->getSomeItem('noticias','*','',false,false,false,true);
		return $respuesta;
	}
	public static function getMainImage($id,$relevance)
	{
		$db = new ModeloBase;
		$respuesta = $db->doJoinImages($id,$relevance);
		return $respuesta;
	}
	public static function getNews($slug)
	{
		$db = new ModeloBase();
		$respuesta = $db->getSomeItem('noticias','*',array('slug',$slug),false,false,true,false);
		return $respuesta;
	} 

}
