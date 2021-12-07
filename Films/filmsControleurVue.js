function appendCategories(){
    // ...
}
// manque photo categorie et realisateur
function updateFilmShow(film){
	var rep = 
    `
    <h1 class="h1 text-center">Modifier un film</h1>
    <form id="formRegister" class="row" onSubmit="return validerFilm()">

        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="inputTitre" class="form-label">Titre :</label>
                <input type="text" class="form-control" id="inputTitre" name="inputTitre" value="${film.titre}">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="inputReal" class="form-label">Réalisateur :</label>
                                    
                <input list="brow">
                <datalist id="brow">
                   <option>A</option>
                   <option>b</option>
                </datalist>  

            </div>
        </div>

        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="inputDate">Date de sortie :</label>
                <input type="date" class="form-control" id="inputDate" name="inputDate value="${film.date}">
            </div>
        </div>

        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="InputLangue">Langue :</label>
                <select class="form-control" id="InputLangue" name="langue">
                    <option value="1">Français</option>
                    <option value="2">Anglais</option>
                    <option value="3">Espagnol</option>                                 
                </select>
            </div>
        </div>

        <div class="col-6 col-sm-4 mt-3">
            <div class="form-group">
                <label for="inputCout">Coût :</label>
                <input type="text" class="form-control" id="inputCout" name="inputCout" value="${film.montant}">
            </div>
        </div>

        <div class="col-6 col-sm-4 mt-3">
            <div class="form-group">
                <label for="inputDure">Durée :</label>
                <input type="text" class="form-control" id="inputDure" name="inputDure" value="${film.duree}">
            </div>
        </div>

        <div class="col-sm-4 mt-3">
            <div class="form-group">
                <label for="inputCat">Catégorie :</label>
                <select class="form-control" id="inputCat" name="inputCat">                         
                        <option value="action"></option>
                </select>
            </div>
        </div>
        <div class="col-12 mt-3">
            <label for="formFile" class="form-label">Poster pour le film (image) :</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <br>
        <div class="col-12 mt-3">
            <label for="descriptionText" class="form-label">Description du film :</label>
            <textarea id="descriptionText" name="descriptionText" class="form-control" rows="3">${film.description}</textarea>
        </div>
        <div class="col-12 mt-3">
            <button id="btnUpdateFilm" onclick='updateR(${film.idFilm})' class="btn btn-success bg-gradient">Modifier</button>

        </div>
    </form>
    <button id="btnAnnulerAddFilm" class="btn btn-danger bg-gradient mt-2">Annuler</button>
`

$("#container").html(rep);
}





function listerF(listFilms){
	var taille;
	var rep=`<div id="contListFilm" class="container mt-5">
    <h1  class="h1 text-center">Liste des films</h2>
    <div class="input-group mb-3 ">
        <a id="btnAjouterFilm" class="btn btn-success bg-gradient col-6 col-sm-4" >Ajouter un film</a>        
        
        <div id="searchBar" class="input-group-prepend">
            <span id="spanParTitre" class="input-group-text" id="inputGroup-sizing-default">Chercher par titre : </span>
            </div>   
            <input id="inputTitre" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="inputTitre" value="">
            <a id="btnSearchFilm" class="btn btn-success bg-gradient col-6 col-sm-4" >Go</a>    
        </div>

        <table class="table table-striped table-hover table-borderless">
            <thead class="table-success"> 
            <th scope="col">Photo</th>            
                <th scope="col">ID</th>
                <th scope="col">titre</th>
                <th scope="col">duree</th>
                <th scope="col">langue</th>
                <th scope="col">date</th>
                <th scope="col">montant</th>
                <th scope="col">Actions

                </th>
            </thead>  <tbody>`;
	

	taille=listFilms.length;
	for(var i=0; i<taille; i++){
		rep+=`  <tr>
        <td> <img src="${listFilms[i].photo}" class="card-img-top imgFilm" style="  width: 100px; height: 150px;" alt="poster officiel du film"></td>
        
		<td>${listFilms[i].idFilm}</td>
		<td>${listFilms[i].titre}</td>
		<td>${listFilms[i].duree}</td>
		<td>${listFilms[i].langue}</td>
		<td>${listFilms[i].date}</td>
      
		<td>${listFilms[i].montant}</td>
       
		<td>
			<div class="btn-group">
				
				<form  action="" method="GET">
				<input type="hidden" name="idFilm" value="${listFilms[i].idFilm}">       
                <input id='btnDetailsFilm' class="btn bg-gradient btn-primary mb-2" value="Afficher les details">         
				<input id='btnModifierFilm' class="btn bg-gradient btn-warning mb-2"  value="Mettre à jour" onclick='showUpdate(${listFilms[i].idFilm})'>
				<input id='btnDeleteFilm' class="btn bg-gradient btn-danger" onclick='deleteR(${listFilms[i].idFilm})' value="Supprimer ce film">
               
				</form>
			  
				
			</div>
		</td>
	</tr>`;		 
	}
	rep+=`    
</div>
`;
    
    $('#container').html(rep);

    $('#btnAjouterFilm').on("click", function() {
        $("#contAddFilm").show();
        $("#container").hide();
    });

    
    $('#btnAnnulerAddFilm').on("click", function() {
        $("#contAddFilm").hide();
        $("#container").show();
    });

    $('#btnSearchFilm').click(()=>{
        //chercherFilmsParCateg(14);
           chercherFilmsParTitre($('#inputTitre').val());
         // alert($(this).attr('value'));
          //alert($('#inputTitre').val());
     });
}
// function listerFParCateg(listFilms){

