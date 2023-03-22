<?php

    namespace App\Model;
    use App\Utils\BddConnect;

    class Roles extends BddConnect{
        private $id_roles;
        private $nom_roles;

        public function __construct(){
            
        }
        
        public function getIdRoles():?int{
            return $this->id_roles;
        }

        public function getNomRoles():?string{
            return $this->nom_roles;
        }

        public function setNomRoles($name):void{
            $this->nom_roles = $name;
        }

        public function addRoles(){
            try{
            $role = $this->nom_roles;

            $req = $this->connexion()->prepare('INSERT INTO roles(nom_roles) VALUES (?)');

            $req->bindParam(1, $role, \PDO::PARAM_STR);

            $req->execute();

            } 
            catch(\Exception $e){
                    die('Erreur : ' . $e->getMessage());
            }
        }
    }
?>