
<h1><?php echo $info['titulo'];?> (<?php echo $qt_membros ?> <?php echo ($qt_membros == '0' || $qt_membros == '1' )?'membro':'membros' ?>)    </h1>

<?php if($is_membro): ?>

Bem vindo ao Grupo !

<?php else: ?>

<h3>Você ainda não é membro deste grupo.</h3>
<a href="<?php echo BASE_URL;?>grupos/entrar/<?php echo $id_grupo;?>" class="btn btn-dark"> Entrar no Grupo</a>

<?php endif; ?>	