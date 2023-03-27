<?php
namespace App\Model;
//import des classes
use App\Utils\BddConnect;
use App\Model\Chocoblast;
use App\Model\Utilisateur;
    class Commentaire extends BddConnect{
        /*-------------------------------
                    Attributs
        -------------------------------*/
        private ?int $id_commentaire;
        private ?int $note_commentaire;
        private ?string $text_commentaire;
        private ?string $date_commentaire;
        private ?bool $statut_commentaire;
        private ?Chocoblast $id_chocoblast;
        private ?Utilisateur $auteur_commentaire;
        /*-------------------------------
                    Constructeur
        -------------------------------*/
        public function __construct(){
            $this->id_chocoblast = new Chocoblast();
            $this->auteur_commentaire = new Utilisateur();
            $this->statut_commentaire = true;
        }
        /*-------------------------------
                Getter et Setter
        --------------------------------*/
        public function getIdCommentaire():?int{
            return $this->id_commentaire;
        }
        public function getNoteCommentaire():?int{
            return $this->note_commentaire;
        }
        public function getTextCommentaire():?string{
            return $this->text_commentaire;
        }
        public function getDateCommentaire():?string{
            return $this->date_commentaire;
        }
        public function getStatutCommentaire():?bool{
            return $this->statut_commentaire;
        }
        public function getChocoblastCommentaire():?Chocoblast{
            return $this->id_chocoblast;
        }
        public function getAuteurCommentaire():?Utilisateur{
            return $this->auteur_commentaire;
        }
        public function setIdCommentaire(?int $id):void{
            $this->id_commentaire = $id;
        }
        public function setNoteCommentaire(?int $note):void{
            $this->note_commentaire = $note;
        }
        public function setTextCommentaire(?string $text):void{
            $this->text_commentaire = $text;
        }
        public function setDateCommentaire(?string $date):void{
            $this->date_commentaire = $date;
        }
        public function setStatutCommentaire(?bool $statut):void{
            $this->statut_commentaire = $statut;
        }
        public function setChocoblastCommentaire(?Chocoblast $choco):void{
            $this->id_chocoblast = $choco;
        }
        public function setAuteurCommentaire(?Utilisateur $auteur):void{
            $this->auteur_commentaire = $auteur;
        }
        /*-------------------------------
                    Méthodes
        --------------------------------*/
        public function addCommentaire():void{
            try{
                //Récupérer l'élément soit par le getter soit par l'attribut. Même si les attributs sont en private c'est possible de les récupérer puisqu'on est dans la classe.
                $note = $this->getNoteCommentaire();
                $text = $this->text_commentaire;
                $date = $this->getDateCommentaire();
                $statut = $this->getStatutCommentaire();
                $chocoblast = $this->getChocoblastCommentaire()->getIdChocoblast();
                $auteur = $this->auteur_commentaire->getIdUtilisateur();

                $req =$this->connexion()->prepare('INSERT INTO commentaire(note_commentaire, text_commentaire, date_commentaire, statut_commentaire, id_chocoblast, auteur_commentaire) VALUES (?,?,?,?,?,?)');

                $req->bindParam(1,$note, \PDO::PARAM_INT);
                $req->bindParam(2,$text, \PDO::PARAM_STR);
                $req->bindParam(3,$date, \PDO::PARAM_STR);
                $req->bindParam(4,$statut, \PDO::PARAM_BOOL);
                $req->bindParam(5,$chocoblast, \PDO::PARAM_INT);
                $req->bindParam(6,$auteur, \PDO::PARAM_INT);

                $req->execute();
            }
            catch (\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>