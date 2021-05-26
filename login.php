<?php
// Activem la gestió de sessions
session_start();
$error = "";
$fullname = "";

// El comandament per executar es docker-compose up
// Si el formulari s'ha enviat el gestionem
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    // indiquem que s'ha enviat un formulari
    $isFormSubmitted = true;
    // obtinc usuari i contrasenya
    $user = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");
    // implementacio de la connexio a la base de dades
    $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // implementacio de la consulta
    $stmt = $pdo -> prepare("SELECT * FROM usuari WHERE userusu=:username");
    
    // se li dona el valor a la variable $stmt
    $stmt -> bindValue("username", $user);
    
    $stmt -> execute();

    // comprove l'usuari i la contrasenya
    $row = $stmt -> fetch();

    if (empty($row)){
        $error = "Login error";

    } else {
        if ($row["passusu"] == $password){
            $authenticatedUser = true;

            $_SESSION["user"] = $row["codusu"];
        } else {
            $error = "Login error";
        }
    }
}
// si no s'ha enviat ho indiquem
else {
    $isFormSubmitted = false;
}

?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
<h1>Welcome to Coffee Talk Blog</h1>

<?php if ($isFormSubmitted) : ?>
    <?php if (empty($error)) :?>
        <p>Login successful. Great to see you back <?=$row["nomusu"]?><?=$fullname?></p>
    <?php else :?>
        <p>Error:  <?=$error ?>. <a href="login.php">Try again</a></p>
    <?php endif; ?>
<?php else :?>
<form class="table" action="login.php" method="post">
    <div>
        <label>Username:</label>
        <input type="text" name="username" value=""/>
    </div>
    <div>
        <label>Password:</label>
        <input type="password" name="password" value=""/>
    </div>
    <input type="submit" value="login">
</form>
<?php endif ;?>
<hr>
<a href='index.php'>Home</a> || <a href='logout.php'>Logout</a>
</body>
</html>
