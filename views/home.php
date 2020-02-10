<div class="row">
	<div class="col-sm-8">
		
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

		<div class="widget">
			<h4>Sugestões de amigos </h4>
			<?php foreach($sugestoes as $pessoa): ?>
			<div class="sugestaoitem">	
				<strong> <?php echo $pessoa['nome']; ?></strong>	
				<button class="btn btn-default float-right" onclick="addFriend('<?php echo $pessoa['id'];?>',this)">+</button>
			</div>
			<?php endforeach; ?>	
			
		</div>
	</div>
</div>