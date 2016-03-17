$(document).ready(function() {	

	carregaItems('Emails');

	setInterval(function(){carregaItems('Emails');}, 1000);
	
	function carregaItems(param) {
		$('.lista-items').html('<li>Carregando Novos Items Encontrados...</li>');
	
		$.ajax({
			url: base_url + '/Requests/get'+param,
			type: "GET",
			dataType: "json",
			success: function (data) {			
				$('.lista-items').html('');
				
				$.each(data['items'], function(index) {
					$('.lista-items').append('<li>'+data['items'][index]['email']+'</li>');
					//console.log(data['items'][index]['url']);
				});
			}
		});
	}
	  
});