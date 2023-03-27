<?php
    //Démarrage de la session
    session_start();
    //Importer les ressources
    use App\Controller\UserController;
    use App\Controller\RolesController;
    use App\Controller\ChocoblastController;
    use App\Controller\CommentaireController;

    include './App/Utils/BddConnect.php';
    include './App/Utils/Fonctions.php';
    include './App/Model/Roles.php';
    include './App/Controller/RolesController.php';
    include './App/Model/Utilisateur.php';
    include './App/Controller/UserController.php';
    include './App/Model/Chocoblast.php';
    include './App/Controller/ChocoblastController.php';
    include './App/Model/Commentaire.php';
    include './App/Controller/CommentaireController.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //instance des controllers
    $userController = new UserController();
    $rolesController = new RolesController();
    $chocoblastController = new ChocoblastController();
    $commentaireController = new CommentaireController();
    //routeur connecte
    if(isset($_SESSION['connected'])){
        switch ($path) {
            case '/chocoblast/':
                include './App/Vue/home.php';
                break;
            case '/chocoblast/rolesAdd':
                $rolesController->insertRoles();
                break;
            case '/chocoblast/chocoblastAdd':
                $chocoblastController->insertChocoblast();
                break;
            case '/chocoblast/chocoblastAll':
                $chocoblastController->showAllChocoblast();
                break;
            case '/chocoblast/chocoblastDelete':
                $chocoblastController->deleteChocoblastById();
                break;
            case '/chocoblast/chocoblastUpdate':
                $chocoblastController->updateChocoblastById();
                break;
            case '/chocoblast/deconnexion':
                $userController->deconnexionUser();
                break;
            case'/chocoblast/commentaireAdd':
                $commentaireController->insertCommentaire();
                break;
            default:
                include './App/Vue/error.php';
                break;
            }
    }
    //routeur no connecté
    else{
        switch ($path) {
            case '/chocoblast/':
                include './App/Vue/home.php';
                break;
            case '/chocoblast/userAdd':
                $userController->insertUser();
                break;
            case '/chocoblast/chocoblastAll':
                $chocoblastController->showAllChocoblast();
                break;
            case '/chocoblast/chocoblastDelete':
                header('Location: ./chocoblastAll');
                break;
            case '/chocoblast/chocoblastUpdate':
                header('Location: ./chocoblastAll');
                break;
            case '/chocoblast/connexion':
                $userController->connexionUser();
                break;
            default:
                include './App/Vue/error.php';
                break;
        }
    }
?>