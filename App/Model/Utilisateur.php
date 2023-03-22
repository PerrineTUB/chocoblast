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
            //$this->roles = new Roles('utilisateur');
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
        public function setNomUtilisateur($name):void{
            $this->nom_utilisateur = $name;
        }

        public function setPrenomUtilisateur($firstName):void{
            $this->prenom_utilisateur = $firstName;
        }

        public function setMailUtilisateur($mail):void{
            $this->mail_utilisateur = $mail;
        }

        public function setPasswordUtilisateur($pwd):void{
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

                //Préparer la requête
                $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur) VALUES (?,?,?,?);');

                //Bind les paramètres
                $req->bindParam(1, $nom, \PDO::PARAM_STR);
                $req->bindParam(2, $prenom, \PDO::PARAM_STR);
                $req->bindParam(3, $mail, \PDO::PARAM_STR);
                $req->bindParam(4, $password, \PDO::PARAM_STR);

                //Executer la requête
                $req->execute();
            }
            catch(\Exception $e){
                die('Erreur : ' . $e->getMessage());
            }
            

        }
        



    }

?>