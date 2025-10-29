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

$sql = "SELECT dbo.fProveraKorIme('johndoe') AS result";
$stmt = $pdo->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC)['result'];

echo "Result of the function call: " . $result;
if ($result==-1){
    echo "Korisnicko ime je zauezto";
}
?>