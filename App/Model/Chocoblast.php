<?php 

    namespace App\Model;
    use App\Model\Utilisateur;
    use App\Utils\BddConnect;

    class Chocoblast extends BddConnect{
        private ?int $id_chocoblast;
        private ?string $slogan_chocoblast;
        private ?string $date_chocoblast;
        private ?bool $statut_chocoblast;
        private ?Utilisateur $cible_chocoblast;
        private ?Utilisateur $auteur_chocoblast;
        
        //CONSTRUCTEUR
        public function __construct(){
            //Instancier deux objets utilisateurs
            $this->cible_chocoblast = new Utilisateur();
            $this->auteur_chocoblast = new Utilisateur();
            //Passer el statut à true
            $this->statut_chocoblast = true;
        }

        // GETTER
        public function getIdChocoblast():?int{
            return $this->id_chocoblast;
        }

        public function getSloganChocoblast():?string{
            return $this->slogan_chocoblast;
        }

        public function getDateChocoblast():?string{
            return $this->date_chocoblast;
        }

        public function getStatutChocoblast():?bool{
            return $this->statut_chocoblast;
        }

        public function getCibleChocoblast():Utilisateur{
            return $this->cible_chocoblast;
        }

        public function getAuteurChocoblast():Utilisateur{
            return $this->auteur_chocoblast;
        }

        

        //SETTER
        public function setIdchocoblast(?int $id):void{
            $this->id_chocoblast = $id;
        }
        public function setSloganChocoblast(?string $slogan):void{
            $this->slogan_chocoblast = $slogan;
        }

        public function setDateChocoblast(?string $date):void{
            $this->date_chocoblast = $date;
        }

        public function setStatutChocoblast(?bool $statut):void{
            $this->statut_chocoblast = $statut;
        }

        public function setCible(?Utilisateur $user):void{
            $this->cible_chocoblast = $user;
        }

        public function setAuteur(?Utilisateur $user):void{
            $this->auteur_chocoblast = $user;
        }

        //Méthode pour ajouter un chocoblast en BDD
        public function addChocoblast():void{
            try{
                //Récupérer les données
                $slogan = $this->getSloganChocoblast();
                $date = $this->getDateChocoblast();
                $statut = $this->getStatutChocoblast();
                $cible = $this->getCibleChocoblast()->getIdUtilisateur();
                $auteur =$this->getAuteurChocoblast()->getIdUtilisateur();


                //Préparer la requête
                $req = $this->connexion()->prepare('INSERT INTO chocoblast(
                    slogan_chocoblast, date_chocoblast, statut_chocoblast, cible_chocoblast, auteur_chocoblast) VALUES (?,?,?,?,?)');

                //Binder les paramètres
                $req->bindParam(1, $slogan, \PDO::PARAM_STR);
                $req->bindParam(2, $date, \PDO::PARAM_STR);
                $req->bindParam(3, $statut, \PDO::PARAM_BOOL);
                $req->bindParam(4, $cible, \PDO::PARAM_INT);
                $req->bindParam(5, $auteur, \PDO::PARAM_INT);

                //Executer la requête
                $req->execute();
            }
            catch(\Exception $e){
                die('Erreur : ' . $e->getMessage());
            }
        }

        public function getChocoblastAll():array{
            try{
                $req = $this->connexion()->prepare('SELECT id_chocoblast, slogan_chocoblast, date_chocoblast, cible_chocoblast, auteur_chocoblast FROM chocoblast');

                $req->execute();

                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            }
            catch(\Exception $e){
                die('Erreur : ' . $e->getMessage());
            }

        }

        //Méthode qui renvoie le slogan 
        public function __toString():string{
            return $this->slogan_chocoblast;
        }
    }
?>