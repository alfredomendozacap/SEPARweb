<?php
require_once './libs/DB.php';

class ModeloBase extends DB{
	private $db;
	public function __construct(){
		parent::__construct();
		$this->db = new DB();
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
	public function insertNews($dataNews,$tabla)
	{
		try {
			$keys = array_keys($dataNews);
			$query = "INSERT INTO ".$tabla." (".implode(',',$keys).") \n";
        	$query .= "VALUES (:".implode(', :',$keys).")";
			$stmt = $this->db->prepare($query);

			foreach ($dataNews as $key => &$value) {
				$stmt -> bindParam(':'.$key,$value,PDO::PARAM_STR);	
			}

			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
			$stmt->close();
			$stmt=null;
		} catch (PDOException $e) {
			die('Error -> '.$e->getMessage());
		}
	}
	public function insertImages($dataModel)
	{

		try {
			$query = "INSERT INTO images (".implode(", ",array_keys($dataModel[0])).") VALUES \n";
	
			for ($i=0; $i < count($dataModel); $i++) { 
				$query .= "(?, ?, ?), ";
			}
			$query = substr($query,0,-2);
			$stmt = $this->db->prepare($query);
			$j=1;
			for ($i=0; $i < count($dataModel)*3; $i++) { 
				foreach (array_keys($dataModel[$i]) as $key => &$value) {
					$stmt -> bindParam($j,$dataModel[$i][$value]);	
					$j++;				
				}
			}
			
	
			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
			$stmt->close();
			$stmt=null;
		} catch (PDOException $e) {
			die('Error -> '.$e->getMessage());
		}


		
	}
	public function getSomeItem($tabla,$item,$condition,$getOne,$getFew,$getAll,$getAllRows,$limit = "")
	{

		try {
			if ($getAllRows && $item == '*' && empty($condition)) {
				$query = "SELECT ".$item." FROM ".$tabla;
			}else{
				if ($getOne && !is_array($item) && !empty($condition)) {
					$query = "SELECT ".$item." FROM ".$tabla." WHERE ".$condition[0]." = :".$condition[0];				 
				}elseif ($getFew && is_array($item) &&  !empty($condition)) {
					$rows = implode(', ',$item);
					$query = "SELECT ".$rows." FROM ".$tabla." WHERE ".$condition[0]." = :".$condition[0];
					 
				}elseif ($getAll && $item == '*' && !empty($condition)) {
					$query = "SELECT ".$item." FROM ".$tabla." WHERE ".$condition[0]." = :".$condition[0]; 
				}else{
					die('No cumple las condiciones');
				}
			}

			if ($limit !== "") {
				$query .= " ORDER BY id DESC LIMIT ".$limit;
			}

			$stmt = $this->db->prepare($query);
			if (!$getAllRows) {
				$stmt -> bindParam(':'.$condition[0],$condition[1]);
			}

			if ($stmt -> execute()) {
				if (!$getAllRows) {
					$return = ($stmt->rowCount() == 1) ? $stmt->fetch(PDO::FETCH_ASSOC) : false;
				}else{
					$return = ($stmt->rowCount() >= 1) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : false;
				}
			}else{
				$return = false;
			}
			return $return;
			$stmt->close();
			$stmt=null;
		} catch (PDOException $e) {
			die('Error -> '.$e->getMessage());
		}

	}
	public function doJoinImages($id,$relevance)
	{
		try{
			$query = "select i.image from images i inner join noticias n on (i.id_noticia = n.id) WHERE n.id = ".$id." and i.relevance = '".$relevance."'";
			$stmt = $this->db->prepare($query);
			if ($stmt->execute()) {
				if ($relevance == 'p') {
					$return = ($stmt->rowCount() == 1) ? $stmt->fetch() : false; 	
				}else{
					$return = ($stmt->rowCount() >= 1) ? $stmt->fetchAll() : false;
				}
			}
			return $return;
			$stmt->close();
			$stmt=null;
		} catch (PDOException $e) {
			die('Error -> '.$e->getMessage());
		}
	}
}
