<?php
namespace App\Controller;
use App\Utils\Fonctions;
use App\Model\Utilisateur;
use App\Model\Chocoblast;
use App\Model\Commentaire;

class CommentaireController extends Commentaire{

    public function insertCommentaire():void{
        if(isset($_SESSION['connected'])){
            $msg = "";
            if(isset($_POST['submit'])){
                $note = Fonctions::cleanInput($_POST['note_chocoblast']);
                $text = Fonctions::cleanInput($_POST['text_chocoblast']);
                $date = Fonctions::cleanInput($_POST['date_chocoblast']);

                $chocoblast = $_GET['id_chocoblast'];
                $auteur = $_SESSION['id'];
                
                if(!empty($note) AND !empty($text) AND !empty($date)){
                    $this->setNoteCommentaire($note);
                    $this->setTextCommentaire($text);
                    $this->setdateCommentaire($date);
                    $this->getChocoblastCommentaire()->setIdChocoblast($chocoblast);
                    $this->getAuteurCommentaire()->setIdUtilisateur($auteur);

                    $this->addCommentaire();
                }
                else {
                    $msg = "Veuillez remplir tous les champs du formulaire.";
                }
            }
        include './App/Vue/viewAddCommentaire.php';
        }
        else{
            header('Location: ./');
        }
    }
}

?>