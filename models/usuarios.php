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
}

?>