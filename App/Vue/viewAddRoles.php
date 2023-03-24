<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <?php
    include './App/Vue/vueMenu.php';
    ?>
    <div class="form">
        <h1>Ajouter un rôle</h1>
        <form action="" method="POST">
            <label for="nom_roles">Saisir un rôle :</label>
            <input type="text" name="nom_roles">
            <input type="submit" value="Ajouter" name="submit">
        </form>
    </div>
    <div id="error"><?php echo $msg; ?></div>
</body>
</html>