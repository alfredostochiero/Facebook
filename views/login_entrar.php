<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inital-scale=1">
		<title>Facebook</title>
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css"/>
	</head>
	<body>
		<nav class="navbar navbar-dark bg-dark navbar-expand-md">
			<div class="container">
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo BASE_URL; ?>"> Rede Social </a></li>
					</ul>
					<ul class="nav navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo BASE_URL;?>login/entrar"> Login </a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL;?>login/cadastrar" > Cadastrar </a>
						</li>
					</ul>
				</div>
			</div>				
		</nav>	
		<div class="container">
			<h1>Login</h1>

			<?php if(!empty($erro)): ?>
			<div class="alert alert-danger"> <?php echo $erro; ?> </div>
			<?php endif; ?>	

			<form method="POST">
				<div class="form-group">
					<label  for ="email">E-mail</label>
					<input  type ="email" class="form-control" name="email" id="email" />
				</div>	
				<div class="form-group">
					<label  for ="senha">Senha</label>
					<input  type ="password" class="form-control" name="senha" id="senha" />
				</div>
				<button type="submit" class="btn btn-success">Entrar</button>
			</form>

		</div>

	<script src="<?php echo BASE_URL;?>assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>	
	<script src="<?php echo BASE_URL;?>assets/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>