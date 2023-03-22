<?php
    //Il y a des include parce que ce n'est pas une classe
    //Importer les ressources 
    use App\controller\UserController;
    use App\controller\RolesController;
    include './App/Utils/BddConnect.php';
    include './App/Utils/Fonctions.php';
    include './App/Model/Roles.php';
    include './App/Controller/RolesController.php';
    include './App/Model/Utilisateur.php';
    include './App/Controller/UserController.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);

    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

    //instance des controllers
    $userController = new UserController();
    $rolesController = new RolesController();

    //routeur
    switch ($path) {
        case '/chocoblast/':
            include './App/Vue/home.php';
            break;
        case '/chocoblast/userAdd':
            $userController->insertUser();
            break;
        case '/chocoblast/rolesAdd':
            $rolesController->addRoles();
            break;
        default:
            include './App/Vue/error.php';
            break;
    }
?>