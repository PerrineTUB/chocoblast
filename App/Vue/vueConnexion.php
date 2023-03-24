<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=form, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <?php include './App/Vue/vueMenu.php' ?>
    <div class="form">
        
        <h1>Connectez-vous</h1>
        <form action="" method="POST">
            <label for="mail_utilisateur">Saisir votre mail :</label>
            <input type="email" name="mail_utilisateur">

            <label for="password_utilisateur">Saisir votre mot de passe :</label>
            <input type="password" name="password_utilisateur">

            <input type="submit" name="submit" value="Connexion">
        </form>
    </div>
    <?php echo $msg ?>
</body>
</html>