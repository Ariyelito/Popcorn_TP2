function lister(){
	var formFilm = new FormData();
	formFilm.append('action','lister');
    $.ajax({
        type : 'POST',
		url : 'db/Films/filmsControleur.php',
		data : formFilm,//{action:'lister'}
		contentType : false,
		processData : false,
		dataType : 'json', //text pour le voir en format de string
		success : function (reponse){//alert(reponse);
            filmsVue(reponse);
		},
		fail : function (err){
  
		} 
    });
   
 
}