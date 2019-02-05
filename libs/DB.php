<?php

class DB extends PDO{

	private $hostname = 'localhost';
	private $dbname = 'cms_separ';
	private $username = 'root';
	private $password = '';

	function __construct(){
		$dns = 'mysql:dbname='.$this->dbname.';host='.$this->hostname;
		parent::__construct($dns,$this->username,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
}

