<?php
    //Connexio amb la base de dades
    $pdo = new PDO("mysql:host=mysql-server;dbname=coffee-talks;charset=utf8", "root", "secret");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo -> prepare("SELECT * FROM article LIMIT 5");
    $stmt -> execute();

    $row = $stmt -> fetchAll();

?>

<rss>
    <channel>
    </channel>
</rss>