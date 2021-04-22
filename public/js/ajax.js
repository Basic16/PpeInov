$(document).ready(function() {
	var selectTheme = document.getElementById("selectTheme");
	var boutonExercice = document.getElementById("boutonExercice")
	var tableaures= document.getElementById("tableaures")
	var inputExercice = document.getElementById("inputExercice")
	var bonnereponse = document.getElementById("bonnereponse")
	var boutonExerciceFormulaire = document.getElementById("boutonExerciceFormulaire")
	var affichage = document.getElementById("affichage")
	var resultat = document.getElementById("resultat")
	var titre= document.getElementById("titre")
	var tableau =[]
	var tableau2 = []
	var numero= 1
	var num =1
	var tabbonnereponse = []
	var tabmauvaisereponse = []
	var tabquestion =[]
	tabreponse = []
	var tableauhtml= document.getElementById("tableauhtml")
	var tabApi=[]
var user=document.getElementById("user")

	

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
			tabquestion.push(tableau2[num])
			tabreponse.push(tableau[num])
			
		});
		request.fail(function(jqXHR, textStatus){
			console.log("erreur");
		}
		);
	}

	boutonExerciceFormulaire.addEventListener('click', e => {
		tabApi.push(inputExercice.value)
		if (inputExercice.value==tableau[num]){
			
			numero = numero+1
			num = Math.floor(Math.random() * tableau.length)
			affichage.innerText= numero+ "/10 traduire le mot suivant en Anglais: " + tableau2[num]
			tabbonnereponse.push(inputExercice.value)
			tabquestion.push(tableau2[num])
			tabreponse.push(tableau[num])
			
			
		}
		else{
			console.log("trompé")
			num = Math.floor(Math.random() * tableau.length)
			numero = numero+1
			affichage.innerText= numero+ "/10 traduire le mot suivant en Anglais: " + tableau2[num]
			tabmauvaisereponse.push(inputExercice.value)
			tabquestion.push(tableau2[num])
			tabreponse.push(tableau[num])
			
		}
		
		if (numero == 11){
			affichage.innerText= "test terminé"
			inputExercice.style.visibility="hidden"
			resultat.style.visibility="visible"
			boutonExerciceFormulaire.style.visibility="hidden"
			post()
			
			
			
		}
		});
		ajax()
		resultat.addEventListener("click",e=>{
		
		tableaures.style.visibility="visible"
		resultat.style.visibility="hidden"
		affichage.innerText = "vous avez "+tabbonnereponse.length+" bonnes réponses"
		inputExercice.style.visibility="hidden"
		titre.innerText = "Correction"
		
		for (i = 0;i<tabbonnereponse.length;i++){
			var  TR = document.createElement("tr")
			var  th  = document.createElement("th")
			var th1 = document.createElement("th")
			var th3 = document.createElement("th")
			TXT1 = document.createTextNode(tabquestion[i])
			var container = document.createElement("span");
			TXT2 = document.createTextNode(tabbonnereponse[i])
			container.appendChild(TXT2)
			container.style.color = "green";
			th1.appendChild(container)
			TXT3 = document.createTextNode(tabbonnereponse[i])
			
			th.appendChild(TXT1)
			th3.appendChild(TXT3)
			TR.appendChild(th)
			TR.appendChild(th1)
			TR.appendChild(th3)
			tableauhtml.appendChild(TR)
		}
		for (i = 0;i<tabmauvaisereponse.length;i++){
			var  TR = document.createElement("tr")
			var  th  = document.createElement("th")
			var th1 = document.createElement("th")
			var th3 = document.createElement("th")
			TXT1 = document.createTextNode(tabquestion[i])
			var container = document.createElement("span");
			TXT2 = document.createTextNode(tabmauvaisereponse[i])
			container.appendChild(TXT2)
			TXT3 = document.createTextNode(tabreponse[i])
			container.style.color = "red";
			th1.appendChild(container)
			th.appendChild(TXT1)
			th3.appendChild(TXT3)
			TR.appendChild(th)
			TR.appendChild(th1)
			TR.appendChild(th3)
			tableauhtml.appendChild(TR)
		}
		
	})
			
		function post(){
			
			var request=$.ajax({
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
					},
				url:"http://serveur1.arras-sio.com/symfony4-4057/PpeInov/public/api/tests", 
				method: "POST",

				data:JSON.stringify({
					niveau: 0,
					libelle: "test",
					users: [
						"/symfony4-4057/PpeInov/public/api/users/"+user.value
					  ],
					theme: "/symfony4-4057/PpeInov/public/api/themes/13",
					note: tabbonnereponse.length,
					reponse1: tabApi[0],
					reponse2: tabApi[1],
					reponse3: tabApi[2],
					reponse4: tabApi[3],
					reponse5: tabApi[4],
					reponse6: tabApi[5],
					reponse7: tabApi[6],
					reponse8: tabApi[7],
					reponse9: tabApi[8],
					reponse10: tabApi[9],
					additionalProp1: {}
					}),
					dataType: "json",
					beforeSend: function(xhr){
					xhr.overrideMimeType("application/json; charset=utf-8");
					
				}	
			   });
			   request.done(function(msg){
				
				});
				request.fail(function(jqXHR, textStatus, error){
				console.log(error);
				});
		}
		
});	