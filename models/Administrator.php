<?php

require_once "ModeloBase.php";

class Administrator extends ModeloBase
{
    private $first_name;
    private $last_name;
    private $password;
    private $email;
    private $rol = array();

    function __construct()
    {
        parent::__construct();
        $this->rol = array('superior','secundario');
    }

    public function setAdmin($item,$value){
        $this->$item = $value;
    }

    public function getAdmin($item)
    {
        return $this->$item;
    }
    public function getCredentials()
    {
        $db = new ModeloBase();
        $respuesta = $db -> getSomeItem('administrator','*',['email',$this->email],false,false,true,false);
        return $respuesta;
    }

}
