$(document).ready(function() {
	function ajax(){
		var request=$.ajax({
		 url:"http://serveur1.arras-sio.com/symfony4-4053/forum/public/api/messages", 
		 method: "GET",
		 dataType: "json",
		 beforeSend: function(xhr){
		 	xhr.overrideMimeType("application/json;charset=utf-8");
		 }	
	    });
		request.done(function(msg){
			$.each(msg, function(index, e){
				console.log(e);
			});
		});
		request.fail(function(jqXHR, textStatus){
			console.log("erreur");
		}
		);

    }
    ajax();
	

});	