// 	var taille;

// 	var rep=`<div id="contListMembre" class="container mt-5">
//     <h1 class="h1 text-center">Liste des films</h2>
//     <div class="input-group mb-3">
//         <a id="btnAjouterFilm" class="btn btn-outline-success bg-gradient" onclick="ajouterForm();">Ajouter un film</a>        

    
//         <div class="input-group-prepend">
//             <span class="input-group-text" id="inputGroup-sizing-default">Titre</span>
//             </div>   

//             <form  action="./listerFilms.php" method="GET">
//             <input type="sumbit" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="titre" value="">
          
//             </form>
        

//     </div>

//         <table class="table table-striped table-hover table-borderless">
//             <thead class="table-success">             
//                 <th scope="col">ID</th>
//                 <th scope="col">titre</th>
//                 <th scope="col">duree</th>
//                 <th scope="col">langue</th>
//                 <th scope="col">date</th>
//                 <th scope="col">montant</th>
//                   <th scope="col">photo</th> 
//                   <th scope="col">Categorie</th> 
//                 <th scope="col">Actions

//                 </th>
//             </thead>  <tbody>`;
	

// 	taille=listFilms.length;
// 	for(var i=0; i<taille; i++){
// 		rep+=`  <tr>
// 		<td>${listFilms[i].idFilm}</td>
// 		<td>${listFilms[i].titre}</td>
// 		<td>${listFilms[i].duree}</td>
// 		<td>${listFilms[i].langue}</td>
// 		<td>${listFilms[i].date}</td>
// 		<td>${listFilms[i].montant}</td>
// 	 	<td>${listFilms[i].photo}</td>
// 		<td>
// 			<div class="btn-group">
				
// 				<form  action="" method="GET">
// 				<input type="hidden" name="idFilm" value="${listFilms[i].idFilm}">                
// 				<input id='btnModifierFilm' class="btn bg-gradient btn-outline-warning"  value="Update" onclick='showUpdate(${listFilms[i].idFilm})'>
// 				<input id='btnDeleteFilm' class="btn bg-gradient btn-outline-danger" onclick='deleteR(${listFilms[i].idFilm})' value="Delete">
// 				</form>
			  
				
// 			</div>
// 		</td>
// 	</tr>`;		 
// 	}
// 	rep+=`    
// </div>
// `;

//     $('#container').html(rep);
// }

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
		case "chercherCat":
        case "chercherParTitre" : 
            listerF(reponse.listeFilms);
            break;
		
		case "updateFilmShow" :
			updateFilmShow(reponse.film);
		    break;
        case "appendCategories" :
            appendCategories()
            break;
	}
}
	/*$('#messages').html(reponse.msg);
			setTimeout(function(){ $('#messages').html(""); }, 5000);*/