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

    print "<pre>";
    print_r($_REQUEST);
    print "</pre>\n";

    // TODO: 2. Comprovar el mètode de sol·licitud
    //Comprovacio de que s'ha solicitat el metode POST
    /*if ($_SERVER["REQUEST_METHOD"]==="POST"){
        
        $isPost = true;

        

    } else {
        $isPost = false;
    }*/
    
   // TODO: 2.2. Processar el formulari
    /*$codart = filter_input(INPUT_POST, "Codart");
    $titart = filter_input(INPUT_POST, "Titart");
    $bodyart = filter_input(INPUT_POST, "Cos");
    $autart = filter_input(INPUT_POST, "Autor");
    $datart = filter_input(INPUT_POST, "Data");
    $codcat = filter_input(INPUT_POST, "Codcat");
    $codusu = filter_input(INPUT_POST, "Codusu");*/

    // TODO: 2.2. Obtenir les dades del formulari

    // TODO: 2.3. Validar les dades
    // TODO: 2.3. Comprovar si hi ha algún error de validació        
        // TODO: 2.3.2. Inserir en la base de dades
   
?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>

<form action="posts_add.php" method="get">
    <p>Codi del article <input type="text" name="codart"></p>
    <p>Titol de l'article <input type="text" name="nomart"></p>
    <p>Cos de l'article <input type="text" name="bodyart"></p>
    <p>Autor de l'article <input type="text" name="autart"></p>
    <p>Data de creacio <input type="text" name="datart"></p>
    <p>Codi de la categoria <input type="text" name="datart"></p>
    <p>Codi de l'usuari <input type="text" name="codusu"></p>
    <p><input type="submit" value="Enviar"></p>
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