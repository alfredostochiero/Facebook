<?php
  class Buscas extends model {

  	public function procurar ($q){
  		$array = array();
  		$q = addslashes($q);

  		$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$q%'";
  		$sql = $this->db->query($sql);

  		if($sql->rowCount()>0){
  			$array = $sql->fetchAll();
  		}

  		return $array;
  	}

  
  }

  
?>