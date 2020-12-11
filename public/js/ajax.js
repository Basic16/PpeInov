$(document).ready(function() {
	var selectTheme = document.getElementById("selectTheme");
	var boutonExercice = document.getElementById("boutonExercice")
	var formulaireExercice = document.getElementById("formulaireExercice")
	boutonExercice.addEventListener("click",afficherTest(),false)
	

	selectTheme.addEventListener('change', e => {
		boutonExercice.style.visibility="visible"
		});
		
	function afficherTest(){
		formulaireExercice.style.visibility="visible"
	}




	
	function ajax(){
		var request=$.ajax({
		 url:"http://serveur1.arras-sio.com/symfony4-4057/PpeInov/public/api/themes", 
		 method: "GET",
		 dataType: "json",
		 beforeSend: function(xhr){
		 	xhr.overrideMimeType("application/json;charset=utf-8");
		 }	
	    });
		request.done(function(Theme){
			selectTheme.innerHTML = "";
			$.each(Theme, function(index, e){

				selectTheme.innerHTML =selectTheme.innerHTML +"<option value="+e.libelle+">"+e.libelle+"</option>";
			});
		});
		request.fail(function(jqXHR, textStatus){
			console.log("erreur");
		}
		);

    }
    ajax()
	

});	