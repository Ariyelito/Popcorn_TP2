
function listerF(listFilms){
	var taille;
	var rep="";
	taille=listFilms.length;
	for(var i=0; i<taille; i++){
		rep+="-"+listFilms[i].idFilm+";"+listFilms[i].titre+";"+listFilms[i].duree+";"+listFilms[i].montant+listFilms[i].photo +"</br>";		 
	}
    $('#text').html( rep);
}

var filmsVue=function(reponse){

	var action=reponse.action; 
	switch(action){
		case "enregistrer" :
		case "enlever" :
		case "modifier" :
			$('#messages').html(reponse.msg);
			setTimeout(function(){ $('#messages').html(""); }, 5000);
		break;
		case "lister" :
			listerF(reponse.listeFilms);
		break;
		case "fiche" :
			afficherFiche(reponse);
		break;
		
	}
}
