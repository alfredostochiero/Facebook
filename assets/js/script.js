function addFriend(id, obj){

	if( id != ''){

		$(obj).closest('.sugestaoitem').fadeOut();

		$.ajax({
			type:'POST',
			url:'ajax/add_friend',
			data:{id:id}
		});
	}
}

function aceitarFriend(id, obj){

	if( id != ''){

		$(obj).closest('.requisicaoitem').fadeOut();

		$.ajax({
			type:'POST',
			url:'ajax/aceitar_friend',
			data:{id:id}
		});
	}

}

function curtir(obj){
	var id = $(obj).attr('data-id');
	var likes = parseInt($(obj).attr('data-likes'));
	var liked  = parseInt($(obj).attr('data-liked'));
	if(liked == 0){
		likes++;
		liked = 1;
		var texto = 'Descurtir';
	} else {
		likes--;
		liked = 0;
		var texto = 'Curtir';
	}

	$(obj).attr('data-likes', likes);
	$(obj).attr('data-liked', liked);

	$(obj).html('('+likes+')' + texto);

	
	$.ajax({
		type:'POST',
		url:'ajax/curtir',
		data:{id:id}
	});
	

}