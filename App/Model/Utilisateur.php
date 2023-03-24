<?php

    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;

    class Utilisateur extends BddConnect{
        private ?int  $id_utilisateur;
        private ?string $nom_utilisateur;
        private ?string $prenom_utilisateur;
        private ?string $mail_utilisateur;
        private ?string $password_utilisateur;
        private ?string $image_utilisateur;
        private ?bool $statut_utilisateur;
        private ?Roles $roles;

        // CONSTRUCTEUR
        public function __construct(){
            //Instancier un objet roles quand on va créer un utilisateur. Vérrouiller le role sur utilisateur. Ils seront toujours utilisateurs. 
            $this->roles = new Roles();
            $this->roles->setIdRoles(1);
        }

        // GETTER
        public function getIdUtilisateur():?int{
            return $this->id_utilisateur;
        }

        public function getNomUtilisateur():?string{
            return $this->nom_utilisateur;
        }

        public function getPrenomUtilisateur():?string{
            return $this->prenom_utilisateur;
        }

        public function getMailUtilisateur():?string{
            return $this->mail_utilisateur;
        }

        public function getPasswordUtilisateur():?string{
            return $this->password_utilisateur;
        }

        // SETTER

        public function setIdUtilisateur(?int $id):void{
            $this->id_utilisateur = $id;
        }
        public function setNomUtilisateur(?string $name):void{
            $this->nom_utilisateur = $name;
        }

        public function setPrenomUtilisateur(?string $firstName):void{
            $this->prenom_utilisateur = $firstName;
        }

        public function setMailUtilisateur(?string $mail):void{
            $this->mail_utilisateur = $mail;
        }

        public function setPasswordUtilisateur(?string $pwd):void{
            $this->password_utilisateur = $pwd;
        }

        // Methode pour ajouter un utilisateur en BDD

        public function addUser():void{
            try{
                // Récupérer les données
                $nom = $this->nom_utilisateur;
                $prenom = $this->prenom_utilisateur;
                $mail = $this->mail_utilisateur;
                $password = $this->password_utilisateur;
                $id= $this->roles->getIdRoles();

                //Préparer la requête
                $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, id_roles) VALUES (?,?,?,?,?)');

                //Bind les paramètres
                $req->bindParam(1, $nom, \PDO::PARAM_STR);
                $req->bindParam(2, $prenom, \PDO::PARAM_STR);
                $req->bindParam(3, $mail, \PDO::PARAM_STR);
                $req->bindParam(4, $password, \PDO::PARAM_STR);
                $req->bindParam(5, $id, \PDO::PARAM_INT);

                //Executer la requête
                $req->execute();
            }
            catch(\Exception $e){
                die('Erreur : ' . $e->getMessage());
            }
        }

        //Méthode pour récupérer un utilisateur avec son mail
        public function getUserByMail():?array{
            try{
                $mail = $this->mail_utilisateur;

                $req = $this->connexion()->prepare ('SELECT id_utilisateur,nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, image_utilisateur, statut_utilisateur, id_roles FROM utilisateur WHERE mail_utilisateur = ?');

                $req->bindParam(1, $mail, \PDO::PARAM_STR);

                $req->execute();

                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            }
            //Anti-slash avant Execption car je veux utiliser une classe qui est à l'extérieur de ce fichier comme au dessus avec PDO
            catch (\Exception $e){
                die('Erreur : ' . $e->getMessage());
            }
            
            
        }

        //Méthode qui retourne tous les utilisateurs
        public function getUserAll():array{
            try{
                $req = $this->connexion()->prepare('SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, mail_utilisateur, image_utilisateur FROM utilisateur');

                $req->execute();

                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            }
            catch (\Exception $e){
                die('Erreur : ' . $e->getMessage());
            }
        }

        public function __toString():string{
            return $this->nom_utilisateur;
        }

        



    }

?>