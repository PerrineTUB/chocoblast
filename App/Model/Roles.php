<?php

    namespace App\Model;
    use App\Utils\BddConnect;
    
    class Roles extends BddConnect{
        private $id_roles;
        private $nom_roles;

        public function __construct($name){
            $this->id_roles = 1;
            $this->nom_roles = $name;
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
    }
?>