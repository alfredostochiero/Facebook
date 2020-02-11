<?php
class Posts extends model {

	public function addPost($msg,$foto){

		$usuario = $_SESSION['lgsocial'];
		$tipo = 'texto';
		$url = '';

		if(count($foto)>0){ // se for maior que zero, então não foi enviado um array vazio
			$tipos = array('image/jpeg','image/jpg','image/png'); // os tipos de imagem permitidos no sistema 
			if(in_array($foto['type'],$tipos)){  // verificar se o tipo de arquivo enviado é um dos permitidos
				$tipo = 'foto';
				$url = md5(time().rand(0,999)); // cria um md5 aleatorio único;
				switch ($foto['type']) {  // verifica qual tipo e o concatena com a url.
					case 'image/jpeg':
					case 'image/jpg':
						$url .= '.jpg';
						break;
					case 'image/png':
						$url .='.png';
						break;	
				}

				move_uploaded_file($foto['tmp_name'], 'assets/images/posts/'.$url); // move o arquivo para pasta posts 
			}
		}

		
		$sql = "INSERT INTO posts (id_usuario, data_criacao,tipo,texto,url,id_grupo) VALUES ('$usuario',NOW(),'$tipo','$msg','$url','0')";

		$this->db->query($sql);

	}

	public function getFeed() {

		$array = array();

		$r = new Relacionamentos();
		$ids = $r->getIdsFriends($_SESSION['lgsocial']);
		$ids[] = $_SESSION['lgsocial'];

		$sql = "SELECT *, (select usuarios.nome from usuarios where usuarios.id = posts.id_usuario) as nome FROM posts WHERE id_usuario IN (".implode(',',$ids).") ORDER BY data_criacao DESC";
		$sql = $this->db->query($sql);
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}

		return $array;

	}
}