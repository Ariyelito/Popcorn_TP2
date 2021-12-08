function appendCategories(){
    // ...
}
// manque photo categorie et realisateur
// to delete

//var movies;
function listerF(listFilms){
    //movies = listFilms;
	var taille;
	var rep=`
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
            <thead class="table-success text-center"> 
            <th scope="col">Poster</th>            
                <th scope="col">#</th>
                <th id="thTitre" scope="col">Titre</th>
                <th scope="col">Durée</th>
                <th id="thLangue" scope="col">Langue</th>
                <th id="thDate" scope="col">Date</th>
                <th scope="col">$</th>
                <th scope="col">Actions

                </th>
            </thead>  <tbody>`;
	

	taille=listFilms.length;
	for(var i=0; i<taille; i++){
		rep+=`  <tr>
        <td> <img src="${listFilms[i].photo}" class="card-img-top imgFilm" style="  width: 100px; height: 150px;" alt="poster officiel du film"></td>
        
		<td class="text-center">${listFilms[i].idFilm}</td>
		<td class="text-center">${listFilms[i].titre}</td>
		<td class="text-center">${listFilms[i].duree}</td>
		<td class="text-center">${listFilms[i].langue}</td>
		<td class="text-center">${listFilms[i].date}</td>
      
		<td class="text-center">${listFilms[i].montant}</td>
       
		<td>
			<div class="btn-group">
				
				<form  action="" method="GET">
				<input type="hidden" name="idFilm" value="${listFilms[i].idFilm}">       
                <input id='btnDetailsFilm' type="button" class="btn bg-gradient btn-outline-primary mb-2" value="Afficher les details">         
				<input id='btnModifierFilm' type="button" class="btn bg-gradient btn-outline-warning mb-2"  value="Mettre à jour" onclick='showUpdate(${listFilms[i].idFilm})'>
				<input id='btnDeleteFilm' type="button" class="btn bg-gradient btn-outline-danger" onclick='deleteR(${listFilms[i].idFilm})' value="Supprimer ce film">
               
				</form>
			  
				
			</div>
		</td>
	</tr>`;		 
	}

$('#containerListe').html(rep);

$('#btnAjouterFilm').on("click", function() {
    $("#contAddFilm").show();
    $("#containerListe").hide();
});

$('#btnAnnulerAddFilm').on("click", function() {
    $("#contAddFilm").hide();
    $("#containerListe").show();
});

$('#btnSearchFilm').click(()=>{
    //chercherFilmsParCateg(14);
        chercherFilmsParTitre($('#inputTitre').val());
        // alert($(this).attr('value'));
        //alert($('#inputTitre').val());
    });
    // $('#btnDeleteFilm').click(()=>{
    //     lister();
    //     });
 
}

