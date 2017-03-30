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
        require_once("Modules/mod_Connexion/mod_Connexion.php");
        if (isset($_POST['jeton'])){
            $_SESSION['jeton_connexion']=$_POST['jeton'];
        }
        $module = new ModInscription();
        if(isset($_GET['categorie'])){
            if($_GET['categorie']=='client'){
                if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp'])){
                    $module->getControleur()->getModele()->InscrireClient($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp']);
                    $module = new ModConnexion();
                    $module->getControleur()->messageAccueil($_POST['mdp'],$_POST['nom']);
                }else{
                    $module->getControleur()->getClient();
                }
            }else{
                if(isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['mdp'])){
                    $module->getControleur()->getModele()->InscrireEntreprise($_POST['nom'],$_POST['pseudo'],$_POST['mdp']);
                    $module = new ModConnexion();
                    $module->getControleur()->messageAccueil($_POST['mdp'],$_POST['pseudo']);
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
                if(isset($_POST['mdp']) && isset($_POST['pseudo'])){
                    $module->getControleur()->messageAccueil($_POST['mdp'],$_POST['pseudo']);
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
        unset($_SESSION['idUtilisateur']);
        $nom_module="accueil";
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        $module->getControleur()->getVue()->tamponVersContenu();
        break;

    default :
        $nom_classe_module = "Mod".$nom_module."";
        require_once("Modules/mod_".$nom_module."/mod_".$nom_module.".php");
        $module = new $nom_classe_module();
        $module->getControleur()->getVue()->tamponVersContenu();

}

require_once("template.php");
?>