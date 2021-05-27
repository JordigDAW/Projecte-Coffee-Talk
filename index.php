<?php

session_start();
$loggedUser = $_SESSION["user"] ?? "";

//Connexio amb la base de dades
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Implementacio de la consulta
$stmt = $pdo -> prepare("SELECT * FROM article INNER JOIN categoria ON article.codcat=categoria.codcat
                         INNER JOIN usuari ON article.codusu=usuari.codusu ORDER BY datart DESC");

//Execucio de la consulta
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
        <ul>            
            <!--Bucle foreach per mostrar els articles-->
            <?php foreach ($rows as $row) { ?>
                <li><a href="posts_show.php?id=<?=$row["codart"]?>"><?=$row["titart"]?></a> creat per 
                <strong><a href="posts_by_user.php?usuari=<?=$row["codusu"]?>"><?=$row["nomusu"]?></a></strong>
                en la categoria <strong><a href="posts_by_category.php?categoria=<?=$row["codcat"]?>"><?=$row["nomcat"]?></a></strong>
                el <strong><?=$row["datart"]?></strong></li>
            <?php } ?>
        </ul>
        <p>Clic to <a href="posts_add.php">add</a> a posting | | <a href="logout.php">Desconectar</a></p>
    <?php endif; ?>
</body>
</html>