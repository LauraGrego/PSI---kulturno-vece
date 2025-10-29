<?php

$host = 'DESKTOP-GRI63NU';
$dbname = 'kulturnovece';

try {
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}
$sql = 'INSERT INTO dbo.Popust (BrojKarata, PopustNaCenu) VALUES (:value1, :value2)';
$stmt = $pdo->prepare($sql);


$value1 = 10;
$value2 = 2;


$stmt->bindParam(':value1', $value1);
$stmt->bindParam(':value2', $value2);



$stmt->execute();

//DB_DATABASE=laravel
//DB_USERNAME=root
//DB_PASSWORD=

// INFO  Server running on [http://127.0.0.1:8000].

?>