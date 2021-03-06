<div class="row">
	<div class="col-sm-8">
		<h3 style="margin-top:10px">O que você está pensando :</h3>
		<div class="post_area">
			<form method="POST" enctype="multipart/form-data">
				<textarea name="post" class="form-control"> </textarea>
				<input type="file" name="foto"><br><br>
				<input type="submit" value="Postar" class="btn btn-default">
			</form>
		</div>
		<div class="feed" >

			<?php 
				if(count($feed) > 1) {
					foreach($feed as $postitem){
						$this->loadView('postitem',$postitem); // para cada postagem será carregada um view 
					}
				}
			?>
		</div>	
	</div>
	<div class="col-sm-4">
		<?php if(count($requisicoes)>0): ?>
			<div class="widget">
				<h4>Requisições de amizade </h4>
				<?php foreach($requisicoes as $pessoa): ?>
				<div class="requisicaoitem">	
					<strong> <?php echo $pessoa['nome']; ?></strong>	
					<button class="btn btn-default float-right" onclick="aceitarFriend('<?php echo $pessoa['id'];?>',this)">+</button>
				</div>
				<?php endforeach; ?>	
			</div>
		<?php endif; ?>	

		<div class="widget">
			<h4>Meus Amigos </h4>
			<?php echo $totalamigos; ?> amigo<?php echo ($totalamigos =='1' || $totalamigos =='0')?'':'s' ?>		
		</div>
		<?php if(count($sugestoes)>0): ?>
			<div class="widget">
				<h4>Sugestões de amigos </h4>
				<?php foreach($sugestoes as $pessoa): ?>
				<div class="sugestaoitem">	
					<strong> <?php echo $pessoa['nome']; ?></strong>	
					<button class="btn btn-default float-right" onclick="addFriend('<?php echo $pessoa['id'];?>',this)">+</button>
				</div>
				<?php endforeach; ?>		
			</div>
		<?php endif; ?>	

			<div class="widget">
				<h4>Grupos </h4>
				<form method="POST">
					<div class="input-group">
						<input type="text" class="form-control" name="grupo" placeholder="Nome do grupo" />
						<span class="input-group-btn">
							<input type="submit" value="criar" class="btn btn-default">
						</span>	
					</div>	
				</form>	
				<?php foreach($grupos as $grupo): ?>
				<a href="<?php echo BASE_URL; ?>grupos/abrir/<?php echo $grupo['id']; ?>"> <?php echo $grupo['titulo'];?> </a><br/>
				<?php endforeach; ?>				
			</div>
	</div>
</div>