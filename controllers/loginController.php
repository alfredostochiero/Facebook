<?php
class loginController extends controller {

   public function __construct() {
   		parent::__construct();
   }

   public function index() {
             
        $dados = array();
   
        $this->loadView('login', $dados);
    }

    public function entrar() {
    	$dados = array('erro'=>'');

      if(isset($_POST['email'])   && !empty($_POST['email'])){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        $u = new Usuarios();
        $dados['erro'] = $u->logar($email, $senha);

      }

    	$this->loadView('login_entrar',$dados);
    }
    public function cadastrar() {
    	$dados = array();

    	$this->loadView('login_cadastrar',$dados);
    }

}