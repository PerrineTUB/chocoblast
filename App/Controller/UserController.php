<?php
//Gérer toute la logique, appel aux fonctions pour ajouter en BDD
    //Ou se situe le projet 
    namespace App\controller;

    //Ou se situe la classe utilisateur et la classe fonctions
    use App\Model\Utilisateur;
    use App\Utils\Fonctions;

    class UserController extends Utilisateur{
        //Fonction qui va gérer l'ajout d'un utilisateur en BDD
        public function insertUser(){
            // Variable pour stocker des messages d'erreur
            $msg = ""; 
            //Tester si le bouton est cliqué
            if(isset($_POST['submit'])){
                $nom = Fonctions::cleanInput($_POST['nom_utilisateur']);
                $prenom = Fonctions::cleanInput($_POST['prenom_utilisateur']);
                $mail = Fonctions::cleanInput($_POST['mail_utilisateur']);
                $password = Fonctions::cleanInput($_POST['password_utilisateur']);
                //Tester si les champs sont remplis
                if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND !empty($password)){
                    //Hash du mot de passe
                    $password = password_hash($password, PASSWORD_DEFAULT);
                } else {
                    $msg = "Veuillez remplir tous les champs du formulaire";
                }
            }
            //Importer la vue
            include './App/Vue/viewAddUser.php';
        }

    }

?>