function updateFilmShow(film){

    /*
    $("#containerListe").hide();
    $("#contEditFilm").show();
    //fonctionne pas 
    document.getElementById("inputTitle").value = "Test"
    $('#inputTitle').val(film.titre);
    $('#inputDate').val(film.titre);
    $('#inputCout').val(film.titre);
    $('#inputDuree').val(film.titre);
    $('#descriptionText').val(film.description);
    // a faire : check les box du film
    //$(inputCat).val(film.categories);
    
    $('#btnUpdateFilm').on("click", () => {
        updateR(film.idFilm);
    });
    */

	var rep = 
    `
    <h1 class="h1 text-center">Modifier un film</h1>
    <form id="formModifier" class="row">

        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="inputTitle" class="form-label">Titre :</label>
                <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="${film.titre}">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="inputDate" class="form-label" >Date de sortie :</label>
                <input type="date" class="form-control" id="inputDate" name="inputDate" value="${film.date}">
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="InputLangue" class="form-label">Langue :</label>
                <select class="form-control" id="InputLangue" name="langue">
                    <option value="1">Français</option>
                    <option value="2">Anglais</option>
                    <option value="3">Espagnol</option>                                 
                </select>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="inputCout" class="form-label">Coût :</label>
                <input type="text" class="form-control" id="inputCout" name="inputCout" value="${film.montant}">
            </div>
        </div>
        <label class="form-label mt-3">Catégorie :</label>
            <div id="categoriesBD" class="col-12">
                <!-- a remplir avec une fonction () -->
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="1" id="flexCheckDefault1">
                        <label class="form-check-label" for="flexCheckDefault1">
                            Comedy
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="2" id="flexCheckChecked2">
                        <label class="form-check-label" for="flexCheckChecked2">
                            Fantasy
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="3" id="flexCheckChecked3">
                        <label class="form-check-label" for="flexCheckChecked3">
                            Crime
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="4" id="flexCheckChecked4">
                        <label class="form-check-label" for="flexCheckChecked4">
                            Drama
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="5" id="flexCheckChecked5">
                        <label class="form-check-label" for="flexCheckChecked5">
                            Music
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="6" id="flexCheckChecked6">
                        <label class="form-check-label" for="flexCheckChecked6">
                            Adventure
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="7" id="flexCheckChecked7">
                        <label class="form-check-label" for="flexCheckChecked7">
                            History
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="8" id="flexCheckChecked8">
                        <label class="form-check-label" for="flexCheckChecked8">
                            Thriller
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="9" id="flexCheckChecked9">
                        <label class="form-check-label" for="flexCheckChecked9">
                            Animation
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="10" id="flexCheckChecked10">
                        <label class="form-check-label" for="flexCheckChecked10">
                            Family
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="11" id="flexCheckChecked11">
                        <label class="form-check-label" for="flexCheckChecked11">
                            Mystery
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="12" id="flexCheckChecked12">
                        <label class="form-check-label" for="flexCheckChecked12">
                            Biography
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="13" id="flexCheckChecked13">
                        <label class="form-check-label" for="flexCheckChecked13">
                            Action
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="14" id="flexCheckChecked14">
                        <label class="form-check-label" for="flexCheckChecked14">
                            Film-Noir
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="15" id="flexCheckChecked15">
                        <label class="form-check-label" for="flexCheckChecked15">
                            Romance
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="16" id="flexCheckChecked16">
                        <label class="form-check-label" for="flexCheckChecked16">
                            Sci-Fi
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="17" id="flexCheckChecked17">
                        <label class="form-check-label" for="flexCheckChecked17">
                            War
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="18" id="flexCheckChecked18">
                        <label class="form-check-label" for="flexCheckChecked18">
                            Western
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="19" id="flexCheckChecked19">
                        <label class="form-check-label" for="flexCheckChecked19">
                            Horror
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="20" id="flexCheckChecked20">
                        <label class="form-check-label" for="flexCheckChecked20">
                            Musical
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inputCat" value="21" id="flexCheckChecked21">
                        <label class="form-check-label" for="flexCheckChecked21">
                            Sport
                        </label>
                    </div>
                </div>
            </div>
        <div class="col-12 mt-3">
            <div class="form-group">
                <label for="addReal" class="form-label">Réalisateur :</label>
                <input type="text" class="form-control" id="addReal" name="addReal" value="" placeholder="Séparer plusieurs utilisateurs par des des virgules (,)">
            </div>
        </div>
        <div class="col-6 mt-3">
            <label for="formFile" class="form-label">Poster pour le film (image) :</label>
            <input class="form-control" type="file" id="formFile" value="${film.photo}">
        </div>
        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="inputDure" class="form-label">Durée :</label>
                <input type="number" class="form-control" id="inputDure" name="inputDure" value="${film.duree}">
            </div>
        </div>
        <div class="col-12 mt-3">
            <label for="descriptionText" class="form-label">Description du film :</label>
            <textarea id="descriptionText" name="descriptionText" class="form-control" rows="3">${film.description}</textarea>
        </div>
        <div class="col-12 mt-3">
            <label id="btnUpdateFilm" onclick='updateR(${film.idFilm})' class="btn btn-success bg-gradient">Modifier</label>

        </div>
       
    </form>
    <button id="btnAnnulerEditFilm" class="btn btn-danger bg-gradient mt-2">Annuler</button>
`
// <input type="hidden" id="idFilm" name="idFilm" value="${film.idFilm}"></input>

// show update form
$("#containerListe").hide();
$('#contEditFilm').html(rep);
$('#contEditFilm').show();
// button event
$('#btnAnnulerEditFilm').on("click", () => {
    $("#containerListe").show();
    $("#contEditFilm").hide();
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
    initialiser(msg);
}
function ajouterF(msg){
	alert(msg);
    initialiser(msg);
}

function updateF(msg){
	initialiser(msg);
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

	var action = reponse.action; 
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