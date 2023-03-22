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
                    
                    //Récupérer le mail dans un objet
                    $this->setMailUtilisateur($mail); 

                    //Tester si le compte existe déjà
                    if($this->getUserByMail()){
                        $msg = "L'identifiant ou le mot de passe sont incorrects";
                    } else {
                        //$user = new Utilisateur();

                    //Hash du mot de passe
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    /* Instance d'un objet 
                    $user->setNomUtilisateur($nom);
                    $user->setPrenomUtilisateur($prenom);
                    $user->setMailUtilisateur($mail);
                    $user->setPasswordUtilisateur($password);
                    var_dump($user);
                    $user->addUser();
                    */

                    //$this correspond à UserController et Utilisateur en utilisant les getter et les setter puisque les attribut dans la classe User sont en private
                    $this->setNomUtilisateur($nom);
                    $this->setPrenomUtilisateur($prenom);
                    $this->setPasswordUtilisateur($password);

                    //var_dump($this);
                    $this->addUser();
                    $msg = "<br>Le compte : ".$mail." a été ajouté en BDD.";
                    }
                } else {
                    $msg = "Veuillez remplir tous les champs du formulaire";
                }
            }
            //Importer la vue
            include './App/Vue/viewAddUser.php';
        }

    }

?>