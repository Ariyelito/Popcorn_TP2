function showUpdate(idFilm){

	var formFilm = new FormData();
	formFilm.append('action','updateFilmShow');
	formFilm.append('idFilm',idFilm);
    $.ajax({
        type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
			filmsVue(reponse);
		},
		fail : function (err){
  
		} 
    });   
 
}


function lister(){

	var formFilm = new FormData();
	formFilm.append('action','lister');
    $.ajax({
        type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
            filmsVue(reponse);
		},
		fail : function (err){
  
		} 
    });   
 
}

function deleteR(idFilm){
	var formFilm = new FormData();
	formFilm.append('action','delete');
	formFilm.append('idFilm',idFilm);
    $.ajax({
        type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){
			
            filmsVue(reponse);
		},
		fail : function (err){
		
		} 
    });   
 
}

function ajouterR(){	
	var formFilm = new FormData(document.getElementById('formRegister'));
	formFilm.append('action','ajouter');
	$.ajax({
        type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		async : false,
		cache : false,
		contentType : false,
		processData : false,	
		dataType : 'json',
		success : function (reponse){		
            filmsVue(reponse);
		},
		fail : function (err){
		
		} 
    });   
}

function updateR(idFilm){	
	var formFilm = new FormData(document.getElementById('formRegister'));
	formFilm.append('action','update');
	formFilm.append('idFilm',idFilm);
	var x = formFilm.get("inputTitre");
	$.ajax({
        type : 'POST',
		url : 'Films/filmsControleur.php',
		data : formFilm,
		contentType : false, 
		processData : false,
		dataType : 'json',
		success : function (reponse){	
            filmsVue(reponse);
			alert(reponse);
		},
		fail : function (err){
			alert(reponse);
		} 
    });   
}

