<?php

    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;

    class Utilisateur {
        private $id_utilisateur;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private $password_utilisateur;
        private $image_utilisateur;
        private $statut_utilisateur;
        private $roles;

        public function __construct(){
            $this->roles = new Roles('utilisateur');
        }
    }

?>