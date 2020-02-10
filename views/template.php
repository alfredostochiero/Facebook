<html>
	<head>
		<title>Facebook</title>
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/template.css" />
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css"/>
	</head>
	<body>
		<nav class="navbar navbar-dark bg-dark navbar-expand-md">
			<div class="container">
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo BASE_URL;?>" > Rede Social </a>
						</li>
					</ul>	
					<ul class="nav navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"> 
								<?php echo $viewData['usuario_nome'];?>
								<span class="caret"></span>
							 </a>
							 <ul class="dropdown-menu">
							 	<li><a href="<?php echo BASE_URL;?>perfil">  	 Editar Perfil  </a></li>
							 	<li><a href="<?php echo BASE_URL;?>login/sair">  Sair  			</a></li>
							 </ul>
						</li>
					</ul>
				</div>
			</div>				
		</nav>
		<div class ="container">
			<?php 
			$this->loadViewInTemplate($viewName, $viewData); 
			?>
		</div>

		<footer class="page-footer font-small blue pt-4">
			<div class="container text-center text-md-lef">
			Todos os direitos reservados. Criado por Alfredo Stochiero.
			
		</footer>
		
	
	<script src="<?php echo BASE_URL;?>assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>	
	<script src="<?php echo BASE_URL;?>assets/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>