<?php
namespace App\Controller;
use App\Utils\Fonctions;
use App\Model\Commentaire;

class CommentaireController extends Commentaire{

    public function insertCommentaire():void{
        if(isset($_SESSION['connected'])){
            $msg = "";
            if(isset($_POST['submit'])){
                $note = Fonctions::cleanInput($_POST['note_commentaire']);
                $text = Fonctions::cleanInput($_POST['text_commentaire']);
                $date = Fonctions::cleanInput($_POST['date_commentaire']);
                $auteur = Fonctions::cleanInput($_SESSION['id']);
                $chocoblast = Fonctions::cleanInput($_GET['id_chocoblast']);
                /*

                */
                if(!empty($note) AND !empty($text) AND !empty($date) AND !empty($auteur) AND !empty($chocoblast)){
                    $this->setNoteCommentaire($note);
                    $this->setTextCommentaire($text);
                    $this->setdateCommentaire($date);
                    $this->getAuteurCommentaire()->setIdUtilisateur($auteur);
                    $this->getChocoblastCommentaire()->setIdChocoblast($chocoblast);

                    $this->addCommentaire();
                    $msg = "Le commentaire".$chocoblast." à bien été ajouté en BDD.";
                }
                else {
                    $msg = "Veuillez remplir tous les champs du formulaire.";
                    echo '<script>
                            setTimeout(()=>{
                                modal.style.display = "block";
                            }, 500);
                        </script>';
                }
            }
        include './App/Vue/viewAddCommentaire.php';
        }
        else{
            header('Location: ./chocoblastAll');
        }
    }
}

?>