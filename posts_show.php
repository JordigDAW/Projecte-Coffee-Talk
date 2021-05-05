<?php
// activem la gestió de sessions
session_start();
$loggedUser = $_SESSION["user"] ?? "";
// si l'usuari no ha iniciat sessió l'enviem a la pàgina de login
if (empty($loggedUser))
   header("Location: login.php");

   $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");

   // TODO: Obtenir l'id enviat pel query string
    $id = $_GET["id"];
    $title = $_GET["title"];

   // TODO: Implementar la consulta
    $id = $pdo -> prepare("SELECT id FROM article");
    $title = $pdo -> prepare("SELECT titart FROM article");

    $id -> execute();
    $title -> execute();

    $rows = $id -> fetchAll();
    //$rows = $title -> fetchAll();

    var_dump($rows);

?>


<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>
<h2>PHP Version 12</h2>
<!--TODO: Comprovar que l'article existeix //-->
<!--TODO: Si existeix caldrà mostrar les dades obtingudes de la base de dades //-->
<p>La versió 12 de PHP es publicarà en tercer quart de 2023. Contindrà un sistema d'intel·ligència artifical que
escriurà els programes per tu.</p>
<p>Publicat per <strong>Bill Gates</strong> en la categoria <strong>PHP</strong> el <strong>2021-05-01 16:30:20</strong></p>
<p><a href='posts_edit.php'>Edit</a> || <a href='posts_delete.php'>Delete</a> || <a href='comments_add.php'>Add a comment</a></p>
<hr>
<a href='index.php'>Home</a> || <a href='logout.php'>Logout</a>
</body>
</html>
