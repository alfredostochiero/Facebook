<?php
class homeController extends controller {

	public function __construct() {
   		parent::__construct();
   		$u = new Usuarios();
   		$u->verificarLogin();
   	}

	public function index() {
        
        $dados = array(
        	'usuario_nome' => ''
        );
   		$u = new Usuarios();
   		$dados['usuario_nome'] = $u->getNome($_SESSION['lgsocial']);

      $r = new Relacionamentos();



      $sugestoes = 5; // quantidade que será mostrada na sugestões de amigos
      $dados['sugestoes'] = $u->getSugestoes($sugestoes); 
      $dados['requisicoes'] =  $r->getRequisicoes();
      $dados['totalamigos'] =  $r->getTotalAmigos($_SESSION['lgsocial']);

      $this->loadTemplate('home', $dados);
    }

}