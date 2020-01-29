<?php
class erro404Controller extends controller {
	public function index () {
		$dados = array();

		$this->loadView('error',$dados);
	}
}


?>