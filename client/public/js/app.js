// $('#btnAjouterFilm').click(()=>{
   
//     $("#contAddFilm").show();
//     $("#contListMembre").hide();
// });

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

// let validerMembre = () => {
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

// let initialiser = (id,msg) =>{
//     let textToast = document.getElementById("textToast");
//     var toastElList = [].slice.call(document.querySelectorAll('.toast'))
//     var toastList = toastElList.map(function (toastEl) {
//         return new bootstrap.Toast(toastEl)
//     })
//     if(id!==-1){
//         textToast.innerHTML = msg;
//         toastList[0].show();
//     }
// }

// /*
// $('#btnHome').click(()=>{
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
