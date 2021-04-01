
<?php
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");

$query = $db->query("SELECT * FROM matelas");
$matelas = $query->fetchall();


include("/xampp/htdocs/Literie3000/tpl/header.php");
?>

<h1>Catalogue</h1>
<a href="http://localhost/literie3000/add_matelas.php">Rajouter un matelas</a>
<div class="matelas">
    <?php
    foreach ($matelas as $matela){
    ?>
    <div class="matela">
    <img src="<?=$matela["image"]?>" alt="">
    <h2>
        <a href="matela.php?id=<?=$matela["id"]?>"><?=$matela["nom"]?></a>
        <?= $matela["marque"]?>
    </h2>
    <p>taille : <?= $matela["taille"] ?></p>
    <p>prix : <?= $matela["prix"]?></p>
    
    </div>
    <?php
    }
    ?>
</div>

<?php
include("/xampp/htdocs/Literie3000/tpl/footer.php");
?>