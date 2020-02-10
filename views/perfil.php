<h2>Editar Perfil</h2>

	<form method="POST">
				<div class="form-group">
					<label  for ="nome">Nome: </label>
					<input  type ="text" class="form-control" name="nome" id="nome" value="<?php echo $info['nome']; ?>" />
				</div>
				<div class="form-group">
					<label for ="bio">Bio :</label>
					<textarea name="bio" id="bio" class="form-control" placeholder="<?php echo $info['bio']; ?>"></textarea>
				</div>
				<div class="form-group">
					<label  for ="senha">Senha</label>
					<input  type ="password" class="form-control" name="senha" id="senha" />
				</div>
				<div class="form-group">
					<strong>E-mail</strong><br/>
					<?php echo $info['email'] ?>
					
				</div>	
				
				<div class="radio">
					<strong>Sexo: </strong><br/>
					<label><input  type ="radio" name="sexo" value="1"  /> Masculino  </label><br/>
					<label><input  type ="radio" name="sexo" value="0"  /> Feminino </label>
				</div>
					


				<button type="submit" class="btn btn-success">Salvar</button>
	</form>