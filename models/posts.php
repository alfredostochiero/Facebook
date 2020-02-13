<?php
class Posts extends model {

	public function addPost($msg,$foto,$id_grupo ='0'){

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

		
		$sql = "INSERT INTO posts (id_usuario, data_criacao,tipo,texto,url,id_grupo) 
		VALUES ('$usuario',NOW(),'$tipo','$msg','$url','$id_grupo')";

		$this->db->query($sql);

	}

	public function getFeed($id_grupo='0') {

		$array = array();
		$array['comentario'] = '';

		$r = new Relacionamentos();
		$ids = $r->getIdsFriends($_SESSION['lgsocial']);
		$ids[] = $_SESSION['lgsocial'];

		$sql = "SELECT 
		*, 
		(select usuarios.nome from usuarios where usuarios.id = posts.id_usuario) as 
		nome, 
		(select count(*) from posts_likes where posts_likes.id_post = posts.id) as 
		likes,
		(select count(*) from posts_likes where posts_likes.id_post = posts.id and 
		   posts_likes.id_usuario = '".($_SESSION['lgsocial'])."') as 
		liked 
		FROM posts 
		WHERE id_usuario IN (".implode(',',$ids).") AND id_grupo = '$id_grupo'
		ORDER BY data_criacao DESC";

		$sql = $this->db->query($sql);

		if($sql->rowCount()>0){
			$array = $sql->fetchAll();	
		}

		return $array;
	}

	public function isLiked($id, $id_usuario) {

		$sql = "SELECT * FROM posts_likes WHERE id_post = '$id' AND id_usuario = '$id_usuario' ";
		$sql = $this->db->query($sql);

		if($sql->rowCount()>0) {
			return true;
		} else {
			return false;
		}
	}

	public function removeLike($id, $id_usuario) {
		$sql = "DELETE FROM posts_likes WHERE id_post = '$id' AND id_usuario = '$id_usuario'";
		$this->db->query($sql);
	}

	public function addLike($id, $id_usuario) {
		$sql = "INSERT INTO posts_likes (id_post, id_usuario) VALUES ('$id', '$id_usuario')";
		$this->db->query($sql);
	}

	public function addComentario($id, $id_usuario, $txt){
		$sql = "INSERT INTO posts_comentarios (id_post, id_usuario, data_criacao,texto) VALUES ('$id','$id_usuario',NOW(),'$txt')";
		$this->db->query($sql);
	}

	// Eu criei a função getComentarios para teste//

	public function getComentarios($id_post){
		$array = array();

		$sql = "SELECT *, (select usuarios.nome from usuarios where id_usuario = usuarios.id ) as nome 
		FROM posts_comentarios WHERE id_post = '$id_post'";

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;

	}

}