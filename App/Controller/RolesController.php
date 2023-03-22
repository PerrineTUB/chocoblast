<?php

    namespace App\Controller;

    use App\Model\Roles;
    use App\Utils\Fonctions;

    class RolesController extends Roles{
        public function insertRoles(){
            $msg = "";

            if(isset($_POST['submit'])){
                $roles = Fonctions::cleanInput($_POST['nom_roles']);

                if(!empty($roles)){
                    $this->setNomRoles($roles);

                    $this->addRoles();

                }
            }
            include './App/Vue/viewAddRoles.php';
        }
    }

?>