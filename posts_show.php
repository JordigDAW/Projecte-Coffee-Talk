<?php
//Activem la gestió de sessions
session_start();
$loggedUser = $_SESSION["user"] ?? "";
//Si l'usuari no ha iniciat sessió l'enviem a la pàgina de login
if (empty($loggedUser)) {
    header("Location: login.php");
}

//Obtencio de l'id enviada pel query string
$id = $_GET["id"];

//Implementacio de la consulta
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Implementacio de la consulta amb la base de dades
<<<<<<< HEAD
$stmt = $pdo->prepare("SELECT * FROM article INNER JOIN categoria on article.codcat = categoria.codcat INNER JOIN usuari on article.codusu = usuari.codusu WHERE codart = :id");
=======
$stmt = $pdo->prepare("SELECT * FROM article INNER JOIN categoria ON
 article.codcat=categoria.codcat INNER JOIN usuari ON article.codusu=usuari.codusu WHERE codart=:codi");
>>>>>>> 2bc8a54305a99084fb694a654d118cce662db563

$stmt->bindValue("codi", $id);

$stmt->execute();

$article = $stmt->fetch();

//Comprovacio per veure que s'ha recorregut l'array i per veure els valors que aquesta conte
//var_dump($article);

?>

<html>

<head>
    <title>Coffee Talk Blog</title>
</head>

<body>
    <h1>Welcome to Coffee Talk Blog</h1>

    <!--Comprovacio per veure que l'article existeix-->
    <?php if (empty($article)) {?>
        <p>No s'ha trobat l'article</p>
    <?php } else {?>

        <h2><?=$article["titart"]?></h2>

        <!--Mostrar les dades del article que s'ha seleccionat-->
<<<<<<< HEAD
        <p><?= $article["bodyart"] ?></p>
        <p>Publicat per <strong><?= $article["nomusu"] ?></strong> en la categoria <strong><?= $article["nomcat"] ?></strong> el <strong><?= $article["datart"] ?></strong></p>
        <p><a href='posts_edit.php'>Edit</a> || <a href='posts_delete.php'>Delete</a> || <a href='comments_add.php'>Add a comment</a></p>
    <?php } ?>
=======
        <p><?=$article["bodyart"]?></p>
        <p>Publicat per <strong><a href="posts_by_category.php?usuari=<?=$article["codusu"]?>">
        <?=$article["nomusu"]?><a/></strong> en la categoria <strong>
        <a href="posts_by_category.php?categoria=<?=$article["codcat"]?>"><?=$article["nomcat"]?>
        </a></strong> el <strong><?=$article["datart"]?></strong></p>
        <p><a href='posts_edit.php'>Edit</a> || <a href='posts_delete.php'>Delete</a>
         || <a href='comments_add.php'>Add a comment</a></p>
    <?php }?>
>>>>>>> 2bc8a54305a99084fb694a654d118cce662db563
    <hr>
    <a href='index.php'>Home</a> || <a href='logout.php'>Logout</a>
</body>

</html>