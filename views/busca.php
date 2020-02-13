<h1>Busca</h1>
<?php foreach($resultado as $busca):?>
<div class="sugestaoitem">	
	<strong> <?php echo $busca['nome']; ?></strong>	
	<button class="btn btn-default float-right" onclick="addFriend('<?php echo $busca['id'];?>',this)">+</button>
</div>
<?php endforeach; ?>

<?php foreach($resultadoGrupo as $busca):?>
<div class="sugestaoitem">	
	<strong> <?php echo $busca['titulo']; ?></strong>
	<a href="<?php echo BASE_URL;?>grupos/abrir/<?php echo $busca['id'];?>" class="btn btn-dark float-right"> Visualisar  Grupo</a>	
</div>
<?php endforeach; ?>