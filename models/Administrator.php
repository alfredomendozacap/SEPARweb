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
        $this->rol = 'secundario';
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
    public function newAdmin()
    {
        $dataAdmin = [
            'first_name' => $this -> getAdmin('first_name'),
            'last_name' => $this -> getAdmin('last_name'),
            'password' => $this -> getAdmin('password'),
            'email' => $this -> getAdmin('email'),
            'rol' => $this -> getAdmin('rol')
        ];

        $db = new ModeloBase();
        $respuesta = $db -> insertNews($dataAdmin,'administrator');
        return $respuesta;
    }
    public function getAllAdmins()
    {
        $db = new ModeloBase();
        $respuesta = $db -> getSomeItem('administrator','*','',false,false,false,true);
        return $respuesta;
    }
}
