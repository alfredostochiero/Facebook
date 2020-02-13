
<h1><?php echo $info['titulo'];?> (<?php echo $qt_membros ?> <?php echo ($qt_membros == '0' || $qt_membros == '1' )?'membro':'membros' ?>)    </h1>

<?php if($is_membro): ?>


<div class="post_area">
	<form method="POST" enctype="multipart/form-data">
		<h4>O que você está pensando?</h4>
		<textarea name="post" class="form-control"> </textarea><br/>
		<input type="file" name="foto"/><br><br>
		<input type="submit" value="Postar" class="btn btn-default"/>
	</form>
</div>
<div class="feed" >
	<?php 
		if(count($feed)>=1) {
			foreach($feed as $postitem){
				$this->loadView('postitem',$postitem); // para cada postagem será carregada um view 
				}
			}
	    ?>
			
	
</div>	


<?php else: ?>

<h3>Você ainda não é membro deste grupo.</h3>
<a href="<?php echo BASE_URL;?>grupos/entrar/<?php echo $id_grupo;?>" class="btn btn-dark"> Entrar no Grupo</a>

<?php endif; ?>	