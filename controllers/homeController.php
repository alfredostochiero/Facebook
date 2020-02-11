<?php
class homeController extends controller {

	public function __construct() {
   		parent::__construct();
   		$u = new Usuarios();
   		$u->verificarLogin();
   	}

	public function index() {
      $u = new Usuarios();
      $p = new Posts();
      $r = new Relacionamentos();
        
      $dados = array(
        'usuario_nome' => ''
      );

   		$dados['usuario_nome'] = $u->getNome($_SESSION['lgsocial']);

      if (isset($_POST['post']) && !empty($_POST['post'])) {
        $postmsg = addslashes($_POST['post']);
        $foto = array();

        if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) {
          $foto = $_FILES['foto'];
        }

       
        $p->addPost($postmsg,$foto);

      }

      



      $sugestoes = 5; // quantidade que será mostrada na sugestões de amigos
      $dados['sugestoes'] = $u->getSugestoes($sugestoes); 
      $dados['requisicoes'] =  $r->getRequisicoes();
      $dados['totalamigos'] =  $r->getTotalAmigos($_SESSION['lgsocial']);
      $dados['feed'] = $p->getFeed();




      $this->loadTemplate('home', $dados);
    }

}