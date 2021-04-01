<?php

if (!empty($_post)){
    $nom = trim(strip_tags($_POST["nom"]));
    $marque = trim(strip_tags($_POST["marque"]));
    $taille = trim(strip_tags($_POST["taille"]));
    $prix = trim(strip_tags($_POST["prix"]));

    $errors = [];

    if (empty($nom)){
        $errors["nom"] = "Le nom du matelas est obligatoire";
    }

    if(empty($errors)){
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "");

        $query = $db->prepare("INSERT INTO matelas (nom, marque, taille, prix) VALUES (:nom, :marque, :taille, :prix)");
        $query->bindParam(":nom", $nom);
        $query->bindParam(":marque", $marque);
        $query->bindParam(":taille", $taille);
        $query->bindParam("prix", $prix);
        if ($query->execute()){
            header("location: index.php");
        }
    }
}
include("tpl/header.php")
?>
<h1>Ajouter un matelas </h1>

<form action="" method="post">
    <div class="form-group">
        <label for="inputNom">Nom du matelas</label>
        <input type="text" name="nom" id="inputNom" value="<?= isset($name) ? $name :""?>">
        if (isset($errors["nom"])){
        echo "<span class=\"info-error\">{$errors["nom"]}</span>
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputMarque">Marque du matelas :</label>
        <input type="text" name="marque" id="inputMarque" value="<?= isset($marque) ? $marque :""?>">
    </div>

    <div class="form-group">
        <label for="inputTaille">Taille du matelas</label>
        <input type="text" name="taille" id="inputTaille" value="<?= isset($taille) ? $taille:""?>">
    </div>

    <div class="form-group">
        <label for="inputPrix">Prix du Matelas :</label>
        <input type="text" name="prix" id="inputPrix" value="<?= isset($prix) ? $prix:""?>">
    </div>

    <input class="btn-literie3000" type="submit" value="Ajouter le matelas">
</form>
<?php
include("tpl/footer.php")
?>