function mostra(id){
	if(document.getElementById(id).style.display == 'block'){
		document.getElementById(id).style.display = 'none';
	}else{ document.getElementById(id).style.display = 'block';}
}
$('.mostraClass').click(function(){
	$(this).find('i').toggleClass('fa-minus-circle fa-plus-circle')
});
