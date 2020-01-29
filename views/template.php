<html>
	<head>
		<title>Titulo do Sistema</title>
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/template.css" />
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css"/>
	</head>
	<body>
		<div class="container">
		<header class="text-center">
			<h1> Titulo do Sistema </h1>
		</header>	

		<section>
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		</section>

		<footer class="page-footer font-small blue pt-4">
			<div class="container text-center text-md-lef">
			Todos os direitos reservados. Criado por Alfredo Stochiero.
			</div>
		</footer>
		
	</div>	
	<script src="<?php echo BASE_URL;?>assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>	
	<script src="<?php echo BASE_URL;?>assets/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>