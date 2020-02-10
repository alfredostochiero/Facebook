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