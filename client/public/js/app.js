// $('#btnAnnulerAddFilm').click(()=>{
//     $("#contAddFilm").hide();
//     $("#contListMembre").show();
// });

// let valider = () => {
//     let etat = true;

//     let email = document.querySelector('#email').value;
     
//     let mdp = document.querySelector('#mdp').value;

//     if (email === '' || mdp === '') {
//         etat = false;
//         alert("Vous devez remplir le formulaire!");
//     }

//     return etat;
// }

// function validerMembre (){
//     let etat = true;

//     let nom = document.querySelector('#inputNom').value;
//     let prenom = document.querySelector('#inputPrenom').value;

//     let email = document.querySelectorAll('#email').value;

//     let mdp = document.querySelector('#inputPassword').value;
//     let mdp2 = document.querySelector('#inputPassword2').value;
//     let rbs = document.querySelectorAll('input[name="inputSexe"]');
//     let selectedValue;
//     for (const rb of rbs) {
//         if (rb.checked) {
//             selectedValue = rb.value;
//             break;
//         }
//     }

//     if (nom === '' || email === '' || mdp === '' || mdp2 === '' || prenom === '' || !selectedValue) {
//         etat = false;
//         alert("Vous devez remplir le formulaire!");
//     }
//     if (mdp != mdp2) {
//         etat = false;
//         alert("Les deux mots de passe ne correspondent pas ");
//     }

//     return etat;

// }

function initialiser (msg) {
    $('#toast').show();
    let textToast = document.getElementById("textToast");
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
  
    textToast.innerHTML = msg;
    toastList[0].show();
    setTimeout(()=>{
        $('#toast').hide();
    }, 5000)
}


// /*
// $('.btnHome').click(()=>{
//     $("#contLogIn").hide();
//     $("#contCards").show();
//     $("#contRegister").hide();
// });

// $('#btnLogIn').click(()=>{
//     $("#contLogIn").show();
//     $("#contCards").hide();
//     $("#contRegister").hide();
// });

// $('#btnReg').click(()=>{
    
//     $("#contLogIn").hide();
//     $("#contCards").hide();
//     $("#contRegister").show();
   
// });
// $("#inputNbJour").change(function (e) { 
   
//     alert("oui");
// });


// $('#btnAdmin').click(()=>{
//     $("#contAddFilm").hide();
//    // window.location.href = "index.php";
// });

// $('#btnLister').click(()=>{
//     //alert("click");
 
//      $('#formLister').submit();
//  });

 
// */

$(document).ready(function () {
    // acueil est la liste des films
    lister();
    $('.btnHome').click(()=>{
        $("#contAddFilm").hide();
        $("#contEditFilm").hide();
        $("#containerListe").show();
    });
   
    
  
    $('btnDeleteFilm').click(() => {
        //confirm('Are you sure want to delete this record?')
    })
// tous le code jquery() dans cette instruction sinon ca va pas marcher
   

    // $('#btnModifierFilm').click(()=>{
    
    //     $(this).toggle();
    // });
  
    

});



/*
function update(idFilm){
 
    var rep = 
    `
    <h1 class="h1 text-center">Modifier un film</h1>
    <form id="formRegister" class="row" onSubmit="return validerFilm()">

        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="inputTitre" class="form-label">Titre :</label>
                <input type="text" class="form-control" id="inputTitre" name="inputTitre" value="">
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
                <input type="date" class="form-control" id="inputDate" name="inputDate">
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
                <input type="text" class="form-control" id="inputCout" name="inputCout">
            </div>
        </div>

        <div class="col-6 col-sm-4 mt-3">
            <div class="form-group">
                <label for="inputDure">Durée :</label>
                <input type="text" class="form-control" id="inputDure" name="inputDure">
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
            <textarea id="descriptionText" name="descriptionText" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-12 mt-3">
            <button id="btnUpdateFilm" onclick='updateR(${idFilm})' class="btn btn-success bg-gradient">Modifier</button>

        </div>
    </form>
    <button id="btnAnnulerAddFilm" class="btn btn-danger bg-gradient mt-2">Annuler</button>
`

$("#container").html(rep);
}*/