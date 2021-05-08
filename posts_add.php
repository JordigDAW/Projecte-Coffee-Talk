<?php
// activem la gestió de sessions
session_start();
$loggedUser = $_SESSION["user"] ?? "";
// si l'usuari no ha iniciat sessió l'enviem a la pàgina de login
if (empty($loggedUser))
   header("Location: login.php");

    //Inicialitzacio de variables
    $isPost;
    $isValid;

    $codart = filter_input(INPUT_POST, "codart");
    $titart = filter_input(INPUT_POST, "titart");
    $bodyart = filter_input(INPUT_POST, "bodyart");
    $autart = filter_input(INPUT_POST, "autart");
    $datart = filter_input(INPUT_POST, "datart");
    $codcat = filter_input(INPUT_POST, "codcat");
    $codusu = filter_input(INPUT_POST, "codusu");
    
    //Connexio amb la base de dades
    $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Implementacio de la consulta
    $stmt = $pdo -> prepare("INSERT INTO `article` (`codart`, `titart`, `bodyart`, `datart`, `codcat`, `codusu`) VALUES ($codart),
    ($titart),($bodyart),($autart),($datart),($codcat),($codusu)");

    /*$codart -> bindValue("codart", $codart);
    $titolart -> bindValue("titart", $titart);
    $cosart -> bindValue("bodyart", $bodyart);
    $autorart -> bindValue("autart", $autart);
    $dataarticle -> bindValue("datart", $datart);
    $codicateg -> bindValue("codcat", $codcat);
    $codusuari -> bindValue("codusu", $codusu);*/

    $codiart -> execute();

    $row = $codiart -> fetch();

    var_dump($row);

    //$informacio = $_REQUEST;

    //print_r($informacio);

    // TODO: 2. Comprovar el mètode de sol·licitud
    //Comprovacio de que s'ha solicitat el metode POST
    /*if ($_SERVER["REQUEST_METHOD"]==="POST"){
        
        $isPost = true;

        

    } else {
        $isPost = false;
    }*/
    
   // TODO: 2.2. Processar el formulari
    

    // TODO: 2.2. Obtenir les dades del formulari



    // TODO: 2.3. Validar les dades
    // TODO: 2.3. Comprovar si hi ha algún error de validació        
        // TODO: 2.3.2. Inserir en la base de dades

    //Connexio amb la base de dades
    $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset-utf8", "root", "secret");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Implementacio de la consulta per inserir el nou article
    //$stmt = $pdo -> prepare("INSERT INTO `article`(`codart`, `titart`, `bodyart`, `datart`, `codcat`, `codusu`) VALUES $informacio");

    //$stmt -> bindValue()


?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>

<form action="posts_add.php" method="post">
    <h3>Codi del article<input type="text" name="codart" value=""></h3>    
    <h3>Titol de l'article <input type="text" name="nomart" value=""></h3>
    <h3>Cos de l'article</h3>
    <textarea name="bodyart" style="resize:none" rows="10" cols="45" value="">
Introdueix el cos de l'article...
    </textarea>
    <h3>Autor de l'article <input type="text" name="autart" value=""></h3>
    <h3>Data de creacio <input type="datetime-local" name="datart" value=""></h3>
    <h3>Codi de la categoria <input type="text" name="datart" value=""></h3>
    <h3>Codi de l'usuari <input type="text" name="codusu" value=""></h3>
    <h3><input type="submit" value="Enviar"></h3>
</form>

<?php

    
    
?>

<!--TODO: 2.1. Mostrar formulari //-->
<!--TODO: 2.3.1. Mostrar errors de validació //-->
<!--TODO: 2.3.3. Mostrar missatge de confirmació //-->
<p><a href='posts_edit.php'>Edit</a> || <a href='posts_delete.php'>Delete</a> || <a href='comments_add.php'>Add a comment</a></p>
<hr>
<a href='index.php'>Home</a> || <a href='logout.php'>Logout</a>
</body>
</html>