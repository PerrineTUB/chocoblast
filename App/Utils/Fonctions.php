<?php
    namespace App\Utils;
    class Fonctions {

        //Nettoyage des données entrées dans les formulaires
        public static function  cleanInput($value){
            return htmlspecialchars(strip_tags(trim($value)));
        }
    }

?>