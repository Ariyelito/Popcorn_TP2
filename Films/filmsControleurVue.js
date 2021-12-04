
function listerF(listFilms){

	var taille;

	var rep=`<div id="contListMembre" class="container mt-5">
    <h1 class="h1 text-center">Liste des films</h2>
    <div class="input-group mb-3">
        <a id="btnAjouterFilm" class="btn btn-outline-success bg-gradient" onclick="ajouterForm();">Ajouter un film</a>        

    
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Titre</span>
            </div>   

            <form  action="./listerFilms.php" method="GET">
            <input type="sumbit" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="titre" value="">
          
            </form>
        

    </div>

        <table class="table table-striped table-hover table-borderless">
            <thead class="table-success">             
                <th scope="col">ID</th>
                <th scope="col">titre</th>
                <th scope="col">duree</th>
                <th scope="col">langue</th>
                <th scope="col">date</th>
                <th scope="col">montant</th>
                  <th scope="col">photo</th> 
                <th scope="col">Actions

                </th>
            </thead>  <tbody>`;
	

	taille=listFilms.length;
	for(var i=0; i<taille; i++){
		rep+=`  <tr>
		<td>${listFilms[i].idFilm}</td>
		<td>${listFilms[i].titre}</td>
		<td>${listFilms[i].duree}</td>
		<td>${listFilms[i].langue}</td>
		<td>${listFilms[i].date}</td>
		<td>${listFilms[i].montant}</td>
	 	<td>${listFilms[i].photo}</td>
		<td>
			<div class="btn-group">
				
				<form  action="" method="GET">
				<input type="hidden" name="idFilm" value="${listFilms[i].idFilm}">                
				<input id='btnModifierFilm' class="btn bg-gradient btn-outline-warning"  value="Update" onclick='update(${listFilms[i].idFilm})'>
				<input id='btnDeleteFilm' class="btn bg-gradient btn-outline-danger" onclick='deleteR(${listFilms[i].idFilm})' value="Delete">
				</form>
			  
				
			</div>
		</td>
	</tr>`;		 
	}
	rep+=`    
</div>
`;

    $('#container').html(rep);
}

function deleteF(msg){
 alert(msg);
}
function ajouterF(msg){
	alert(msg);
}

function updateF(msg){
	alert(msg);
} 

function getStatut(statut)
{
if (statut == 0) {
    return "inactif";
} else return "actif";
}
function getRole(role)
{

if (role == 'A')
    return "Admin";
else if (role == 'M')  return "Membre";
}


var filmsVue=function(reponse){

	var action=reponse.action; 
	switch(action){
		case "ajouter" :
			ajouterF(reponse.msg);
			break;
		case "delete" :		
					deleteF(reponse.msg);
			break;
		case "update" :			
			updateF(reponse.msg);
		
		break;
		case "lister" :		
			listerF(reponse.listeFilms);
		break;
		case "fiche" :
			afficherFiche(reponse);
		break;
		
	}
}
	/*$('#messages').html(reponse.msg);
			setTimeout(function(){ $('#messages').html(""); }, 5000);*/