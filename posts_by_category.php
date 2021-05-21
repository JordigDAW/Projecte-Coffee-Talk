<?php

session_start();
$loggedUser = $_SESSION["user"] ?? "";

//Obtencio de la categoria triada
$categoria = $_GET["categoria"];

//Connexio amb la base de dades
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Implementacio de la consulta
$stmt = $pdo -> prepare("SELECT * FROM article INNER JOIN categoria ON article.codcat=categoria.codcat
                         INNER JOIN usuari ON article.codusu=usuari.codusu WHERE categoria.codcat=:categoria ORDER BY titart ASC");

$stmt->bindValue("categoria", $categoria);

$stmt -> execute();

$rows = $stmt->fetchAll();

//var_dump($rows);

?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>
    <?php if (empty($loggedUser)) :?>
    <p>Please <a href="login.php">login</a>.</p>
    <?php else :?>
        <h2>Posts creats amb la categoria <?=$rows[0]["nomcat"]?></h2>
        
        <ul>            
            <!--Bucle foreach per mostrar els articles-->
            <?php foreach ($rows as $row) { ?>
                <li><a href="posts_show.php?id=<?=$row["codcat"]?>"><?=$row["titart"]?></a>
                creat per <strong><a href="posts_by_user.php?usuari=<?=$row["codusu"]?>"><?=$row["nomusu"]?></a></strong>
                en la categoria <strong><?=$row["nomcat"]?></strong>
                el <strong><?=$row["datart"]?></strong></li>
            <?php } ?>
        </ul>
        <p>Clic to <a href="posts_add.php">add</a> a posting.</p>
        <a href='index.php'>Home</a> || <a href='logout.php'>Logout</a>
    <?php endif; ?>
</body>
</html>