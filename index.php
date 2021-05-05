<?php

session_start();
$loggedUser = $_SESSION["user"] ?? "";

//Connexio amb la base de dades
$pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Implementacio de la consulta
$stmt = $pdo -> prepare("SELECT * FROM article");

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
            <li>
                <a href="">Post 1</a> by User 1 from the Category 1
            </li>
            <li>
                <a href="">Post 2</a> by User 2 from the Category 1
            </li>
            
            <!--Bucle foreach per mostrar els articles-->
            <?php foreach ($rows as $row) : ?>
                <li><a href="post-show.php<?=$row["codart"]?>"><?=$row["titart"]?></a></li>
            <?php endforeach; ?>
        </ul>
        <p>Clic to <a href="posts_add.php">add</a> a posting.</p>
    <?php endif; ?>
</body>
</html>