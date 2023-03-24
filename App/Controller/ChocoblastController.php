<?php

namespace App\Controller;
use App\Utils\Fonctions;
use App\Model\Utilisateur;
use App\Model\Chocoblast;

class ChocoblastController extends Chocoblast{

    public function insertChocoblast():void{
        
        if(isset($_SESSION['connected'])){
            $user = new Utilisateur();
            $data = $user->getUserAll();
            $msg = "";
            if(isset($_POST['submit'])){
            $slogan = Fonctions::cleanInput($_POST['slogan_chocoblast']);
            $date = Fonctions::cleanInput($_POST['date_chocoblast']);
            $cible = Fonctions::cleanInput($_POST['cible_chocoblast']);
            $auteur = $_SESSION['id'];
                if(!empty($slogan) AND !empty($date) AND !empty($cible) AND !empty($auteur)){
                    $this->setSloganChocoblast($slogan);
                    $this->setDateChocoblast($date);
                    $this->getCibleChocoblast()->setIdUtilisateur($cible);
                    $this->getAuteurChocoblast()->setIdUtilisateur($auteur);
                    $this->addChocoblast();
                    $msg = "Le chocoblast'.$slogan.' à été ajouté en BDD";
                }
                else{
                    $msg = "Veuillez remplir tous les champs du formulaire.";
                }
            }
            include './App/Vue/viewAddChocoblast.php';
        } 
        else{
            header('Location : ./');
        }
    }

    public function showAllChocoblast(){
        $msg = "";
        $chocos = $this->getChocoblastAll();
        if($chocos){
            $msg = "Il n'y a rien.";
        }
        include './App/Vue/showAllChocoblast.php';
    }



}


?>