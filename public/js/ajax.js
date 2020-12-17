$(document).ready(function() {
	var selectTheme = document.getElementById("selectTheme");
	var boutonExercice = document.getElementById("boutonExercice")
	var formulaireExercice = document.getElementById("formulaireExercice")
	var inputExercice = document.getElementById("inputExercice")
	var boutonExerciceFormulaire = document.getElementById("boutonExerciceFormulaire")
	var affichage = document.getElementById("affichage")
	var resultat = document.getElementById("resultat")
	var reponse =""
	var tableau =[]
	var tableau2 = []
	var numero= 1
	var num =""
	

	selectTheme.addEventListener('change', e => {
		boutonExercice.style.visibility="visible"
		});
	boutonExercice.addEventListener('click', e => {
			selectTheme.style.visibility="hidden"
			inputExercice.style.visibility="visible"
			boutonExerciceFormulaire.style.visibility="visible"
			boutonExercice.style.visibility="hidden"
			ajax2()
			affichage.style.visibility="visible"
		});
	
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
			selectTheme.innerHTML = "Choisissez un theme";
			$.each(Theme, function(index, e){
				selectTheme.innerHTML =selectTheme.innerHTML +"<option value="+e.libelle+">"+e.libelle+"</option>";
			});
		});
		request.fail(function(jqXHR, textStatus){
			console.log("erreur");
		}
		);
	}
	
    
	function ajax2(){
		var request=$.ajax({
		 url:"http://serveur1.arras-sio.com/symfony4-4057/PpeInov/public/api/vocabulaires", 
		 method: "GET",
		 dataType: "json",
		 beforeSend: function(xhr){
		 	xhr.overrideMimeType("application/json;charset=utf-8");
		 }	
	    });
		request.done(function(Vocabulaire){		
			$.each(Vocabulaire, function(index, e){
				tableau.push(e.libelleEn)
				reponse = e.libelleEn
				tableau2.push(e.libelle)
			});
			console.log(tableau)
			console.log(tableau2)
			 num = Math.floor(Math.random() * tableau.length)
			affichage.innerText= numero+ "/10 traduire le mot suivant en Anglais: " + tableau2[num]
			
		});
		request.fail(function(jqXHR, textStatus){
			console.log("erreur");
		}
		);
	}

	boutonExerciceFormulaire.addEventListener('click', e => {
		if (inputExercice.value==tableau[num]){
			console.log("cest bon")
			numero = numero+1
			num = Math.floor(Math.random() * tableau.length)
			affichage.innerText= numero+ "/10 traduire le mot suivant en Anglais: " + tableau2[num]
			console.log(numero)
			
		}
		else{
			console.log("trompé")
			num = Math.floor(Math.random() * tableau.length)
			numero = numero+1
			affichage.innerText= numero+ "/10 traduire le mot suivant en Anglais: " + tableau2[num]
			console.log(numero)
		}
		
		if (numero == 10){
			resultat.style.visibility="visible"
			boutonExerciceFormulaire.style.visibility="hidden"
			
		}
		});
		ajax()
		
});	