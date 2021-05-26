<?php
    //Activem la gestió de sessions
    session_start();
    $loggedUser = $_SESSION["user"] ?? "";

    //Obtencio de la categoria triada
    $id = $_GET["id"];

    //Connexió amb la base de dades
    $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>

<body>
    Post eliminat amb exit
</body>
</html>