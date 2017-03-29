<?php
session_start();
require_once('Include/controleur_generique.php');
require_once('Include/modele_generique.php');
require_once('Include/module_generique.php');
require_once('Include/vue_generique.php');
$modele = new modeleGenerique();
if(isset($_GET['action'])){
    $nom_module= $_GET['action'];
}
else {
    $nom_module="accueil";
}
switch($nom_module) {
    case "Inscription":
        $nom_module = "Inscription";
        require_once("Modules/mod_Inscription/mod_Inscription.php");
        /*require_once("Modules/mod_Connexion/mod_Connexion.php");*/
        $module = new ModInscription();
        if(isset($_GET['categorie'])){
            if($_GET['categorie']=='client'){
                if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp'])){
                    $module->getControleur()->getModele()->InscrireClient($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp']);
                }else{
                    $module->getControleur()->getClient();
                }
            }else{
                if(isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['mdp'])){
                    $module->getControleur()->getModele()->InscrireEntreprise($_POST['nom'],$_POST['pseudo'],$_POST['mdp']);
                }else{
                    $module->getControleur()->getEntreprise();
                }
            }
        }
        else{
            echo "ERREUR: lien introuvable";
        }
        $module->getControleur()->getVue()->tamponVersContenu();
        break;


    case "Connexion":
        $nom_module = "Connexion";
        require_once("Modules/mod_Connexion/mod_Connexion.php");
        if (isset($_POST['jeton'])){
            $_SESSION['jeton_connexion']=$_POST['jeton'];
        }
        $module = new ModConnexion();
        if(isset($_SESSION['jeton_connexion'])){
            $module->getControleur()->getModele()->deleteToken($_SESSION['jeton_connexion']);
            $verifJet = $module->getControleur()->getModele()->getToken($_SESSION['jeton_connexion']);
            $module->getControleur()->getModele()->deleteTokenNonValides();
            if($verifJet == ""){
                if(isset($_POST['mdpConn']) && isset($_POST['pseudoConn'])){
                    $module->getControleur()->getModele()->Connexion($_POST['mdpConn'],$_POST['pseudoConn']);
                    if(isset($_SESSION['id'])){
                        header('Location: index.php');
                        exit();
                    }
                }
            }
            else{
                echo "ERREUR: délais du jeton expiré";
            }
        }
        $module->getControleur()->getVue()->tamponVersContenu();
        unset($_SESSION['jeton_connexion']);
        break;


    case "Deconnexion":
        unset($_SESSION['id']);
        unset($_SESSION['survivant']);
        unset($_SESSION['id_ville']);
        unset($_SESSION['infosPerso']);
        unset($_SESSION['Position']);
        header('Location: index.php');
        exit();
        break;

    case "Forum":
        $nom_module = "forum";
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        if(isset($_GET['choix'])) {
            $module->getControleur()->Choix($_GET['choix']);

        }
        elseif(!isset($_GET['sujet'])){
            $module->getControleur()->messageAccueil();
        }
        else{
            $module->getControleur()->afficheSujet($_GET['sujet']);
        }
        $module->getControleur()->getVue()->tamponVersContenu();
        break;


    case "FAQ":
        echo'non implementer';
        break;

    case "Banque":
        $nom_module = "Banque";
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        $module->getControleur()->getVue()->tamponVersContenu();
        break;


    case "Puit":
        unset($_SESSION['servi']);
        $nom_module = "Puit";
        require_once("Modules/mod_Puit/mod_Puit.php");
        $module = new ModPuit();
        if(isset($_POST['servi']) && $_POST['servi'] == 1){
            $_SESSION['servi']=1;
            $module -> getControleur()->getModele()->setRessourcePuit();

        }
        $module -> getControleur()->affiche();
        $module -> getControleur()->getVue()->tamponVersContenu();

        break;

    case "Ville":
        $nom_module = "ville";
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        if($_SESSION['id']!= NULL){
            if($_SESSION['survivant']==false){
                $module->getControleur()->messageVille();
            }else{
                $module->getControleur()->MaVille();
            }
        }else{
            $message = 'Vous n\'êtes pas connecté';
            $module->getControleur()->getVue()->vue_erreur($message);
        }
        $module->getControleur()->getVue()->tamponVersContenu();
        break;

    case "Join":
        if(isset($_GET['id_ville'])){
            $nom_module = "perso";
            $nom_classe_module = "Mod".$nom_module."";
            require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
            $module = new $nom_classe_module();
            $module->getControleur()->getModele()->JoinVille($_GET['id_ville']);
        }
        break;

    case "Citoyen":
        $nom_module = "citoyen";
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        $module->getControleur()->ListeCitoyen();
        $module->getControleur()->getVue()->tamponVersContenu();
        break;

    case "Porte":
        $nom_module = "Porte";
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        if(isset($_POST['sortir'])){
            $module->getControleur()->getModele()->Sortir();
            $info = $module->getControleur()->getModele()->infoCase();
            $module->getControleur()->getVue()->randonne($info);
        }elseif(isset($_POST['entrer'])){
            $module->getControleur()->getModele()->Entrer();
            $msg=$module->getControleur()->getModele()->afficheEnviron();
            $module->getControleur()->getVue()->affiche($msg);
        }else{
            if(isset($_POST['direction'])){
                $module->getControleur()->getModele()->Bouger($_POST['direction']);
            }
            $msg=$module->getControleur()->getModele()->afficheEnviron();
            $module->getControleur()->getVue()->affiche($msg);
        }
        $module->getControleur()->getVue()->tamponVersContenu();
        break;

    case "Chantier":
        $nom_module = "Chantier";
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        break;

    case "Zombie":
        $nom_module = "Zombie";
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        break;

    default :
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        $module->getControleur()->getVue()->tamponVersContenu();

}

require_once("template.php");
?>
