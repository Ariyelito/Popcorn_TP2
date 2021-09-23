<?php
$title = "Membre";
include '../../includes/header-m.php';

?>


<?php
echo '<h2 style="text-align:center;color:blue;">LISTE DES MEMBRES</h2>';

define("FICHIER_MEMBRES", "../data/membres.txt");
define("FICHIER_CONNEXION", "../data/connection.txt");

    $tabInfos = array();  
    
    if(($ficMembres=fopen(FICHIER_MEMBRES,"r"))===null || ($ficConnexion=fopen(FICHIER_CONNEXION,"r"))===null){
        echo "<p>Nous avons un problème pour créer/ouvrir les fichiers</p>";
        exit;
    }

    function infosConnexion($courriel){
        global $ficConnexion;
        $ligne = fgets($ficConnexion);  
        while(!feof($ficConnexion)){
            $tab = explode(";", $ligne);
            if($courriel === $tab[0]){
                $infos = $tab[2].";".$tab[3];
                return $infos;
            }else{
                $ligne = fgets($ficConnexion);
            }
        }
        
        return ""; 
    }

    function detailInfos($tab2){
        
        $statut=$role=null;
        switch((int)$tab2[0]){
            case 0 : $statut = "Inactif";
            break;
            case 1 : $statut = "Actif";
            break;
        }
        $tab2[0] = $statut;

        switch(trim($tab2[1])){
            case "M" : $role = "Membre";
            break;
            case "A" : $role = "Administrateur";
            break;
            case "E" : $role = "Employé";
            break;
        }
        $tab2[1] = $role;
        return $tab2;
    }

   
    function obtenirTableauInfosMembres(){
        global $tabInfos, $ficMembres, $ficConnexion;
        $ligne = fgets($ficMembres);  
        while(!feof($ficMembres)){
            $tab = explode(";", $ligne); 
            $infos = infosConnexion(trim($tab[2])); 
            $tab = [$tab[0],$tab[1],$tab[2]] ;
            $tab2 = explode(";",$infos);
            $tab2 = detailInfos($tab2);
           
            $tab = array_merge($tab,$tab2); 
           
            $tabInfos[]=$tab;
            $ligne = fgets($ficMembres);
           
        }

        fclose($ficMembres);
        fclose($ficConnexion);
    }

function retournerTableauHTMLMembres(){
    global $tabInfos;
    obtenirTableauInfosMembres();
   
    $rep = '<table class="table table-striped">';
    $rep .='<thead><tr><th scope="col">Prénom</th> <th scope="col">Nom</th>';
    $rep .='<th scope="col">Courriel</th> <th scope="col">Statut</th>';
    $rep .='<th scope="col">Rôle</th> </tr></thead>';    
   
    $rep .= "<tbody>";
    foreach ($tabInfos as $unMembre) {
        $rep.="<tr>";
        foreach ($unMembre as $valeur){
            $rep.="<td >".$valeur."</td>";
        }
        $rep.="</tr>";
    }
    unset($tabInfos); 
    $rep.="</tbody></table>";
    echo $rep;
}
retournerTableauHTMLMembres();
?>
<?php include '../../includes/footer.php' ?>

