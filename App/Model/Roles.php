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

        public function setIdRoles($id){
            $this->id_roles = $id;
        }

        public function setNomRoles($name):void{
            $this->nom_roles = $name;
        }

        public function addRoles():void{
            try{
            $roles = $this->nom_roles;

            $req = $this->connexion()->prepare('INSERT INTO roles(nom_roles) VALUES (?)');

            $req->bindParam(1, $roles, \PDO::PARAM_STR);

            $req->execute();

            } 
            catch(\Exception $e){
                    die('Erreur : ' . $e->getMessage());
            }
        }

        public function getRolesByName(){
            try{
                $nom = $this->nom_roles;

                $req = $this->connexion()->prepare('SELECT id_roles, nom_roles FROM roles
                WHERE nom_roles = ?');
                $req->bindParam(1, $nom, \PDO::PARAM_STR);

                $req->execute();

                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;

            }catch(\Exception $e){
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
?>