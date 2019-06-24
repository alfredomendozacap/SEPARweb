<?php
include_once 'config.php';

class DB extends PDO{

	private $hostname = ENV['DB_SERVER'];
	private $port     = ENV['DB_PORT'];
	private $dbname   = ENV['DB_DATABASE'];
	private $username = ENV['DB_USERNAME'];
	private $password = ENV['DB_PASSWORD'];

	function __construct(){
		$dns = "mysql:dbname=$this->dbname;host=$this->hostname;port=$this->port";
		$options = [
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		];
		parent::__construct($dns ,$this->username, $this->password, $options);
	}
}