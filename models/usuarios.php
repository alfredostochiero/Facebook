<?php
class Usuarios extends model {
	public function verificarLogin (){

		if(!isset($_SESSION['lgsocial']) ||  ( isset($_SESSION['lgsocial']) )   &&  empty($_SESSION['lgsocial']) ) {
			header("Location: ".BASE_URL."login");
			exit;
		} 
	}

	public function logar($email, $senha){
		$sql = $this->db->prepare( "SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(':email',$email);
		$sql->bindValue(':senha',$senha);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();

			$_SESSION['lgsocial'] = $sql['id'];
			header("Location:".BASE_URL);
		} else {
			return "E-mail e/ou senha errados";
		}
	}

	public function cadastrar($email, $nome, $sexo, $senha){
		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
		$sql->bindValue(':email',$email);
		$sql->execute();

		if($sql->rowCount() == 0){
			$sql = $this->db->prepare("INSERT INTO usuarios (email,nome,sexo,senha)  VALUES (:email,:nome,:sexo,:senha) ");
			$sql->bindValue(':email',$email);
			$sql->bindValue(':nome',$nome);
			$sql->bindValue(':sexo',$sexo);
			$sql->bindValue(':senha',md5($senha));
			$sql->execute();

			$id = $this->db->lastInsertId();
			$_SESSION['lgsocial'] = $id;
			header("Location:".BASE_URL);


		}else {
			return "E-mail já cadastrado! Tente cadastrar com outro e-mail";
		}

	}

	public function getNome($id){
		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
		$sql->bindValue(':id',$id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			return $sql['nome'];
		} else {
			return false;
		}
	}

	public function getDados($id) {
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
		$sql->bindValue(':id',$id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();

		}

		return $array;
	}

	public function updatePerfil($array = array()) {

		if(count($array)>0) {
			$sql = "UPDATE usuarios SET ";
			$campos = array();
			foreach($array as $campo => $valor){
				$campos[] = $campo." = '".$valor."'";
			}
			$sql .= implode(', ',$campos);
			$sql .= "WHERE id = '".($_SESSION['lgsocial'])."'";

			$this->db->query($sql);
		}
	}

	public function getSugestoes($limit = 5){
		$array = array();
		$meuid = $_SESSION['lgsocial'];

		$r = new Relacionamentos();
		$ids = $r->getIdsFriends($meuid);

		if(count($ids)==0){   // Caso não tiver nenhum amigo, irá excluir somente o id do usuário logado
			$ids[] = $meuid;
		}


		$sql = "SELECT usuarios.id, usuarios.nome FROM usuarios 
		    	WHERE usuarios.id != '$meuid' AND
		    	usuarios.id NOT IN (".implode(',', $ids).") 
				ORDER BY RAND() LIMIT $limit ";

		$sql = $this->db->query($sql);

		if($sql->rowCount()>0){
			$array = $sql->fetchALL();
		}

		return $array;
	}

	

}

?>