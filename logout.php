<?php
    session_start();
    session_unset();
    session_destroy();
?>

<html>
<head>
    <title>Coffee Talk Blog</title>
</head>
<body>
    <h1>Welcome to Coffee Talk Blog</h1>
   <p>La sessio ha sigut tancada de forma correcta</p>
   <p>Si vols tornar a iniciar sessio pots fer-ho fent click <a href="login.php">ací</a>.</p>
</body>
</html>