<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Add Chocoblast</title>
</head>
<body>
    <!-- Import du menu -->
    <?php include './App/Vue/vueMenu.php'; ?>
    <div>
        <?php
        foreach($chocos as $value){
            echo'<div class ="choco">
            <h3>'.$value->slogan_chocoblast.'</h3>
            <p>'.$value->date_chocoblast.'</p>
            <p>'.$value->prenom_auteur.'</p>
            <p>'.$value->nom_auteur.'</p>
            <p>'.$value->prenom_cible.'</p>
            <p>'.$value->nom_cible.'</p>
            </div>';
        }
        ?>
    </div>
    
</body>
</html>