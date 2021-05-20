<?php
// activem la gestió de sessions
session_start();
$loggedUser = $_SESSION["user"] ?? "";
// si l'usuari no ha iniciat sessió l'enviem a la pàgina de login
if (empty($loggedUser))
   header("Location: login.php");

    //Inicialitzacio de variables
    $isPost = false;
    $isValid = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $isPost = true;
        
        $titart = filter_input(INPUT_POST, "titart");
        $bodyart = filter_input(INPUT_POST, "bodyart");
        $codcat = filter_input(INPUT_POST, "codcat");

        $isValid = true;

        //Comprovacio de que cap dels camps esta buits
        if (empty($titart)) {
            $isValid = false;
        }

        if (empty($bodyart)) {
            $isValid = false;
        }

        if (empty($codcat)) {
            $isValid = false;
        }

        if ($isValid === true) {

        //Connexio amb la base de dades
        $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $codusu = $_SESSION["user"];
        
        //Establiment de la zona horaria de madrid
        date_default_timezone_set ("Europe/Madrid");
        $datart = date("Y-m-d h:i:s");

        //Implementacio de la consulta
        $stmt = $pdo -> prepare("INSERT INTO `article` (`titart`, `bodyart`, `codcat`, `codusu`, `datart`)
        VALUES (:titart,:bodyart,:codcat,:codusu,:datart)");
    
        //Asignar valors als paràmetres
        $stmt -> bindValue("titart", $titart);
        $stmt -> bindValue("bodyart", $bodyart);
        $stmt -> bindValue("codcat", $codcat);
        $stmt -> bindValue("codusu", $codusu);
        $stmt -> bindValue("datart", $datart);

        $stmt -> execute();

        $stmt -> fetchAll();
        
        }
    
    } else {
        
        //Connexio amb la base de dades
        $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Implementacio de la consulta
        $stmt = $pdo -> prepare("SELECT * FROM categoria ORDER BY nomcat ASC");

        $stmt -> execute();

        $categoria = $stmt -> fetchall();

        //var_dump($categoria);

    }

?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>

<?php if($isPost === false){ ?>

<!--TODO: 2.1. Mostrar formulari-->
<form action="posts_add.php" method="post">    
    <p>Titol de l'article <input type="text" name="titart" value=""></p>
    <p>Cos de l'article</p>
    <textarea name="bodyart" style="resize:none" rows="10" cols="45" value="" placeholder="Insereix el cos de l'article"></textarea>
    <p>Codi de la categoria</p>
    <select name="codcat">
        <option disabled selected>(select an option)</option>
        <!--Bucle foreach per mostrar les categories en el camp select-->
        <?php foreach($categoria as $categories): ?>
        <option value="<?= $categories["codcat"]?>">
            <?= $categories["nomcat"]?>
        </option>
        <?php endforeach; ?>
    </select>
    <p><input type="submit" value="Enviar"></p>
</form>

<?php } else { ?>

<!--Mostrar errors de validació-->
<?php if($isValid === true){ ?>
    <p>S'ha creat el post amb  exit</p>

<!--Mostrar missatge de confirmació-->
<?php } else { ?>
    <p><strong>Error creant el post!</strong></p>
<?php } ?>

<?php } ?>

<p><a href='posts_edit.php'>Edit</a> || <a href='posts_delete.php'>Delete</a> || <a href='comments_add.php'>Add a comment</a></p>
<hr>
<a href='index.php'>Home</a> || <a href='logout.php'>Logout</a>
</body>
</html>