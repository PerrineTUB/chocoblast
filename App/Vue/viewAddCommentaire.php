<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Ajouter un commentaire</title>
</head>
<body>
    <?php include './App/Vue/viewMenu.php'?>
    <section class="formContainer">
        <h3>Ajouter un commentaire :</h3>
        <form action="" method="post">
            <label for="note_chocoblast">Donner la note: </label>
            <input type="text" name="note_chocoblast">

            <label for="text_chocoblast">Contenu du commentaire :</label>
            <input type="text" name="text_chocoblast">

            <label for="date_chocoblast">Sélectionner la date :</label>
            <input type="date" name="date_chocoblast">

            <input type="submit" value="Ajouter" name="submit">
        </form>
    </section>
</body>
</html>