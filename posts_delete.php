<?php
//Activem la gestió de sessions
session_start();
$loggedUser = $_SESSION["user"] ?? "";

//Obtencio de la categoria triada
$article = $_GET["codart"];

//En cas de no haver iniciat sessió se l'envia a la pàgina de login
if (empty($loggedUser))
    header("Location: login.php");

    //Establiment de la connexió amb la base de dades
    $pdo = new PDO ("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Implementació de la consulta
    $stmt = $pdo -> prepare("DELETE FROM article WHERE article=:codart");

    $stmt -> bindValue("codart", $article);

    $stmt -> execute();

?>

<html>

<head>
    <title>Coffee Talk Blog</title>
</head>

<body>
    Post eliminat amb exit
</body>



</html>