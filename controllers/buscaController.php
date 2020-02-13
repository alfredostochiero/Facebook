<?php
class buscaController extends controller {
	public function __construct() {
   		parent::__construct();
   		$u = new Usuarios();
   		$u->verificarLogin();
   	}

   	public function index(){
	  $u = new Usuarios();
	  $b = new Buscas();
    
      $dados = array(
        'usuario_nome' => ''
      );
   	  $dados['usuario_nome'] = $u->getNome($_SESSION['lgsocial']);

   	  $dados['resultado'] = $b->procurar($_GET['q']);

   	  $this->loadTemplate('busca', $dados);
   	}
}